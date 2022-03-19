<div class="container-fluid" id="slide">
    <div class="row">
        <ul class="slideShow" second="3">

            <?php
            $slide = SlideController::viewSlide();
            foreach($slide as $key => $sl)
            {
                $styleImg = json_decode($sl['styleImgProduct']);
                $styleText = json_decode($sl['styleText']);
                $h1 = json_decode($sl['titleH1']);
                $h2 = json_decode($sl['titleH2']);
                $h3 = json_decode($sl['titleH3']);

                echo '
                    <li class="slideShow">
                        <img src="'.$pathBack.$sl['imgBackground'].'">
                    <div class="slideOptions '.$sl['type'].'">';
                if($sl['imgProduct'] != '')
                {
                    echo '
                        <img src="'.$pathBack.$sl['imgProduct'].'" class="imgProduct" 
                        style="top:'.$styleImg->top.';left:'.$styleImg->left.';width:'.$styleImg->width.';right:'.$styleImg->right.'">
                        ';
                }

                echo '
                    <div class="textSlide" style="top:'.$styleText->top.';left:'.$styleText->left.';width:'.$styleText->width.';right:'.$styleText->right.'">
                            <h1 style="color:'.$h1->color.';">'.$h1->text.'</h1>
                            <h2 style="color:'.$h2->color.';">'.$h2->text.'</h2>
                            <h3 style="color:'.$h3->color.';">'.$h3->text.'</h3>
                            <a href="">
                                '.$sl['button'].'
                            </a>
                        </div>
                    </div>
                    </li>
                ';
            }
            ?>

        </ul>

        <ul id="pagination">
            <?php
            for($i = 1; $i <= count($slide); $i++)
            {
                echo '<li item="'.$i.'"><span class="fa fa-circle"></span></li>';
            }
            ?>
        </ul>

        <!--<div class="arrows" id="back"><span class="fa fa-chevron-left"></span></div>
        <div class="arrows" id="next"><span class="fa fa-chevron-right"></span></div>-->

    </div>
</div>