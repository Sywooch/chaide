<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
$float_der="float-der";
$float_izq="float-izq";
/* @var $this yii\web\View */
/* @var $searchModel app\models\ArticleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


?>
<section class="cont-secciones">
    <div class="not-principal">
        <img src="<?= URL::base() ?>/images/news/<?= $principal->picture ?>"/>
        <div class="inf-notprincipal">
            <h1><?= $principal->title ?></h1>
            <a href="<?= Url::to(['article/view','id'=>$principal->id,'#'=>mb_strtoupper($principal->title)]) ?>">CONOCE MÁS</a>
        </div>
    </div>
    <div class="art-interes">ARTÍCULOS DE INTERES</div>
    <ul class="secciones-noticias">
        <li><a href="#" class="b-selected">VIDA</a></li>
        <li><a href="#">TECNOLOGÍA EN MATERIALES</a></li>
        <li><a href="#">TECNOLOGÍA EN TELAS</a></li>
        <li><a href="#">TECNOLOGÍA EN ESTRUCTURA</a></li>
    </ul>
    <div class="secc-noticia">
        <h1>VIDA</h1>
        <?php foreach($vida as $k => $vi):
            if($k%2){ $float=$float_izq; }else{ $float=$float_der;  }
         ?>
        <div class="cont-noticia">
            <div class="thumb-noticias <?= $float ?>">
            	<img src="<?= URL::base() ?>/images/news/<?= $vi->picture ?>" />
            </div>
            <div class="txt-noticia <?= $float ?>">
                <h1><?= mb_strtoupper($vi->title) ?></h1>
                <p>
                    <?= substr($vi->description, 0,150); ?>
                </p>
                <a href="<?= Url::to(['article/view','id'=>$vi->id,'#'=>mb_strtoupper($vi->title)]) ?>">Leer más >></a>
            </div>
        </div>
    <?php endforeach; ?>
        <!-- -->
        <h1>TECNOLOGÍA EN MATERIALES</h1>
        <?php foreach($materiales as $k => $vi):
            if($k%2){ $float=$float_izq; }else{ $float=$float_der;  }
         ?>
        <div class="cont-noticia">
            <div class="thumb-noticias <?= $float ?>">
            	<img src="<?= URL::base() ?>/images/news/<?= $vi->picture ?>" />
            </div>
            <div class="txt-noticia <?= $float ?>">
                <h1><?= mb_strtoupper($vi->title) ?></h1>
                <p>
                    <?= substr($vi->description, 0,150); ?>
                </p>
                <a href="<?= Url::to(['article/view','id'=>$vi->id,'#'=>mb_strtoupper($vi->title)]) ?>">Leer más >></a>
            </div>
        </div>
    <?php endforeach; ?>
        <!-- -->
        <h1>TECNOLOGÍA EN TELAS</h1>
        <?php foreach($telas as $k => $vi):
            if($k%2){ $float=$float_izq; }else{ $float=$float_der;  }
         ?>
        <div class="cont-noticia">
            <div class="thumb-noticias <?= $float ?>">
            	<img src="<?= URL::base() ?>/images/news/<?= $vi->picture ?>" />
            </div>
            <div class="txt-noticia <?= $float ?>">
                <h1><?= mb_strtoupper($vi->title) ?></h1>
                <p>
                    <?= substr($vi->description, 0,150); ?>
                </p>
                <a href="<?= Url::to(['article/view','id'=>$vi->id,'#'=>mb_strtoupper($vi->title)]) ?>">Leer más >></a>
            </div>
        </div>
    <?php endforeach; ?>
        <!-- -->
        <h1>TECNOLOGÍA EN ESTRUCTURA</h1>
        <?php foreach($estructura as $k => $vi):
            if($k%2){ $float=$float_izq; }else{ $float=$float_der;  }
         ?>
        <div class="cont-noticia">
            <div class="thumb-noticias <?= $float ?>">
            	<img src="<?= URL::base() ?>/images/news/<?= $vi->picture ?>" />
            </div>
            <div class="txt-noticia <?= $float ?>">
                <h1><?= mb_strtoupper($vi->title) ?></h1>
                <p>
                    <?= substr($vi->description, 0,150); ?>
                </p>
                <a href="<?= Url::to(['article/view','id'=>$vi->id,'#'=>mb_strtoupper($vi->title)]) ?>">Leer más >></a>
            </div>
        </div>
    <?php endforeach; ?>
        <!-- -->
    </div>
</section>
