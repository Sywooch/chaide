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
    <img src="<?= URL::base() ?>/images/int-colchon.jpg" alt="img carresa" class="colchon-celular"/> 
    <div class="n-colchon"><img src="<?= URL::base() ?>/images/tit-caressa.svg"/></div>
    <div class="cont-compra">
        <div class="barra-azul">
            ESCOGE TU COLCHÓN IDEAL
        </div>
        <div class="info-colchon">
            <div class="cont-fcompra">
                <!--<span>Colchon Caressa</span>-->
                <div class="cont-imgref">
                    <a href="<?= URL::base() ?>/images/productos/colchon1-grande.png" class="fancybox"><img src="<?= URL::base() ?>/images/productos/colchon1.png" alt="imagen-producto"/></a>
                </div>
                <span>Telas Disponibles:</span>
                <ul>
                    <li><img src="<?= URL::base() ?>/images/telas.jpg"/></li>
                    <li><img src="<?= URL::base() ?>/images/telas.jpg"/></li>
                    <li><img src="<?= URL::base() ?>/images/telas.jpg"/></li>
                    <li><img src="<?= URL::base() ?>/images/telas.jpg"/></li>
                    <li><img src="<?= URL::base() ?>/images/telas.jpg"/></li>
                </ul>
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
            <div class="precio-colchon">$1662.22<br/><span>(No incluye IVA)</span></div>
            <div class="cont-input"><input type="submit" value="Comprar ahora" /></div>
        </div>
        </form>
    </div>
    <!--<div class="footter-intcolchon">
        <ul>
            <li><img src="<?= URL::base() ?>/images/propiedades-colchon/extrasoft.jpg" alt="colchon extra soft"/></li>
            <li><img src="<?= URL::base() ?>/images/propiedades-colchon/latex.jpg" alt="tela latex"/></li>
            <li><img src="<?= URL::base() ?>/images/propiedades-colchon/antiacaros.jpg" alt="Anti acaros"/></li>
            <li><img src="<?= URL::base() ?>/images/propiedades-colchon/nonflip.jpg" alt="Colchon Nonflip"/></li>
            <li><img src="<?= URL::base() ?>/images/propiedades-colchon/pocketcoil.jpg" alt="Pocketcoil"/></li>
            <li><img src="<?= URL::base() ?>/images/propiedades-colchon/ionesplata.jpg" alt="tela iones de plata"/></li>
        </ul>
    </div>-->
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
            <li>
                <h1>LATEX</h1>
                <p>
                Material de extraordinaria elasticidad que se adapta perfectamente a la forma del cuerpo, brindando soporte óptimo a cada parte y curva de éste, sin crear puntos de presión. Tiene celdas abiertas que permite una excelente ventilación y oxigenación. Antibacterial natural que repele bacterias, ácaros, hongos y otros microorganismos.
                </p>
                <img src="<?= URL::base() ?>/images/propiedades-colchon/latex.png" class="img-propiedad"/>
            </li>
            <li>
                <h1>NON FLIP</h1>
                <p>
                Estructura interior diseñada para no dar la vuelta al colchón, todos los componentes mejorados se encuentran en un solo lado, para disfrutar el 100% de descanso.
                </p>
                <img src="<?= URL::base() ?>/images/propiedades-colchon/nonflip.png" class="img-propiedad"/>
            </li>
            <li>
                <h1>TELA ANTI ÁCAROS</h1>
                <p>
                Salud gracias a la protección contra microorganismos. Tela con tratamiento anti acaros, anti hongos y anti bacterias que evita la proliferación de estos microorganismos en la tela.
                </p>
                <img src="<?= URL::base() ?>/images/propiedades-colchon/antiacaros.png" class="img-propiedad"/>
            </li>
            <li>
                <h1>TELA IONES DE PLATA</h1>
                <p>
                Tela elaborada con iones de plata que repelen naturalmente la proliferación de microorganismos.
                </p>
                <img src="<?= URL::base() ?>/images/propiedades-colchon/ionesplata.png" class="img-propiedad"/>
            </li> 
            <li>
                <h1>POCKET COIL</h1>
                <p>
                Panel de resortes enfundados individualmente que impide la transmisión de movimiento.
                </p>
                <img src="<?= URL::base() ?>/images/propiedades-colchon/pocketcoil.png" class="img-propiedad"/>
            </li>
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
            <li>Tela elaborada con fibra viscosa de textura extra suave y diseño elegante.</li>
            <li>Memory Foam con partículas de Gel Infused, que mantiene la temperatura ideal del colchón y brinda un nivel superior de confort y suavidad.</li>
            <li>Lámina de látex con particular de Gel Infused, que mantiene la temperatura ideal del colchón y brinda soporte óptimo sin generar puntos de presión.</li>
            <li>Componente de apoyo y protección resistente, plancha de espuma prensada de alta densidad.</li>
            <li>Panel de resortes pocket coil (enfundados individualmente).</li>
            <li>Marco de espuma Foam Encasement que protege los bordes laterales del colchón.</li>
            <li>Espuma de soporte de alta densidad.</li>
        </ul>
        <div class="cont-medidas50">
            <div class="barra-azul">
                NIVEL DE SOPORTE Y CONFORT
            </div>
            <div class="img-comfort"><img src="<?= URL::base() ?>/images/b-confort.jpg" alt="escala confort"/></div>
            <span class="span-estructura-c">Recomendado para personas con peso máximo individual de 220lb.</span>
            <div class="txt-altura">10 Años de Garantía</div>
        </div>
    </div>
    <!--<div class="cont-medidas50 border-der">
        <div class="barra-azul">
            MEDIDAS DISPONIBLES
        </div>
        <ul>
            <li><span>3 plazas </span>200 cm x 200 cm</li>
            <li><span>2 1/2 plazas</span> 160 cm x 200 cm</li>
            <li><span>2 plazas</span> 135 cm x 190 cm</li>
        </ul>
        <div class="txt-altura">Altura &nbsp;&nbsp;&nbsp;&nbsp;30cm</div>
    </div>-->
    
</section>
