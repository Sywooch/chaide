<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\web\View;
use yii\helpers\Url;
/* @var $this \yii\web\View */
/* @var $content string */
$script='$(document).ready(function() {
$("#menu-chaide").click(function(){
        $(this).toggleClass("active");
        $("#menu-mobile").toggleClass("menu-active");
        $("#general").toggleClass("general-active");
    });  
});';
$this->registerJs($script,View::POS_END);
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
<div id="general">
<!-- MENU CHAIDE -->
    <header>
        <nav>
            <ul>
<<<<<<< HEAD
                 <li class="m-menu"><a href="<?= Url::to(['site/asesor']) ?>" class="hvr-bounce-to-top">ASESOR DE COMPRAS</a></li>
                                <li class="m-menu"><a href="productos.html" class="hvr-bounce-to-top">PRODUCTOS</a>
                    <!-- -->
                    <ul id="submenu-chaide">
                        <li>
                            <a href="#" class="hvr-bounce-to-top">LÍNEA RESTONIC</a>
                            <ul id="productos-submenu">
                                <li><a href="colchon-interna.html">Symphony</a></li>
                                <li><a href="colchon-interna.html">Caressa</a></li>
                                <li><a href="colchon-interna.html">Escape</a></li>
                                <li><a href="colchon-interna.html" class="btn-vermas-m">Ver más +</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="hvr-bounce-to-top">LÍNEA CHAIDE</a>
                            <ul id="productos-submenu">
                                <li><a href="colchon-interna.html">Conforex Non Flip</a></li>
                                <li><a href="colchon-interna.html">Continental De Lujo Non Flip</a></li>
                                <li><a href="colchon-interna.html">Continental De Lujo Non Flip</a></li>
                                <li><a href="colchon-interna.html" class="btn-vermas-m">Ver más +</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="hvr-bounce-to-top">BASES Y CABECEROS</a>
                            <ul id="productos-submenu">
                                <li><a href="colchon-interna.html">Base Premium</a></li>
                                <li><a href="colchon-interna.html">Base Standard</a></li>
                                <li><a href="colchon-interna.html">Base Duo</a></li>
                                <li><a href="colchon-interna.html" class="btn-vermas-m">Ver más +</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="hvr-bounce-to-top">ALMOHADAS</a>
                            <ul id="productos-submenu">
                                <li><a href="colchon-interna.html">Restonic Memory Foam</a></li>
                                <li><a href="colchon-interna.html">Cervical Memory Foam</a></li>
                                <li><a href="colchon-interna.html">Almohadas Health & Support</a></li>
                                <li><a href="colchon-interna.html" class="btn-vermas-m">Ver más +</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="hvr-bounce-to-top">PROTECTORES</a>
                            <ul id="productos-submenu">
                                <li><a href="colchon-interna.html">Protector de Colchón Impermeable</a></li>
                                <li><a href="colchon-interna.html">Protector  de Colchón de Plumón</a></li>
                                <li><a href="colchon-interna.html">Protector de almohada</a></li>
                                <li><a href="colchon-interna.html" class="btn-vermas-m">Ver más +</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="hvr-bounce-to-top">LENCERÍA</a>
                            <ul id="productos-submenu">
                                <li><a href="colchon-interna.html">Sábanas Fioré</a></li>
                                <li><a href="colchon-interna.html">Sábanas Sun set</a></li>
                                <li><a href="colchon-interna.html" class="btn-vermas-m">Ver más +</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="hvr-bounce-to-top">SOFÁS CAMAS</a>
                            <ul id="productos-submenu">
                                <li><a href="colchon-interna.html">Malibú</a></li>
                                <li><a href="colchon-interna.html">Milano</a></li>
                                <li><a href="colchon-interna.html">Matisse</a></li>
                                <li><a href="colchon-interna.html" class="btn-vermas-m">Ver más +</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="hvr-bounce-to-top">BABY CHAIDE</a>
                            <ul id="productos-submenu">
                                <li><a href="colchon-interna.html">Colchón Baby Chaide</a></li>
                                <li><a href="colchon-interna.html">Colchón Anti asfixia</a></li>
                                <li><a href="colchon-interna.html">Almohada Látex de bebé</a></li>
                                <li><a href="colchon-interna.html" class="btn-vermas-m">Ver más +</a></li>
                            </ul>
                        </li>
                    </ul>
                    <!-- -->
                </li>
                <li class="m-menu"><a href="<?= Url::to(['news/index']) ?>" class="hvr-bounce-to-top">NOTICIAS</a></li>
                <li><a href="<?= Url::home() ?>"><img src="<?= URL::base() ?>/images/logo-chaide.svg" alt="logotipo chaide"/></a></li>
                <li class="m-menu"><a href="<?= Url::to(['locale/index']) ?>" class="hvr-bounce-to-top">LOCALES</a></li>
                <li class="m-menu"><a href="#" class="hvr-bounce-to-top">INNOVACIÓN</a></li>
                <?php if(Yii::$app->user->isGuest){ ?>
                <li class="m-menu"><a href="<?= Url::to(['user/create']) ?>" class="hvr-bounce-to-top"><img src="<?= URL::base() ?>/images/ico-compras.svg"/> COMPRAS</a></li>
                <?php }else{ ?>
                 <li class="m-menu menu-imagen"><a href="<?= Url::to(['user/index']) ?>" class="hvr-bounce-to-top"><img src="<?= URL::base() ?>/images/ico-compras.svg"/> COMPRAS</a></li>
                <?php } ?>
            </ul>
            <div id="barra-mobile">
                <a id="menu-chaide"><span></span></a>
            </div>
        </nav>
    </header>
            <?= $content ?>

<footer>
    <div class="cont-footer">
        <div class="secc-footer">
            <h1>COMPRA</h1>
            <h2>NUESTROS PRODUCTOS</h2>  
            <ul>
                <li><a href="#">Línea Restonic</a></li>
                <li><a href="#">Línea Chaide</a></li>
                <li><a href="#">Bases y Cabeceros</a></li>
                <li><a href="#">Almohadas</a></li>
                <li><a href="#">Protectores</a></li>
                <li><a href="#">Lencería</a></li>
                <li><a href="#">Sofás Cama</a></li>
                <li><a href="#">Muebles</a></li>
            </ul>  
        </div>
        <div class="secc-footer">
            <h1>VISITA</h1>
            <h2>NUESTROS LOCALES</h2> 
            <div class="footer-con2">
                <h2>QUITO</h2>
                <ul>
                    <li><a href="#">C.C. El Bosque</a></li>
                    <li><a href="#">C.C Multicentro</a></li>
                    <li><a href="#">C.C. Condado Shopping</a></li>
                    <li><a href="#">C.C. Scala Shopping</a></li>
                    <li><a href="#">C.C. Paseo San Francisco</a></li>
                    <li><a href="#">C.C. San Luis Shopping</a></li>
                    <li><a href="#">C.C. Quicentro Sur</a></li>                
                </ul>
            </div>
            <div class="footer-con2">
                <h2>GUAYAQUIL</h2>
                <ul>
                    <li><a href="#">C.C. Mall del Sol</a></li>
                    <li><a href="#">C.C. Village Plaza</a></li>
                    <li><a href="#">C.C. Mall del Sur</a></li>
                </ul>
                <h2>CUENCA</h2>
                <ul>
                    <li><a href="#">C.C. Gran Colombia</a></li>
                </ul>
            </div>   
        </div>
        <div class="secc-footer">
            <h1>CONOCE</h1>
            <h2>SERVICIOS ON-LINE</h2> 
            <ul>
                <li><a href="#">Faq's</a></li>
                <li><a href="#">Trabaja con Nosotros</a></li>
                <li><a href="#">B2B</a></li>
                <li><a href="#">Intranet</a></li>
                <li><a href="#">Proveedores</a></li>
            </ul>
            <h1 class="h1-footer">NOSOTROS</h1> 
            <ul class="n-footer">
               <li><a href="<?= Url::to(['site/about']) ?>">La Empresa</a></li>
            </ul>  
            
        </div>
    </div>
    <div class="footer-cierre">
        <ul>
            <li><img src="<?= URL::base() ?>/images/ico-facebook.svg" alt="facebook"/></li>
            <li><img src="<?= URL::base() ?>/images/ico-twitter.svg" alt="twitter"/></li>
            <li><img src="<?= URL::base() ?>/images/ico-youtube.svg" alt="youtube"/></li>
        </ul>
        ® 2015 CHAIDE, Todos los Derechos Reservados.   Desarrollado por <a href="http://share.com.ec/" target="_blank">SHARE DIGITAL AGENCY.</a>  
    </div>
</footer>
<!-- -->
</div>
<div id="asesor-compra"><img src="<?= URL::base() ?>/images/asesor-compra.png"/></div>
<!-- menu mobile -->
<div id="menu-mobile">
    <ul>
       <li><a href="#">ASESOR DE COMPRA</a></li>
        <li><a href="<?= Url::to(['product/index']) ?>">PRODUCTOS</a></li>
        <li><a href="<?= Url::to(['site/about']) ?>">NOSOTROS</a></li>
        <li><a href="<?= Url::to(['news/index']) ?>">NOTICIAS</a></li>
        <li><a href="<?= Url::to(['locals/index']) ?>">LOCALES</a></li>
        <li><a href="#">INNOVACIÓN</a></li>
        <li><a href="registro.html">COMPRAS</a></li>
   </ul>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
