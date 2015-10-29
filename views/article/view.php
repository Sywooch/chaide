<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Article */

$this->title = $model->title;

?>
<!-- -->
<section class="cont-noticias">
    <div class="img-noticia" style="background:url(<?= URL::base() ?>/images/<?= $model->picture ?>); background-size:cover;">&nbsp;</div>
    <div class="desc-noticia">
        <h1><?= mb_strtoupper($model->title) ?></h1>
        <?= $model->description ?>
    </div>
</section>
<!-- -->
<div class="cont-bg">
    <h1>VIDA</h1>
    <a href="#">mostrar todos los artículos >></a>
</div>
<!-- -->
<section class="cont-notinternas">
    <div class="noticia-int">
        <img src="<?= URL::base() ?>/images/noticia-int.jpg"/>
        <h1>¿CÓMO DECORAR TU HABITACIÓN?</h1>
        <p>Nuestro cuarto es el rincón de la casa dedicado a nosotras mismas, nuestro propio espacio, aquel que nos gusta personalizar y adornar a nuestro gusto.</p>
        <a href="#">Leer más >></a>
    </div>
    <div class="noticia-int">
        <img src="<?= URL::base() ?>/images/noticia-int2.jpg"/>
        <h1>DESAYUNO DE PAPÁ EN SU DÍA</h1>
        <p>¡Qué delicia una taza de chocolate caliente amargo! En especial si los primeros días invernales ya están golpeando la puerta. Desayunar una reconfortante taza de chocolate caliente sin duda no vendría nada mal para sacar el frío. ¡Intenta esta delicia para papá!</p>
        <a href="#">Leer más >></a>
    </div>
    <div class="noticia-int">
        <img src="<?= URL::base() ?>/images/noticia-int.jpg"/>
        <h1>SUEÑO Y FELICIDAD</h1>
        <p>Parece evidente, ¿Verdad? ¿No te levantas de mejor humor cuando has dormido bien? O al contrario, ¿no te parece que vas a tener el peor día de tu vida cuando te levantas después de una mala noche o pocas horas de descanso?</p>
        <a href="#">Leer más >></a>
    </div>
    <div class="noticia-int">
        <img src="<?= URL::base() ?>/images/noticia-int2.jpg"/>
        <h1>¿CÓMO DECORAR TU HABITACIÓN?</h1>
        <p>Nuestro cuarto es el rincón de la casa dedicado a nosotras mismas, nuestro propio espacio, aquel que nos gusta personalizar y adornar a nuestro gusto.</p>
        <a href="#">Leer más >></a>
    </div>
</section>
<!-- -->
<div class="footter-home">
        <ul>
            <li>
                <img src="<?= URL::base() ?>/images/ico-tiempo.svg" alt="ahorre tiempo"/>
                <div class="txt-informativo">
                    <h1>AHORRE SU TIEMPO</h1>
                    <span>Realice su compra por internet</span>
                </div>
            </li>
            <li class="li-medium">
                <img src="<?= URL::base() ?>/images/ico-geotrust.svg" alt="geotrust"/>
                <div class="txt-informativo-medium">
                    <h1>GEOTRUST</h1>
                    <span>Compra 100% segura</span>
                </div>
            </li>
            <li>
                <img src="<?= URL::base() ?>/images/ico-envio.svg" alt="envio gratis"/>
                <div class="txt-informativo">
                    <h1>ENVÍO GRATIS</h1>
                    <span>En facturas superiores a $200</span>
                </div>
            </li>
        </ul>
</div>
<!-- -->
