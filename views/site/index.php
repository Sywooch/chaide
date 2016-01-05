<?php
use yii\helpers\Url;
use app\models\Product;
use app\models\Line;
/* @var $this yii\web\View */
$this->title = 'Chaide';
$message="";
?>
<?php if(Yii::$app->getSession()->getFlash('success')){ ?>
<div class="flash_message_success">
 <?= Yii::$app->getSession()->getFlash('success'); ?>
 <div class="btn-cerrarw"><img src="<?= URL::base() ?>/images/btn-cerrarw.svg"/></div>
</div>
    <?php } ?>
    <?php if(Yii::$app->getSession()->getFlash('warning')){ ?>
<div class="flash_message_warning">
 <?= Yii::$app->getSession()->getFlash('warning'); ?>
  <div class="btn-cerrarw"><img src="<?= URL::base() ?>/images/btn-cerrarw.svg"/></div>
</div>
    <?php } ?>
<section id="home-chaide" class="background-home">
    <div class="inf-home">
        <div class="borde-externo">
        <span>DISFRUTA DE UN NIVEL SUPERIOR DE CONFORT<br/>
        con la frescura del gel</span>
        </div>
        <a href="<?= URl::to(['line/view','id'=>'1','#'=>'LÍNEA RESTONIC']) ?>"><div class="btn-comprara">Comprar ahora</div></a>
    </div>
</section>
<!-- -->
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
    <section class="sect-productos">
        <div id="secc-almohadas">
            <img src="<?= URL::base() ?>/images/<?= $line->picture ?>"/>
            <a href="<?= URl::to(['line/view','id'=>$line->id,'#'=>$line->description]) ?>"><div class="btn-comprar2">Comprar</div></a>
            <div class="txt-secciones background-almohadas">
                <h1><?= strtoupper($line->title) ?></h1>
                <span><?= $line->description ?></span>
            </div>
        </div> 
        <!-- <a href="#" class="flecha-l"><img src="<?= URL::base() ?>/images/flecha-seccL.svg" alt="flecha"/></a> -->
    </section>
    <?php 
if(Yii::$app->getRequest()->getCookies()->has('line')){
    $line_id=Yii::$app->getRequest()->getCookies()->getValue('line');
    $line_i=Line::findOne($line_id);
?>
    <section class="sect-productos">
        <div id="secc-edredones">
            <img src="<?= URL::base() ?>/images/<?= $line_i->picture ?>"/>
            <a href="<?= URl::to(['line/view','id'=>$line_i->id,'#'=>$line->description]) ?>"><div class="btn-comprar2">Comprar</div></a>
            <div class="txt-secciones background-edredones">
                <h1><?= strtoupper($line_i->title) ?></h1>
                <span><?= $line_i->description ?></span>
            </div>
        </div>
        <!-- <a href="#" class="flecha-r"><img src="<?= URL::base() ?>/images/flecha-seccR.svg" alt="flecha"/></a> -->
    </section>
    <?php }else{ ?>
        <section class="sect-productos">
        <div id="secc-edredones">
            <img src="<?= URL::base() ?>/images/cont-seccion2.jpg"/>
            <a href="<?= URl::to(['line/view','id'=>'1','#'=>'LÍNEA RESTONIC']) ?>"><div class="btn-comprar2">Comprar</div></a>
            <div class="txt-secciones background-edredones">
                <h1>LÍNEA RESTONIC</h1>
                <span>Innovamos para brindarte el mejor descanso. Conoce nuestra línea de colchones.</span>
            </div>
        </div>
        <!-- <a href="#" class="flecha-r"><img src="<?= URL::base() ?>/images/flecha-seccR.svg" alt="flecha"/></a> -->
    </section>
    <?php } ?>
</section>
<!-- -->
<?php 
if(Yii::$app->getRequest()->getCookies()->has('product')){
    $product_id=Yii::$app->getRequest()->getCookies()->getValue('product');
    $product_i=Product::findOne($product_id);
?>
<section class="cont-servicios" style="background-image:url('<?= URL::base() ?>/images/productos-interna/<?= $product_i->background1 ?>')">
    <div class="txt-secc">
        <span id="linea-s"><?= $product_i->title ?></span>
<!--         <span id="linea-s">línea</span>
        <span id="linea-c">Caressa</span> -->
        <span id="txt-linea">Accede a nuestras promociones, ahorra tu tiempo.
Nosotros nos encargamos de tu comodidad.</span>
        <a href="<?= URl::to(['product/view','id'=>$product_i->id,'#'=>$product_i->title]) ?>"><div class="btn-comprar3">Comprar</div></a>
    </div>
</section>
<?php }else{ ?>
<section class="cont-servicios" style="background-image:url('<?= URL::base() ?>/images/productos-interna/CARESSA.jpg')">
    <div class="txt-secc">
        <span id="linea-s">Caressa</span>
<!--         <span id="linea-s">línea</span>
        <span id="linea-c">Caressa</span> -->
        <span id="txt-linea">Accede a nuestras promociones, ahorra tu tiempo.
Nosotros nos encargamos de tu comodidad.</span>
        <a href="<?= URl::to(['product/view','id'=>'6','#'=>'Caressa']) ?>"><div class="btn-comprar3">Comprar</div></a>
    </div>
</section>
<?php } ?>
<!-- -->
