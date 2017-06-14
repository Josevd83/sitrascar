<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Distribucion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="distribucion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'CENTRALES_ID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CARGA_ID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CANTIDAD')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'FE_ASIGNACION')->textInput() ?>

    <?= $form->field($model, 'CANT_FLETES')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PERMISO_INSAI')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'FE_EMISION_PI')->textInput() ?>

    <?= $form->field($model, 'DIAS_VENCE_PI')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'FE_VENCE_PI')->textInput() ?>

    <?= $form->field($model, 'CODIGO_SICA')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CANT_DESPACHADA')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'OBSERVACIONES')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'FE_REGISTRO')->textInput() ?>

    <?= $form->field($model, 'ESTATUS_DIS')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
