<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>



    <?php $form = ActiveForm::begin(); ?>
    <div class="cont-infocamposf1">
         <div class="cont-infocampos">
            <?= $form->field($model, 'identity')->textInput(['maxlength' => true]) ?>
        </div>
         <div class="cont-infocampos">
            <?= $form->field($model, 'names')->textInput(['maxlength' => true]) ?>
        </div>
         <div class="cont-infocampos">
            <?= $form->field($model, 'lastnames')->textInput(['maxlength' => true]) ?>
        </div>
         <div class="cont-infocampos">
            <?= $form->field($model, 'birthday')->textInput() ?>
        </div>

    </div>
    <div class="cont-infocamposf1">
        <div class="cont-infocampos">
            <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
        </div>
 <div class="cont-infocampos">
    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
</div>
 <div class="cont-infocampos">
    <?= $form->field($model, 'cellphone')->textInput(['maxlength' => true]) ?>
</div>
 <div class="cont-infocampos">
    <?= $form->field($model, 'sex')->dropDownList([ 'MALE' => 'MALE', 'FEMALE' => 'FEMALE', ], ['prompt' => '']) ?>
</div>
</div>
            <a class="btn-submit">Editar</a> 
            <input type="submit" value="Guardar" class="btn-submit"/>  
    <?php ActiveForm::end(); ?>


