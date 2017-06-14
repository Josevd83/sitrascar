<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Auditoria */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="auditoria-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'MODULO_ID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'USUARIO_ID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'FECHA')->textInput() ?>

    <?= $form->field($model, 'TABLA')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ID_REGISTRO')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CAMPO')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DATO_ANTERIOR')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DATO_NUEVO')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
