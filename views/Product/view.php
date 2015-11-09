<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = $model->title;
?>
<!-- -->
<section id="interna-chaide" class="background-colchonint" style="background-image:url('../images/productos-interna/<?= $model->background1 ?>')">
    <img src="<?= URL::base() ?>/images/productos-interna/<?= $model->background1 ?>" alt="img carresa" class="colchon-celular"/> 
    <div class="n-colchon"><img src="<?= URL::base() ?>/images/tit-caressa.svg"/></div>
    <div class="cont-compra">
        <div class="barra-azul">
            ESCOGE TU COLCHÓN IDEAL
        </div>
        <div class="info-colchon">
            <div class="cont-fcompra">
                <!--<span>Colchon Caressa</span>-->
                <div class="cont-imgref">
                    <a href="<?= URL::base() ?>/images/productos/colchon1-grande.png" class="fancybox"><img src="<?= URL::base() ?>/images/productos/<?= $model->picture ?>" alt="imagen-producto"/></a>
                </div>
                <?php if($model->colors){ ?>
                <span>Telas Disponibles:</span>
                <ul>
                    <?php foreach($model->colors as $color): ?>
                    <li><img src="<?= URL::base() ?>/images/<?= $color->icon ?>"/></li>
                    <?php endforeach; ?>
                </ul>
                <?php } ?>
            </div>
            <div class="cont-fcompra">
                <form action="carrito.html">
                <span>Medidas Disponibles:</span>
                <select>
                    <option>1 Plaza y Media</option>
                    <option>2 Plazas </option>
                    <option>2 Plaza y Media</option>
                    <option>3 Plazas</option>
                </select>
            </div>
            <div class="cont-fcompra">
                <span>Color:</span>
                <select>
                    <option>Gris</option>
                    <option>Negro</option>
                    <option>Azul</option>
                    <option>Café</option>
                </select>
            </div>
            <div class="cont-fcompra">
            <span>Cantidad:</span>
                <select>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                </select>
            </div>
        </div>
        <div class="cont-precio">
            <div class="precio-colchon">$<?= $model->price ?><br/><span>(No incluye IVA)</span></div>
            <div class="cont-input"><input type="submit" value="Comprar ahora" /></div>
        </div>
        </form>
    </div>

</section>
<!-- -->
<section class="cont-secciones">
    <!--<img src="<?= URL::base() ?>/images/img-elaboradalatex.jpg" alt="img elaborada latex"/>
    <div class="txt-colchonint">
        <h1>EXTRA SOFT <br/> <font>BOX TOP</font></h1>
        <p>
        Sobrecapa elaborada con látex, material de extraordinaria elasticidad que se adapta perfectamente a la forma del cuerpo, brindando soporte óptimo a cada parte y curva de éste, sin crearpuntos de presión.
        </p>
    </div>-->
    <video loop id="video-colchon-interna">
      <source src="<?= Url::to('@web/videos/chaide_maqueta_2.ogv') ?>" type="video/ogg">
      <source src="<?= Url::to('@web/videos/chaide_maqueta_2.mp4') ?>" type="video/mp4">
      <source src="<?= Url::to('@web/videos/chaide_maqueta_2.webm') ?>" type="video/webm">
      Your browser does not support the video tag.
    </video>
    <div class="cont-video" id="play">
        <img src="<?= URL::base() ?>/images/btn-play.svg" id="btn_play"/>
    </div>
    <div class="cont-video" id="stop"></div>
</section>
<!-- -->
<section class="cont-colchonint2">
    <img src="<?= URL::base() ?>/images/int-colchon2.jpg" class="colchon-celular"/>
    <div class="secc-intcolchon">
        <ul>
            <?php foreach($model->advantages as $advantage): ?>
            <li>
                <h1><?= $advantage->title ?></h1>
                <p>
                    <?= $advantage->description ?>
                </p>
                <img src="<?= URL::base() ?>/images/propiedades-colchon/<?= $advantage->icon ?>" class="img-propiedad"/>
            </li>
            <?php endforeach; ?>
        </ul>   
    </div>
</section>
<!-- -->
<section class="cont-colchonint3">
    <div class="cont-colchon360">
        <iframe src="<?= URL::base() ?>/render/<?= $model->render ?>/index.html"></iframe>
    </div>
    <div class="txt-estructura-interna">
        <h1>ESTRUCTURA INTERNA</h1>
        <ul>
            <?php foreach($model->characteristics as $characteristic): ?>
            <li><?= $characteristic->description ?></li>
            <?php endforeach; ?>
        </ul>
        <div class="cont-medidas50">
            <div class="barra-azul">
                NIVEL DE SOPORTE Y CONFORT
            </div>
            <div class="img-comfort"><img src="<?= URL::base() ?>/images/b-confort.jpg" alt="escala confort"/></div>
            <span class="span-estructura-c">Recomendado para personas con peso máximo individual de <?= $model->support ?>lb.</span>
            <div class="txt-altura"><?= $model->warranty ?> Años de Garantía</div>
        </div>
    </div>

    
</section>
