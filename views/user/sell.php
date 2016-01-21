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
            <li><a href="<?= Url::to(['user/address']) ?>">DIRECCIONES</a></li>
            <li><a href="<?= Url::to(['user/history']) ?> "class="p-selected">HISTORIAL</a></li>
        </ul>

        <div id="cont-historialp" class="cont-infor">
            <div class="cont-infocamposf2">
                <h1>ORDEN # <?= $xml->TRANSACCION->NUMORDEN ?></h1>
                <div id="listado-compra">
                    <div class="cont-infocampos">
                        <div class="tit-compras">TARJETA: <?= $xml->TRANSACCION->MARCA ?></div>
                        <div class="tit-compras">FECHA: <?= $xml->TRANSACCION->FECHA ?></div>
                        <div class="tit-compras"># DE AUTORIZACIÓN: <?= $xml->TRANSACCION->NUMAUTORIZA ?></div>
                        <div class="tit-compras">ESTADO: <?= $xml->TRANSACCION->RESULTADO ?></div>

                    </div> 

                </div> 
               <div id="detalle-compra">
               	<?php foreach($model->details as $detail): ?>
                    <div class="cont-infocampos back-de">
                    	<img src="<?= URL::base() ?>/images/productos/<?= $detail->product->picture ?>" class="img-sell">
                        <div class="tit-compras"><?= $detail->product->title ?></div>
                        <div class="num-cifra">$<?= $detail->product->price ?></div>
                    </div>
                <?php endforeach; ?>
                </div>               
            </div> 
        </div>


    </div>
</section>
