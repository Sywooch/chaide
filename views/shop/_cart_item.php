<?php 
use yii\helpers\Url;
?>
  	<div class="cont-campos">
        	<div class="cont-imgthumb">
            	<img src="<?= URL::base() ?>/images/productos/<?= $position->picture ?>" alt="producto"/>
            </div>
            <div class="cont-txt">
            	<?= $position->title ?>
            </div>
            <div class="cont-cant"><?= $position->quantity ?></div>
            <div class="cont-valor">$<?= $position->price ?></div>
            <div class="cont-valor">$<?= $position->price*$position->quantity ?><div class="erase-product"><a href="<?= Url::to(['shop/removefromcart','id'=>$position->id]) ?>"><img src="<?= URL::base() ?>/images/btn-cerrar.svg"/></a></div></div>
            
        </div>