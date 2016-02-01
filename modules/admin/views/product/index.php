<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'line_id',
            'line.title',
            'title',
            //'description:ntext',
            //'price',
            // 'render',
                        array(
           'attribute' => 'Imagen',
            'format' => 'html',
            'value' => function($data) { return Html::img('/images/productos/'.$data->picture, ['width'=>'250']); }


               ),
            array(
           'attribute' => 'Background',
            'format' => 'html',
            'value' => function($data) { return Html::img('/images/productos-interna/'.$data->background1, ['width'=>'250']); }


               ),
            // 'background2',
            // 'background3',
             'status',
             'creation_date',
            // 'scale',
            // 'warranty',
            // 'support',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
