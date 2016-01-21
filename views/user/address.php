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

                <div class="cont-infocamposf2" >
                <h1>DIRECCIONES DE ENVÍO</h1>
                <div class="cont-infocampos">
                    <label>Ciudad:</label>
                    <select>
                        <option>Quito</option>
                        <option>Guayaquil</option>
                    </select>
                </div>
                <div class="cont-infocampos">
                    <label>Calle 1:</label>
                    <input type="text"/>
                </div>
                <div class="cont-infocampos">
                    <label>Calle 2:</label>
                    <input type="text"/>
                </div>
                <div class="cont-infocampos">
                    <label>Sector:</label>
                    <input type="text"/>
                </div>
                <div class="cont-infocampos">
                    <label>Número:</label>
                    <input type="text"/>
                </div>
                <input type="submit" value="Editar" class="btn-submit"/> 
                <input type="submit" value="Guardar" class="btn-submit"/> 
            </div> 
        </div>

    </div>
</section>
