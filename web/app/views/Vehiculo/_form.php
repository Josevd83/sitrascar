<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Vehiculo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vehiculo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'EMPRESA_ID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PLACA_CHUTO')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'MARCA')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'MODELO')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'SERIAL')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PLACA_REMOLQUE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CAPACIDAD')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'COLOR')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'SROP')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NRO_PRC')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'FE_VENCE_PRC')->textInput() ?>

    <?= $form->field($model, 'IMG_CARNET')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ESTATUS')->dropDownList([ '0', '1', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
