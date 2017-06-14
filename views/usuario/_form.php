<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;


/* @var $this yii\web\View */
/* @var $model app\models\Usuario */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuario-form">

    <?php $var = ArrayHelper::map(app\models\Modulo::find()->all(), 'ID', 'NOMBRE') ?>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'USUARIO')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CLAVE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PRIMER_NOMBRE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'SEGUNDO_NOMBRE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PRIMER_APELLIDO')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'SEGUNDO_APELLIDO')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CEDULA')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CORREO')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TELEFONO')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ESTATUS')->dropDownList([ '0', '1', ], ['prompt' => '']) ?>

    <?php //= $form->field($modelUsuarioModulo, 'MODULO_ID')->dropDownList($var, ['prompt' => 'Seleccione' ]) ?>

    <?php
        $data = $var;

        echo $form->field($modelUsuarioModulo, 'CONSULTA')->widget(Select2::classname(), [
            'data' => $data,
            'language' => 'es',
            'options' => ['multiple' => true, 'placeholder' => 'Seleccione'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ])->label('Privilégios para Consulta');

    ?>

    <?php
        $data = $var;

        echo $form->field($modelUsuarioModulo, 'INSERTA')->widget(Select2::classname(), [
            'data' => $data,
            'language' => 'es',
            'options' => ['multiple' => true, 'placeholder' => 'Seleccione'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ])->label('Privilégios para Registrar');

    ?>

    <?php
        $data = $var;

        echo $form->field($modelUsuarioModulo, 'ACTUALIZA')->widget(Select2::classname(), [
            'data' => $data,
            'language' => 'es',
            'options' => ['multiple' => true, 'placeholder' => 'Seleccione'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ])->label('Privilégios para Actualizar');

    ?>

    <?php //= $form->field($modelUsuarioModulo, 'CONSULTA')->checkbox() ?>

    <?php //= $form->field($modelUsuarioModulo, 'INSERTA')->checkbox() ?>

    <?php //= $form->field($modelUsuarioModulo, 'ACTUALIZA')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
