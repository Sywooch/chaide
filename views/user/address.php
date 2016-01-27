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
            <li><a href="<?= Url::to(['user/address']) ?>"class="p-selected">DIRECCIONES</a></li>
            <li><a href="<?= Url::to(['user/history']) ?>">HISTORIAL</a></li>
        </ul>

        <div id="cont-facturacionp" class="cont-infor" style="display:block">
        		<div id="direccion-registrada">
                    <h1 class="h1-princi">DIRECCIONES DE ENVIO</h1>
                    <?php foreach($delivery as $address): ?>
                    <div class="direcciones-g">
                        <span><?= $address->city->description."-".$address->sector."-".$address->street1."-".$address->street2."-".$address->number ?></span>
                        <a href="<?= Url::to(['user/updatea','id'=>$address->id,'type'=>'D']) ?>">Editar</a>
                        <!-- <a href="#">Borrar</a> -->
                    </div>	
                    <?php endforeach; ?>
                    <a href="<?= Url::to(['user/createa','type'=>'D']) ?>" id="bnt-adireccion">+ AÑADIR DIRECCIÓN</a>
                </div>
                <div id="direccion-registrada">
                    <h1 class="h1-princi">DIRECCIONES DE FACTURACIÓN</h1>
                    <?php foreach($billing as $address): ?>
                    <div class="direcciones-g">
                        <span><?= $address->city->description."-".$address->sector."-".$address->street1."-".$address->street2."-".$address->number ?></span>
                        <a href="<?= Url::to(['user/updatea','id'=>$address->id,'type'=>'B']) ?>">Editar</a>
                        <!-- <a href="#">Borrar</a> -->
                    </div>  
                    <?php endforeach; ?>		
                    <a href="<?= Url::to(['user/createa','type'=>'B']) ?>" id="bnt-adireccion">+ AÑADIR DIRECCIÓN</a>
                </div>

        </div>

    </div>
</section>
