<?php

class MoreInfoProduct
{
    public $detailButton = '';
    public $descriptionButton = '';
    public $allDetails = '';
    public $allDescription = '';
    public $selectionTemplate = '';
    public function getMoreInfo($description = false, $details = false)
    {
        $selections = array();
        if($description)
        {
            $this->allDescription = '<div class="collapse" id="descriptionLarge">
                                        <div class="card card-body">
                                        '.$description.'
                                        </div>
                                     </div>';
            $this->descriptionButton = '<div class="dropbox col-12" type="button" data-toggle="collapse" data-target="#descriptionLarge" aria-expanded="false" aria-controls="descriptionLarge">
                                            Descripción <i class="fa fa-angle-down"></i>
                                        </div>';
        }
        if($details)
        {
            $datas = json_decode($details, true);
            $this->allDetails = '<div class="collapse" id="detailsTab">';
            foreach($datas as $key => $data)
            {
                if(count($data) == 1)
                {
                    $this->allDetails .= '<div class="card card-body">';
                    $this->allDetails .= '<h4 class="attrName">'.$key.'</h4><ul>';
                    foreach($data as $d)
                    {
                        $this->allDetails .= '<li>'.$d.'</li>';
                    }
                    $this->allDetails .= '</ul></div>';
                }
            }
            $this->allDetails .= '</div>';
            $this->detailButton = '<div class="dropbox col-12" type="button" data-toggle="collapse" data-target="#detailsTab" aria-expanded="false" aria-controls="detailsTab">
                                            Características <i class="fa fa-angle-down"></i>
                                   </div>';           
        }

        echo $this->descriptionButton.$this->allDescription.$this->detailButton.$this->allDetails;
    }

    public function selectors($detail)
    {
        $objects = json_decode($detail);
        $selections = array();
        foreach($objects as $key => $data)
        {
            if(count($data) >= 2)
            {
                $selections[$key] = $data;
            }
        }
        if(count($selections) >= 1)
            {
                $this->selectionTemplate = '<div class="col-12" id="selectionsProduct">';
                foreach($selections as $key => $selection)
                {
                    $this->selectionTemplate .= '<select name="'.$key.'" >';
                    foreach($selection as $item)
                    {
                        $this->selectionTemplate .= '<option value="'.$item.'">'.$item.'</option>';
                    }
                    $this->selectionTemplate .= '<select name="'.$key.'">';             
                }                                   
                $this->selectionTemplate .= '</div>';  
            }
        echo $this->selectionTemplate;
    }
}