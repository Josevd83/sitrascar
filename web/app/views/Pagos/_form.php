<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Pagos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pagos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'CONCEPTOS_ID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'FLETE_ID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'MONTO')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ESTATUS_PAGO')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'FE_REGISTRO')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
