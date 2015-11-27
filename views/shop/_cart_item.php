<?php 
use yii\helpers\Url;
?>
  	<div class="cont-campos">
        	<div class="cont-txt">
            	<div class="thumb-carrito"><img src="<?= URL::base() ?>/images/productos/<?= $position->picture ?>" alt="producto"/></div>
            	<span><?= $position->title ?></span>
            </div>
            <div class="cont-cant"><?= $position->quantity ?></div>
            <div class="cont-valor">$<?= $position->price ?></div>
             <div class="cont-valor">$<?= $position->price*$position->quantity ?></div>
        </div>