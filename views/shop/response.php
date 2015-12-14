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
 <TABLE id="Table16" style="WIDTH: 456px; HEIGHT: 249px" height="249" cellSpacing="1" cellPadding="1" width="456" border="0">
<TR>
<TD style="WIDTH: 128px" width="128"></TD> <TD>Transaccion ID Session Portal <? ?></TD>
<TD><?= $transactionID ?></TD> </TR>
<TR>
<TD style="WIDTH: 128px" width="128"></TD> <TD>Impuesto 1</TD>
<TD><?= $tax1 ?></TD>
</TR>
<TR>
<TD style="WIDTH: 128px" width="128"></TD> <TD>Impuesto 2</TD>
<TD><?= $tax2 ?></TD>
</TR>
<TR>
<TD style="WIDTH: 128px" width="128"></TD> <TD>Propina</TD>
<TD><?= $tip ?></TD>
</TR>
<TR>
<TD style="WIDTH: 128px" width="128"></TD> <TD>Valor</TD>
<TD><?= $value;?></TD> </TR>
<TR>
<TD style="WIDTH: 128px" width="128"></TD> <TD>EST ADO</TD>
<TD><?= $status; ?></TD> </TR>
<TR>
<TD style="WIDTH: 128px" width="128"></TD> <TD>NUMERO AUTORIZACION</TD>
￼￼<TD><?= $auth; ?></TD> </TR>

</TR> </TABLE>
</div>
</section>
