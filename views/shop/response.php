<?php
use yii\helpers\Url;
$message="Felicidades ".Yii::$app->user->identity->names." tu compra ha sido realizada con éxito.";
if($status=="N"){
$message="La transacción no pudo completarse. Por favor intentanlo de nuevo más tarde.";
}

 ?>
 <section id="registro-chaide" class="background-registro">
	<div class="cont-titulos">

       <h1><?= $message ?></h1>
       <div class="separador-p"><img src="<?= URL::base() ?>/images/separador.svg"/></div>
   </div>
      <div class="cont-formulario">
      <div class="cont-resc">
      	<label>Transaccion ID Session Portal <? ?></label>
        <div class="valor-ex"><?= $transactionID ?></div>
      </div>
      <div class="cont-resc">
      	<label>Impuesto 1</label>
        <div class="valor-ex"><?= $tax1 ?></div>
      </div>
      <div class="cont-resc">
      	<label>Impuesto 2</label>
        <div class="valor-ex"><?= $tax2 ?></div>
      </div>
      <div class="cont-resc">
      	<label>Propina</label>
        <div class="valor-ex"><?= $tip ?></div>
      </div>
      <div class="cont-resc">
      	<label>Valor</label>
        <div class="valor-ex"><?= $value;?></div>
      </div>
      <div class="cont-resc">
      	<label>EST ADO</label>
        <div class="valor-ex"><?= $status; ?></div>
      </div>
      <div class="cont-resc">
      	<label>NÚMERO AUTORIZACION</label>
        <div class="valor-ex"><?= $auth; ?></div>
      </div>
</div>
</section>
