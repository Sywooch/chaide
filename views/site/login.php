<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

$this->title = 'Login';

?>
<section id="registro-chaide" class="background-registro">
    <div class="cont-titulos">
        <h1>Inicia Sesión</h1>
        <p>Ingresa a tu cuenta y compra de una fácil, rápida y segura </p>
        <div class="separador-p"><img src="<?= URL::base() ?>/images/separador.svg"/></div>
    </div>
    <div class="cont-formulario">
            <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'options' => ['class' => ''],
        'fieldConfig' => [
            'template' => "<div class=\"cont-campos\">{label}{input}{error}</div>",
               'options' => [
                            'tag'=>'div'

                        ]
            //'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>
       
            <?= $form->field($model, 'username')->input('email')->label('Usuario') ?>


            <?= $form->field($model, 'password')->passwordInput()->label('Password') ?>
            
        <input type="submit" value="Iniciar Sesión"/>
           <?php ActiveForm::end(); ?>
        <div class="div-registro">
        *Si no posees cuenta en chaide, <a href="<?= Url::to(['site/register']) ?>">Regístrate Aquí</a>
        </div>

    </div>
</section>
<!-- -->
