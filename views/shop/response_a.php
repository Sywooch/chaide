<?php
use yii\helpers\Url;
$message="Felicidades ".Yii::$app->user->identity->names." tu compra ha sido realizada con éxito.";
if($sell->status=="INCOMPLETE"){
$message="La transacción no pudo completarse. Por favor intentanlo de nuevo más tarde.";

}	
     $resultadoAutorizacion = $arrayOut['authorizationResult'];
     $codigoAutorizacion = $arrayOut['authorizationCode'];
	 $codigoError = $arrayOut['errorCode'];
	 $errormensaje = $arrayOut['errorMessage'];
$purchaseOperationNumber=$arrayOut['purchaseOperationNumber'];
 ?>
 <section id="registro-chaide" class="background-registro">
	<div class="cont-titulos">

       <h1><?= $message ?></h1>
       <div class="separador-p"><img src="<?= URL::base() ?>/images/separador.svg"/></div>
   </div>
      <div class="cont-formulario">
      <div class="cont-resc">
      	<label>Transaccion ID Session Portal <? ?></label>
        <div class="valor-ex"><?= $purchaseOperationNumber ?></div>
      </div>
      <div class="cont-resc">
        <label>Resultado Autorizacion</label>
        <div class="valor-ex"><?= $resultadoAutorizacion ?></div>
      </div>
        <div class="cont-resc">
        <label>Codigo Autorizacion</label>
        <div class="valor-ex"><?= $codigoAutorizacion ?></div>
      </div>
      <div class="cont-resc">
      	<label>Codigo error</label>
        <div class="valor-ex"><?= $codigoError ?></div>
      </div>
      <div class="cont-resc">
      	<label>Error mensaje</label>
        <div class="valor-ex"><?= $errormensaje ?></div>
      </div>
      <div class="cont-resc">
      	<label>Fecha</label>
        <div class="valor-ex"><?= $sell->creation_date ?></div>
      </div>
      <div class="cont-resc">
      	<label>Valor</label>
        <div class="valor-ex"><?php //$value;?></div>
      </div>
      <div class="cont-resc">
      	<label>ESTADO</label>
        <div class="valor-ex"><?= $sell->status; ?></div>
      </div>

</div>
</section>
