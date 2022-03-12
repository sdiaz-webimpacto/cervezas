<div class="container-fluid" id="slide">
    <div class="row">
        <ul class="slideShow" second="3">

            <li class="slideShow">
                <img src="<?php echo $path;?>back/views/img/slider/slider1.jpg">
                <div class="slideOptions slideOption1">
                    <img src="<?php echo $path;?>back/views/img/slider/producto.png" alt="" class="imgProduct" style="top:2%;left:60%;width:auto">
                    <div class="textSlide" style="top:12%;left:10%;width:40%">
                        <h1 style="color:#ccc;">Title</h1>
                        <h2 style="color:#ccc;">Subtitle</h2>
                        <h3 style="color:#ccc;">Comment for this product</h3>
                        <a href="">
                            <button class="btn btn-default backColor text-uppercase">Show Product <span class="fa fa-chevron-right"></span></button>
                        </a>
                    </div>
                </div>
            </li>

            <li class="slideShow">
                <img src="<?php echo $path;?>back/views/img/slider/slider2.jpg">
                <div class="slideOptions slideOption2">
                    <img src="<?php echo $path;?>back/views/img/slider/producto.png" alt="" class="imgProduct" style="top:2%;left:20%;width:auto">
                    <div class="textSlide" style="top:12%;left:55%;width:40%">
                        <h1 style="color:#ccc;">Title</h1>
                        <h2 style="color:#ccc;">Subtitle</h2>
                        <h3 style="color:#ccc;">Comment for this product</h3>
                        <a href="">
                            <button class="btn btn-default backColor text-uppercase">Show Product <span class="fa fa-chevron-right"></span></button>
                        </a>
                    </div>
                </div>
            </li>

            <li class="slideShow">
                <img src="<?php echo $path;?>back/views/img/slider/slider3.jpg">
                <div class="slideOptions slideOption2">
                    <img src="<?php echo $path;?>back/views/img/slider/producto.png" alt="" class="imgProduct" style="top:2%;left:10%;width:auto">
                    <div class="textSlide" style="top:12%;left:55%;width:auto">
                        <h1 style="color:#ccc;">Title</h1>
                        <h2 style="color:#ccc;">Subtitle</h2>
                        <h3 style="color:#ccc;">Comment for this product</h3>
                        <a href="">
                            <button class="btn btn-default backColor text-uppercase">Show Product <span class="fa fa-chevron-right"></span></button>
                        </a>
                    </div>
                </div>
            </li>

        </ul>

        <ul id="pagination">
            <li item="1"><span class="fa fa-circle"></span></li>
            <li item="2"><span class="fa fa-circle"></span></li>
            <li item="3"><span class="fa fa-circle"></span></li>
        </ul>

        <div class="arrows" id="back"><span class="fa fa-chevron-left"></span></div>
        <div class="arrows" id="next"><span class="fa fa-chevron-right"></span></div>

    </div>
</div>