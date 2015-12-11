<?php
use yii\helpers\Url;
 ?>
<section id="registro-chaide" class="background-registro">
	<div class="cont-titulos">
       <h1>¿Está seguro de realizar la transacción?</h1>
       <div class="separador-p"><img src="<?= URL::base() ?>/images/separador.svg"/></div>
   </div>
      <div class="cont-formulario">
<form name="frmSolicitudPago" method="post" action="https://www3.interdinmpi.com.ec/webmpi/vpos" >
	<input type="submit" name="btAceptar" value="Aceptar"/></td>

	<input type="hidden" name="TRANSACCIONID" value="<?= $transactionid ?>"/>
	<input type="hidden" name="XMLREQUEST" value="<?= $xmlRequest ?>"/>
	<input type="hidden" name="XMLDIGITALSIGN" value="<?= $xmlDigitalSign ?>"/>
	<input type="hidden" name="XMLACQUIRERID" value="1790241483001"/>
	<input type="hidden" name="XMLMERCHANTID" value="1790241483001"/>
	<input type="hidden" name="XMLGENERATEKEY" value="<?= $xmlGenerateKeyI ?>"/>
</form>
</div>
</section>