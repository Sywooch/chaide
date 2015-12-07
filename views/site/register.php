<?php
use yii\helpers\Html;
// use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

$this->title = 'Registro';

?>
<!-- -->
<section id="registro-chaide" class="background-registro">
	<div class="cont-titulos">
       <h1>REGISTRA TUS DATOS</h1>
       <p>Registrate y compra nuestros productos de una manera más rápida, eficiente y obtén beneficios </p>
       <div class="separador-p"><img src="<?= URL::base() ?>/images/separador.svg"/></div>
   </div>
   <?php $form = ActiveForm::begin(); ?>
   <div class="cont-formulario">
       <div class="cont-campos">
        <?= $form->field($model, 'names')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="cont-campos">
        <?= $form->field($model, 'lastnames')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="cont-campos">
       <?= $form->field($model, 'birthday')->widget(\yii\jui\DatePicker::classname(), [
        'language' => 'es',
        'dateFormat' => 'yyyy-MM-dd',
        'clientOptions'=>[
        //'minDate' => '1900-01-01',      // minimum date
        'maxDate' => date('Y-m-d'),
        'changeMonth'=>true,
        'changeYear'=>true,
        'yearRange'=>'1900:'.date('Y'),
        ]
        ]) ?>
    </div>
    <div class="cont-campos">
       <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
   </div>
   <div class="cont-campos">
    <?= $form->field($model, 'sex')->dropDownList([ 'MALE' => 'HOMBRE', 'FEMALE' => 'MUJER', ], ['prompt' => 'Selecciona una opción.']) ?>
</div>
<div class="cont-campos">
 <?= $form->field($model, 'identity')->textInput(['maxlength' => true]) ?>
</div>
<div class="cont-campos">
    <?= $form->field($model, 'cellphone')->textInput(['maxlength' => true]) ?>
</div>
<div class="cont-campos">
    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
</div>
<div class="cont-campos">
   <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
</div>
<div class="cont-campos">
    <?= $form->field($model, 'confirmPassword')->passwordInput(['maxlength' => true]) ?>
</div>
<input type="submit" value="Regístrate"/>
</div>
<?php ActiveForm::end(); ?>

</section>
<!-- -->