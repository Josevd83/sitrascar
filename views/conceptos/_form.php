<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Conceptos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="conceptos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'NOMBRE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'SIGNO')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'FORMULA')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ESTATUS')->dropDownList(['1'=>'Activo','0'=>'Inactivo'], ['prompt' => 'Seleccione']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Agregar Concepto' : 'Modificar Concepto', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
