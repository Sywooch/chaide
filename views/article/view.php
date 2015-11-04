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
    <?php foreach($articles as $article): ?>
    <div class="noticia-int">
        <img src="<?= URL::base() ?>/images/news/<?= $article->picture ?>"/>
        <h1><?= mb_strtoupper($article->title) ?></h1>
        <p><?= $article->description ?></p>
        <a href="<?= Url::to(['article/view','id'=>$article->id,'#'=>mb_strtoupper($article->title)]) ?>">Leer más >></a>
    </div>
<?php endforeach; ?>
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
