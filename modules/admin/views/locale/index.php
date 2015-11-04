<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Locales';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="locale-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Locale', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'city_id',
            'latitude',
            'longitude',
            'address',
            // 'email:email',
            // 'phone',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
