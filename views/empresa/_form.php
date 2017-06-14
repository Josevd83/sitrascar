<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Empresa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="empresa-form">
    <?php $var = [ 0 => 'INACTIVO', 1 => 'ACTIVO'] ?>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'RIF')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NOMBRE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CERT_SUNACCOP')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CERT_INPSASEL')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DIRECCION')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'TELEFONO_1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TELEFONO_2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CORREO')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ESTATUS')->dropDownList($var, ['prompt' => 'Seleccione' ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'GUARDAR EMPRESA' : 'ACTUALIZAR EMPRESA', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
