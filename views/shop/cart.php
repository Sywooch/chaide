<?php 
use yii\helpers\Url;
$total=0;
$cantidad=1;
?>
 <section id="home-chaide" class="background-registro">
	<div class="cont-titulos">
    	<h1>CARRITO DE COMPRAS</h1>
        <p>Revisa tu carrito de compras</p>
        <div class="separador-p"><img src="<?= URL::base() ?>/images/separador.svg"/></div>
	</div>
    <div class="cont-formulario">
    	        <form action="registro.html">
   		<div class="cont-campos-header">
        	<div class="cont-txt tit-carrit">&nbsp;</div>
            <div class="cont-cant tit-carri">CANTIDAD</div>
            <div class="cont-valor tit-carri">VALOR UNITARIO</div>
             <div class="cont-valor tit-carri">VALOR</div>
        </div>
        <?php
   foreach(Yii::$app->cart->positions as $position){
          echo $this->render('_cart_item',['position'=>$position]);
          //var_dump($position);
          $total+=$position->price;
          $cantidad+=$position->quantity;
        }
 ?>
  
       
        <div class="cont-campos-header">
        	<div class="cont-txt tit-carrit">&nbsp;</div>
            <div class="cont-cant c-gris">TOTAL</div>
            <div class="cont-valor c-gris">$<?= $total*$cantidad ?></div>
        </div>

        	<input type="submit" value="Pagar Ahora"/>
        </form>
    </div>
</section>