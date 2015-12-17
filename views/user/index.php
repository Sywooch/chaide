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
            <li><a href="#" class="p-selected">DATOS PERSONALES</a></li>
            <li><a href="#">FACTURACIÓN</a></li>
            <li><a href="#">HISTORIAL</a></li>
        </ul>
        <div id="cont-datosp" class="cont-infor">
            <div class="cont-infocamposf1">
                <div class="cont-infocampos">
                    <label>Nombre:</label>
                    <input type="text"/>
                </div>
                <div class="cont-infocampos">
                    <label>Apellido:</label>
                    <input type="text"/>
                </div>
                <div class="cont-infocampos">
                    <label>Cédula:</label>
                    <input type="text"/>
                </div>
                <div class="cont-infocampos">
                    <label>E-mail:</label>
                    <input type="text"/>
                </div>
            </div>
            <div class="cont-infocamposf1">
                <div class="cont-infocampos">
                    <label>Teléfono:</label>
                    <input type="text"/>
                </div>
                <div class="cont-infocampos">
                    <label>Celular:</label>
                    <input type="text"/>
                </div>
                <div class="cont-infocampos">
                    <label>Sexo:</label>
                    <input type="text"/>
                </div>
                <div class="cont-infocampos">
                    <label>Fecha de nacimiento:</label>
                    <input type="text"/>
                </div>
            </div> 
            <input type="submit" value="Editar" class="btn-submit"/> 
            <input type="submit" value="Guardar" class="btn-submit"/>           
        </div>
        <div id="cont-facturacionp" class="cont-infor">
            <div class="cont-infocamposf2">
                <h1>DIRECCIÓN DE FACTURACIÓN</h1>
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
        <div id="cont-historialp" class="cont-infor">
            <div class="cont-infocamposf2">
                <h1>HISTORIAL DE COMPRA</h1>
                <div id="listado-compra">
                    <div class="cont-infocampos">
                        <div class="tit-compras">Compra #1 - 1 de Diciembre 2015</div>
                        <a href="#" class="btn-vercompras">VER</a>
                    </div> 
                    <div class="cont-infocampos">
                        <div class="tit-compras">Compra #1 - 1 de Diciembre 2015</div>
                        <a href="#" class="btn-vercompras">VER</a>
                    </div> 
                    <div class="cont-infocampos">
                        <div class="tit-compras">Compra #1 - 1 de Diciembre 2015</div>
                        <a href="#" class="btn-vercompras">VER</a>
                    </div> 
                </div> 
                <div id="detalle-compra">
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
                </div>               
            </div> 
        </div>
    </div>
</section>
