<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\City;

/* @var $this yii\web\View */
/* @var $model app\models\Article */
/* @var $form yii\widgets\ActiveForm */
?>
                <div class="cont-infocamposf2" >
                     <?php $form = ActiveForm::begin(); ?>
                <div class="cont-infocampos">
                  <?= $form->field($model, 'city_id')->DropDownList(ArrayHelper::map(City::find()->all(), 'id', 'description')) ?>
                </div>
                <div class="cont-infocampos">
                    <?= $form->field($model, 'street1')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="cont-infocampos">
                    <?= $form->field($model, 'street2')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="cont-infocampos">
                    <?= $form->field($model, 'sector')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="cont-infocampos">
                    <?= $form->field($model, 'number')->textInput(['maxlength' => true]) ?>
                </div>
                <input type="submit" value="Guardar" class="btn-submit"/> 
                <?php ActiveForm::end(); ?>
            </div> 