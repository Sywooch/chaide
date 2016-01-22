                <div class="cont-infocamposf2" id="formulario-direccion">
                     <?php $form = ActiveForm::begin(); ?>
                <h1>DIRECCIONES DE ENVÍO</h1>
                <div class="cont-infocampos">
                    <label>Ciudad:</label>
                    <select>
                        <option>Quito</option>
                        <option>Guayaquil</option>
                    </select>
                </div>
                <div class="cont-infocampos">
                    <label>Calle 1:</label>
                    <?= $form->field($model, 'street1')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="cont-infocampos">
                    <label>Calle 2:</label>
                    <?= $form->field($model, 'street2')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="cont-infocampos">
                    <label>Sector:</label>
                    <?= $form->field($model, 'sector')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="cont-infocampos">
                    <label>Número:</label>
                        <?= $form->field($model, 'number')->textInput(['maxlength' => true]) ?>
                </div>
                <input type="submit" value="Guardar" class="btn-submit"/> 
                <?php ActiveForm::end(); ?>
            </div> 