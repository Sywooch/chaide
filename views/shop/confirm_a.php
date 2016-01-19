<?php
use yii\helpers\Url;
 ?>
<section id="registro-chaide" class="background-registro">
	<div class="cont-titulos">
       <h1>¿Está seguro de realizar la transacción?</h1>
       <div class="separador-p"><img src="<?= URL::base() ?>/images/separador.svg"/></div>
   </div>
      <div class="cont-formulario">
<form name="frmSolicitudPago" method="post"
action="https://test2.alignetsac.com/VPOS/MM/transactionStart20.do">
<input type="hidden" name="IDACQUIRER" value="8">
<input type="hidden" name="IDCOMMERCE" value="6098">
<input type="hidden" name="XMLREQ" value="<?php echo $array_get['XMLREQ'] ?>">
<input type="hidden" name="DIGITALSIGN" value="<?php echo $array_get['DIGITALSIGN'] ?>">
<input type="hidden" name="SESSIONKEY" value="<?php echo $array_get['SESSIONKEY'] ?>">
      <input type="submit" name="comprar" value="Aceptar" id="btn-comprar"/>
</form>
</div>
</section>