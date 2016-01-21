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
			<li><a href="<?= Url::to(['user/index']) ?>" >DATOS PERSONALES</a></li>
            <li><a href="<?= Url::to(['user/address']) ?>">FACTURACIÓN</a></li>
            <li><a href="<?= Url::to(['user/history']) ?>"class="p-selected">HISTORIAL</a></li>
        </ul>
        <div id="cont-historialp" class="cont-infor">
            <div class="cont-infocamposf2">
                <h1>HISTORIAL DE COMPRA</h1>
                <div id="listado-compra">
                    <?php foreach($model->sells as $sell): ?>
                    <div class="cont-infocampos">
                        <div class="tit-compras">Compra #<?= $sell->id ?>- <?= $sell->creation_date ?>-<?= ($sell->status == 'COMPLETE' ? "COMPLETA" : "INCOMPLETA"); ?></div>
                         <a href="<?= Url::to(['user/viewsell','id'=>$sell->id]) ?>" class="btn-vercompras">Ver Detalle</a>
                    </div> 
                    <?php  endforeach; ?>
                </div> 
<!--                 <div id="detalle-compra">
                    <div class="cont-infocampos">
                        <div class="tit-compras">Colchon Caressa</div>
                        <div class="num-cifra">$10000</div>
                    </div>
                    <div class="cont-infocampos">
                        <div class="tit-compras">Colchon Caressa</div>
                        <div class="num-cifra">$10000</div>
                    </div>
                    <div class="cont-infocampos">
                        <div class="tit-compras">Colchon Caressa</div>
                        <div class="num-cifra">$10000</div>
                    </div>
                    <div class="cont-infocampos c-total">
                        <div class="tit-compras">TOTAL</div>
                        <div class="num-cifra">$100000</div>
                    </div>
                </div>  -->              
            </div> 
        </div>
    </div>
</section>
