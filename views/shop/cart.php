<?php 
use yii\helpers\Url;
use yii\widgets\ActiveForm;
$this->title = 'Carrito de compras';
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
		<div class="cont-fpago">
        <h1>Seleccione su forma de pago</h1>
        <ul>
        	<li><input type="radio" /><img src="<?= URL::base() ?>/images/diners.png" /></li>
            <li><input type="radio" /><img src="<?= URL::base() ?>/images/mastercard.png" /></li>
            <li><input type="radio" /><img src="<?= URL::base() ?>/images/paypal.png" /></li>
            <li><input type="radio" /><img src="<?= URL::base() ?>/images/visa.png" /></li>
        </ul>             
        </div>
        	<input type="submit" value="PAGAR AHORA"/>
            <?php ActiveForm::end(); ?>
        </div>
    
</section>