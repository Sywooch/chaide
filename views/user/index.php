<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = "Mi perfil";
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- -->
<section id="home-chaide" class="background-registro">
    <div class="cont-titulos">
        <h1>PERFIL DEL USUARIO</h1>
        <div class="separador-p"><img src="<?= URL::base() ?>/images/separador.svg"/></div>
    </div>
    <div class="cont-perfil">
        <ul id="botonera-perfil">
            <li><a href="<?= Url::to(['user/index']) ?>" class="p-selected">DATOS PERSONALES</a></li>
            <li><a href="<?= Url::to(['user/address']) ?>">DIRECCIONES</a></li>
            <li><a href="<?= Url::to(['user/history']) ?>">HISTORIAL</a></li>
        </ul>
        <div id="cont-datosp" class="cont-infor" style="display:block">

                          <?= $this->render('_form', [
                'model' => $model,
                ]) ?> 
    </div>
    </div>
</section>
