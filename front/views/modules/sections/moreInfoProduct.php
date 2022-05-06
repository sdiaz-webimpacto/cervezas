<?php

class MoreInfoProduct
{
    public $detailButton = '';
    public $descriptionButton = '';
    public $allDetails = '';
    public $allDescription = '';
    public function getMoreInfo($description = false, $details = false)
    {
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
                $this->allDetails .= '<div class="card card-body">';
                $this->allDetails .= '<h4 class="attrName">'.$key.'</h4><ul>';
                foreach($data as $d)
                {
                    $this->allDetails .= '<li>'.$d.'</li>';
                }
                $this->allDetails .= '</ul></div>';
            }
            $this->allDetails .= '</div>';
            $this->detailButton = '<div class="dropbox col-12" type="button" data-toggle="collapse" data-target="#detailsTab" aria-expanded="false" aria-controls="detailsTab">
                                            Características <i class="fa fa-angle-down"></i>
                                   </div>';
        }

        echo $this->descriptionButton.$this->allDescription.$this->detailButton.$this->allDetails;
    }
}