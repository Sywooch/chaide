<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'line_id',
            'title',
            'description:ntext',
            'price',
            'render',
            [
                'attribute'=>'Imagen',
                'value'=>'/images/productos/'.$model->picture,
                'format' => ['image',['width'=>'200']],
            ],
            [
                'attribute'=>'Background',
                'value'=>'/images/productos-interna/'.$model->background1,
                'format' => ['image',['width'=>'200']],
            ],
            'status',
            'creation_date',
            'scale',
            'warranty',
            'support',
        ],
    ]) ?>

</div>
