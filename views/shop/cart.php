<?php 
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use app\assets\AppAsset;
use yii\web\View;
$this->title = 'Carrito de compras';
$script='$(document).ready(function() {
    $("#interdin").on("click", function(e){
$("form").attr("action", "vpossend").submit();
});
    $("#pacificard").on("click", function(e){
$("form").attr("action", "vpossend2").submit();
});
});
';
$this->registerJs($script,View::POS_END);
AppAsset::register($this);
?>
<?php if(Yii::$app->getSession()->getFlash('warning')){ ?>
<div class="flash_message_success">
 <?= Yii::$app->getSession()->getFlash('warning'); ?>
 <div class="btn-cerrarw"><img src="<?= URL::base() ?>/images/btn-cerrarw.svg"/></div>
</div>
    <?php } ?>
 <section id="home-chaide" class="background-registro">
	<div class="cont-titulos">
    	<h1>CARRITO DE COMPRAS</h1>
        <p>Revisa tu carrito de compras</p>
        <div class="separador-p"><img src="<?= URL::base() ?>/images/separador.svg"/></div>
	</div>
    <div class="cont-formulario">
    	     <?php $form = ActiveForm::begin(['action' => 'vpossend','options' => ['method' => 'post']]); ?>
   		<div class="cont-campos-header">
        	<div class="cont-imgthumb tit-carrit">&nbsp;</div>
        	<div class="cont-txt tit-carrit">&nbsp;</div>
            <div class="cont-cant tit-carri">CANTIDAD</div>
            <div class="cont-valor tit-carri">VALOR UNITARIO</div>
             <div class="cont-valor tit-carri">VALOR</div>
        </div>
        <?php
   foreach(Yii::$app->cart->positions as $position){
          echo $this->render('_cart_item',['position'=>$position]);
          //var_dump($position);
   
        }
 ?>
  		
        <div class="cont-campos-header">
        	<div class="cont-imgthumb tit-carrit">&nbsp;</div>
        	<div class="cont-txt tit-carrit">&nbsp;</div>
            <div class="cont-cant tit-carrit">&nbsp;</div>
            <div class="cont-cant c-gris">TOTAL</div>
            <div class="cont-valor c-gris">$<?= Yii::$app->cart->getCost() ?></div>
		</div>
      <input type="hidden" name="Subtotal" value="<?= Yii::$app->cart->getCost() ?>" />
      <input type="hidden" name="impuesto1" value="<?= Yii::$app->cart->getCost()*0.12 ?>" />
      <input type="hidden" name="impuesto2" value="0" />
      <input type="hidden" name="propina" value="0" />
       <input type="hidden" name="txtReferencia1" value="0" />
       <input type="hidden" name="txtReferencia2" value="0" />
       <input type="hidden" name="txtReferencia3" value="0" />
       <input type="hidden" name="txtReferencia4" value="0" />
       <input type="hidden" name="txtReferencia5" value="0" />  
       	<div id="cont-direccion">
        	<div class="direc-50">
            	<h1>Escojer datos de facturación:</h1>
                <select>
                	<option>Facturacion Envio1</option>
                    <option>Facturacion Envio2</option>
                </select>
                <div class="info-faturacion">
                 	<strong>Dirección:</strong> Alonso de Torres y James Colmet.<br/>
                 	<strong>No. Calle:</strong> N40 - 86<br/>
                 	<strong>Ciudad:</strong> Quito<br/>
                 	<strong>Sector:</strong> El Bosque<br/>
                    <span>Si no posees direccion de Facturación. <a href="#">Ingresa aquí</a></span>
                </div>
            </div>
            <div class="direc-50">
            	<h1>Escojer la dirección de envio:</h1>
                <select>
                	<option>Direccion Envio1</option>
                    <option>Direccion Envio2</option>
                </select>
                <div class="info-faturacion">
                 	<strong>Dirección:</strong> Alonso de Torres y James Colmet.<br/>
                 	<strong>No. Calle:</strong> N40 - 86<br/>
                 	<strong>Ciudad:</strong> Quito<br/>
                 	<strong>Sector:</strong> El Bosque<br/>
                    <span>Si no posees direccion de Envío. <a href="#">Ingresa aquí</a></span>
                </div>
            </div>
        </div>
		<div class="cont-fpago">
        <h1>Pagar Con:</h1>
       
        	<a id="interdin" href="#" class="btn-pago"><img  src="<?= URL::base() ?>/images/tarjetas-05.png" /></a>
            
            <a id="pacificard" href="#" class="btn-pago"><img  src="<?= URL::base() ?>/images/tarjetas-06.png" /></a>
        
               
        </div>
        	<!-- <input type="submit" value="PAGAR AHORA"/> -->
            <?php ActiveForm::end(); ?>
        </div>
    
</section>
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