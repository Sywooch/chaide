<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use app\assets\AppAsset;
use yii\web\View;
/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
$script='$(document).ready(function() {
        $("#edit").on("click", function(e){
    $("input").prop("readonly", false);
    });
});
';
$this->registerJs($script,View::POS_END);
AppAsset::register($this);
?>




    <?php $form = ActiveForm::begin(); ?>
    <div class="cont-infocamposf1">
         <div class="cont-infocampos">
            <?= $form->field($model, 'identity')->textInput(['maxlength' => true, 'readonly'=>'readonly']) ?>
        </div>
         <div class="cont-infocampos">
            <?= $form->field($model, 'names')->textInput(['maxlength' => true, 'readonly'=>'readonly']) ?>
        </div>
         <div class="cont-infocampos">
            <?= $form->field($model, 'lastnames')->textInput(['maxlength' => true, 'readonly'=>'readonly']) ?>
        </div>
         <div class="cont-infocampos">
       <?= $form->field($model, 'birthday')->widget(\yii\jui\DatePicker::classname(), [
        'language' => 'es',
        'dateFormat' => 'yyyy-MM-dd',
        'clientOptions'=>[
        //'minDate' => '1900-01-01',      // minimum date
        'maxDate' => date('Y-m-d'),
        'changeMonth'=>true,
        'changeYear'=>true,
        'yearRange'=>'1900:'.date('Y'),
        'readonly'=>'readonly'
        ]
        ]) ?>
        </div>

    </div>
    <div class="cont-infocamposf1">
        <div class="cont-infocampos">
            <?= $form->field($model, 'username')->textInput(['maxlength' => true, 'readonly'=>'readonly']) ?>
        </div>
 <div class="cont-infocampos">
    <?= $form->field($model, 'phone')->textInput(['maxlength' => true, 'readonly'=>'readonly']) ?>
</div>
 <div class="cont-infocampos">
    <?= $form->field($model, 'cellphone')->textInput(['maxlength' => true, 'readonly'=>'readonly']) ?>
</div>
 <div class="cont-infocampos">
    <?= $form->field($model, 'sex')->dropDownList([ 'MALE' => 'HOMBRE', 'FEMALE' => 'MUJER', ], ['prompt' => '', 'readonly'=>'readonly']) ?>
</div>
</div>
            <a id="edit" class="btn-submit">Editar</a> 
            <input type="submit" value="Guardar" class="btn-submit"/>  
    <?php ActiveForm::end(); ?>


