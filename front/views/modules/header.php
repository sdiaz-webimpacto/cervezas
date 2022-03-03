<!DOCTYPE html>
<html lang="es">
<head>
    <?php
        $socials = TemplateController::TemplateStyleController();
        $social = $socials[1];
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.', user-scalable=no">
    <meta name="title" content="Cervezas y más">
    <meta name="description" content="cervezas artesanales de todas las partes del mundo">
    <meta name="keyword" content="cerveza,artesanal,mundo">

    <title>Cervezas y más</title>

    <link rel="stylesheet" href="views/css/plugins/bootstrap.min.css">
    <link rel="stylesheet" href="views/css/plugins/font-awesome.min.css">
    <link rel="stylesheet" href="views/css/plantilla.css">
    <link rel="stylesheet" href="views/css/header.css">
    <link rel="icon" type="image/jpg" href="../back/<?php echo $socials[0][0]['favicon'] ?>"/>

    <script src="views/js/plugins/jquery.min.js"></script>
    <script src="views/js/plugins/bootstrap.min.js"></script>

</head>
<body>
<!-- TOP -->
<div id="top" class="container-fluid topBar">
    <div class="container">
        <div class="row">
            <!-- SOCIAL -->
            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 social">
                <ul>
                    <?php

                    foreach ($social as $s)
                        {
                            echo "
                            <li>
                            <a href=".$s['url']." target='_blank'>
                            <i class='fa ".$s['logo']." redSocial ".$s['class']."' aria-hidden='true'></i>
                            </a>
                            </li>
                            ";
                        }

                    ?>
                </ul>
            </div>
            <!--REGISTRO-->
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 registro">
                <ul>
                    <li><a href="#modalIngreso" data-toggle="modal">Ingresar</a></li>
                    <li>|</li>
                    <li><a href="#modalRegistro" data-toggle="modal">Crear una cuenta</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<header class="container-fluid">
    <div class="container">
        <div id ="header" class="row d-flex flex-sm-column flex-md-row">
            <!-- LOGO -->
            <div class="col-lg-3 col-md-3 col-sm-2 col-xs-12" id="logotipo">
                <a href="#">
                    <img src="../back/<?php echo $socials[0][0]['logo'] ?>" class="img-responsive">
                </a>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-8 col-xs-12">
                <!-- BOTON CATEGORIAS -->
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 backColor" id="btnCategorias">
                    <p clas="tBlack">CATEGORÍAS
                        <span class="pull-right">
							<i class="fa fa-bars" aria-hidden="true"></i>
						</span>
                    </p>
                </div>
                <!-- BUSCADOR -->
                <div class="input-group col-lg-8 col-md-8 col-sm-8 col-xs-12" id="buscador">
                    <input type="search" name="buscar" class="form-control tBlack" placeholder="Buscar...">
                    <span class="input-group-btn">
						<a href="#">
							<button class="btn btn-default backColor" type="submit">
								<i class="fa fa-search"></i>
							</button>
						</a>
					</span>
                </div>
            </div>
            <!-- CARRITO -->
            <div class="col-lg-3 col-md-3 col-sm-2 col-xs-12" id="carrito">
                <a href="#">
                    <button class="btn btn-default pull-left backColor">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    </button>
                </a>
                <div class="bWhite">TU CESTA <span class="cantidadCesta">3</span> <br> USD $ <span class="sumaCesta">20</span></div>
            </div>
        </div>
        <!-- CATEGORÍAS -->
        <div class="col-xs-12 backColor" id="categorias">
            <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                <h4>
                    <a href="#" class="pixelCategorias">Lorem Ipsum</a>
                </h4>
                <hr>
                <ul>
                    <li><a href="#" class="pixelSubCategorias">Lorem Ipsum</a></li>
                    <li><a href="#" class="pixelSubCategorias">Lorem Ipsum</a></li>
                    <li><a href="#" class="pixelSubCategorias">Lorem Ipsum</a></li>
                    <li><a href="#" class="pixelSubCategorias">Lorem Ipsum</a></li>
                    <li><a href="#" class="pixelSubCategorias">Lorem Ipsum</a></li>
                </ul>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                <h4>
                    <a href="#" class="pixelCategorias">Lorem Ipsum</a>
                </h4>
                <hr>
                <ul>
                    <li><a href="#" class="pixelSubCategorias">Lorem Ipsum</a></li>
                    <li><a href="#" class="pixelSubCategorias">Lorem Ipsum</a></li>
                    <li><a href="#" class="pixelSubCategorias">Lorem Ipsum</a></li>
                    <li><a href="#" class="pixelSubCategorias">Lorem Ipsum</a></li>
                    <li><a href="#" class="pixelSubCategorias">Lorem Ipsum</a></li>
                </ul>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                <h4>
                    <a href="#" class="pixelCategorias">Lorem Ipsum</a>
                </h4>
                <hr>
                <ul>
                    <li><a href="#" class="pixelSubCategorias">Lorem Ipsum</a></li>
                    <li><a href="#" class="pixelSubCategorias">Lorem Ipsum</a></li>
                    <li><a href="#" class="pixelSubCategorias">Lorem Ipsum</a></li>
                    <li><a href="#" class="pixelSubCategorias">Lorem Ipsum</a></li>
                    <li><a href="#" class="pixelSubCategorias">Lorem Ipsum</a></li>
                </ul>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                <h4>
                    <a href="#" class="pixelCategorias">Lorem Ipsum</a>
                </h4>
                <hr>
                <ul>
                    <li><a href="#" class="pixelSubCategorias">Lorem Ipsum</a></li>
                    <li><a href="#" class="pixelSubCategorias">Lorem Ipsum</a></li>
                    <li><a href="#" class="pixelSubCategorias">Lorem Ipsum</a></li>
                    <li><a href="#" class="pixelSubCategorias">Lorem Ipsum</a></li>
                    <li><a href="#" class="pixelSubCategorias">Lorem Ipsum</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>