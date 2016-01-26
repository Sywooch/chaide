<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use app\assets\AppAsset;
use yii\web\View;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\models\Product */
$script='$("#play").click(function(){
        $("#video-colchon-interna").get(0).play();  
        $("#play").fadeOut();
        $("#stop").show();
    });
$("#stop").click(function(){
        $("#stop").hide();
        $("#video-colchon-interna").get(0).pause(); 
        $("#play").fadeIn();
    });
    $("#sap_mesure").change(function(){
        var id= $(this).val();
        var aux= "price-";
        $("[id^="+aux+"]").hide();
        $("#price-"+id).show();
    });'; 
$this->registerJs($script,View::POS_END);
AppAsset::register($this);
$this->title = $model->title;
?>
<!-- -->
<section id="interna-chaide" class="background-colchonint" style="background-image:url('../images/productos-interna/<?= $model->background1 ?>')">
    <img src="<?= URL::base() ?>/images/productos-interna/<?= $model->background1 ?>" alt="img carresa" class="colchon-celular"/> 
    <div class="n-colchon"><img src="<?= URL::base() ?>/images/tit-caressa.svg"/></div>
    <div class="cont-compra">
        <div class="barra-azul">
            <?= strtoupper($model->title) ?>
        </div>
    <?php $form = ActiveForm::begin([

        'id' => 'active-form',
        'action'=>['shop/addtocart'],
        'method' => 'get',

    ]); ?>
        <div class="info-colchon">
            <div class="cont-fcompra">
                <!--<span>Colchon Caressa</span>-->
                <div class="cont-imgref">
                    <a href="<?= URL::base() ?>/images/productos/colchon1-grande.png" class="fancybox"><img src="<?= URL::base() ?>/images/productos/<?= $model->picture ?>" alt="imagen-producto"/></a>
                </div>
                <?php if($model->colors){ ?>
                <span>Telas Disponibles:</span>
                <ul>
                    <?php foreach($model->colors as $color): ?>
                    <li><img src="<?= URL::base() ?>/images/<?= $color->icon ?>"/></li>
                    <?php endforeach; ?>
                </ul>
                <?php } ?>
            </div>
         
            <div class="cont-fcompra">
                <span>Medidas Disponibles:</span>
                <select id="sap_mesure" name="id">
                   <?php foreach($model->sapCodes as $k => $code): ?>
                   <?php 
                   if($k==0){
                   $sap=$code;
                   }
                   ?>
                    <?php if($code->mesure){ ?>
                    <option value="<?= $code->id ?>"><?= $code->mesure->description ?></option>
                                <?php } 
                                endforeach; ?>
                </select>
            </div>
            <?php if($code->color){  ?>
            <div class="cont-fcompra">
                <span>Color:</span>
                <select>
                    
                    <option value="<?= $code->id ?>"><?= $code->color->description ?></option>
                   
                </select>
            </div>
            <?php }  ?>
<!--             <div class="cont-fcompra">
            <span>Cantidad:</span>
                <select>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                </select>
            </div> -->
        </div>
        <div class="cont-precio">
            <div id="price-<?= $sap->id ?>" class="precio-colchon">$<?= $sap->price ?><br/><span>(No incluye IVA)</span></div>
            <?php foreach($model->sapCodes as $k => $code):
            if($k!=0){
             ?>
            <div id="price-<?= $code->id ?>" style="display:none" class="precio-colchon">$<?= $sap->price ?><br/><span>(No incluye IVA)</span></div>
        <?php } endforeach; ?>
            <div class="cont-input"> <?= Html::submitButton('Comprar Ahora', ['class' => 'link-comprar2']) ?></div>
        </div>
      <?php  ActiveForm::end(); ?>
    </div>

</section>
<!-- -->
<?php if($model->line->id==1): ?>
<section class="cont-secciones">
    <!--<img src="<?= URL::base() ?>/images/img-elaboradalatex.jpg" alt="img elaborada latex"/>
    <div class="txt-colchonint">
        <h1>EXTRA SOFT <br/> <font>BOX TOP</font></h1>
        <p>
        Sobrecapa elaborada con látex, material de extraordinaria elasticidad que se adapta perfectamente a la forma del cuerpo, brindando soporte óptimo a cada parte y curva de éste, sin crearpuntos de presión.
        </p>
    </div>-->
    <video loop id="video-colchon-interna">
      <source src="<?= Url::to('@web/videos/chaide_maqueta_2.ogv') ?>" type="video/ogg">
      <source src="<?= Url::to('@web/videos/chaide_maqueta_2.mp4') ?>" type="video/mp4">
      <source src="<?= Url::to('@web/videos/chaide_maqueta_2.webm') ?>" type="video/webm">
      Your browser does not support the video tag.
    </video>
    <div class="cont-video" id="play">
        <img src="<?= URL::base() ?>/images/btn-play.svg" id="btn_play"/>
    </div>
    <div class="cont-video" id="stop"></div>
</section>
<?php endif; ?>
<!-- -->
<section class="cont-colchonint2">
    <img src="<?= URL::base() ?>/images/int-colchon2.jpg" class="colchon-celular"/>
    <div class="secc-intcolchon">
        <ul class="ventajas-<?= count($model->advantages) ?>">
            <?php foreach($model->advantages as $advantage): ?>
            <li>
                <h1><?= $advantage->title ?></h1>
                <p>
                    <?= $advantage->description ?>
                </p>
                <img src="<?= URL::base() ?>/images/propiedades-colchon/<?= $advantage->icon ?>" class="img-propiedad"/>
            </li>
            <?php endforeach; ?>
        </ul>   
    </div>
</section>
<?php if($model->line->id==1 || $model->line->id==2 ){ ?>

<section class="cont-colchonint3">
    <div class="cont-colchon360">
        <?php if($model->render){ ?>
        <iframe src="<?= URL::base() ?>/render/<?= $model->render ?>/index.html"></iframe>
        <?php }else{ ?>
        <img src="<?= URL::base() ?>/images/productos/<?= $model->picture ?>" alt="img carresa" /> 
        <?php } ?>
    </div>
    <div class="txt-estructura-interna">
        <h1>ESTRUCTURA INTERNA</h1>
        <ul>
            <?php foreach($model->characteristics as $characteristic): ?>
            <li><?= ucfirst($characteristic->description) ?></li>
            <?php endforeach; ?>
        </ul>
        <div class="cont-medidas50">
            <div class="barra-azul">
                NIVEL DE SOPORTE Y CONFORT
            </div>
            <div class="img-comfort"><img src="<?= URL::base() ?>/images/b-confort.jpg" alt="escala confort"/></div>
            <span class="span-estructura-c">Recomendado para personas con peso máximo individual de <?= $model->support ?>lb.</span>
            <div class="txt-altura"><?= $model->warranty ?> Años de Garantía</div>
        </div>
    </div>

    
</section>
<?php } ?>
<!-- ARTICULOS RELACIONADOS -->
	<div class="footter-home">
   	 	<ul>
    		<li>
            	<img src="<?= URL::base() ?>/images/ico-tiempo.svg" alt="ahorre tiempo"/>
                <div class="txt-informativo">
                	<h1>AHORRE SU TIEMPO</h1>
                    <span>Realice su compra por internet</span>
                </div>
            </li>
        	<li class="li-medium">
            	<img src="<?= URL::base() ?>/images/ico-geotrust.svg" alt="geotrust"/>
                <div class="txt-informativo-medium">
                	<h1>GEOTRUST</h1>
                    <span>Compra 100% segura</span>
                </div>
            </li>
        	<li>
            	<img src="<?= URL::base() ?>/images/ico-envio.svg" alt="envio gratis"/>
                <div class="txt-informativo">
                	<h1>ENVÍO GRATIS</h1>
                    <span>En facturas superiores a $200</span>
                </div>
            </li>
     	</ul>
	</div>
<!-- -->
<section class="cont-secciones">
	<h1>COMPLETA TU COMPRA</h1>
    <p>Con esta gran variedad de productos que Chaide te ofrece</p>
    <ul>
        	<li>
            	<a href="colchon-interna.html"><img src="<?= URL::base() ?>/images/productos/colchon1.png" alt="productos chaide"/><h1>CARRESA</h1><h2>Desde <strong>$776.92</strong> (No incluye IVA)</h2></a>
                <a href="#" class="link-comprar">Comprar</a>
                <div class="c-comparar">
                	<input type="checkbox" /><label>Comparar</label>
                </div>
            </li>
            <li>
            	<img src="<?= URL::base() ?>/images/productos/sabanas.png" alt="productos chaide"/><h1>SÁBANAS FIORE</h1><h2>Desde <strong>$776.92</strong> (No incluye IVA)</h2>
                <a href="#" class="link-comprar">Comprar</a>
                <div class="c-comparar">
                	<input type="checkbox" /><label>Comparar</label>
                </div>
            </li>
            <li>
            	<img src="<?= URL::base() ?>/images/productos/almohada.png" alt="productos chaide"/><h1>ALMOHADA MEMORY FOAM</h1><h2>Desde <strong>$776.92</strong> (No incluye IVA)</h2>
                <a href="#" class="link-comprar">Comprar</a>
                <div class="c-comparar">
                	<input type="checkbox" /><label>Comparar</label>
                </div>
            </li>
            <li>
            	<img src="<?= URL::base() ?>/images/productos/legs.png" alt="productos chaide"/><h1>LEGS</h1><h2>Desde <strong>$776.92</strong> (No incluye IVA)</h2>
                <a href="#" class="link-comprar">Comprar</a>
                <div class="c-comparar">
                	<input type="checkbox" /><label>Comparar</label>
                </div>
            </li>
    </ul>         
</section>
<!-- -->