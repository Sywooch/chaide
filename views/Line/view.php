<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = $model->description;
?>
<section class="cont-paginternas productos">
    <div class="secciones-productos">
        <div class="tit-productos">LÍNEA RESTONIC</div>
        <h2>Desde <strong>$776.92</strong> (No incluye IVA)</h2>
        <ul>
            <?php foreach($model->products as $product): ?>
            <li>
                <a href="<?= Url::to(['product/view','id'=>$product->id,'#'=>strtoupper($product->title)]) ?>"><img src="<?= URL::base() ?>/images/productos/<?= $product->picture ?>" alt="productos chaide"/><h1><?= $product->title ?></h1><h2>Desde <strong>$<?= $product->price ?></strong> (No incluye IVA)</h2></a>
                <a href="colchon-interna.html" class="link-comprar">Comprar</a>
                <div class="c-comparar">
                    <input type="checkbox" /><label>Comparar</label>
                </div>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <!-- SEPARADOR -->
    <div class="separador-p"><img src="<?= URL::base() ?>/images/separador.jpg"/></div>
    <!-- -->
</section>
