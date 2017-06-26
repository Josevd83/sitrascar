<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Flete */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="flete-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ESTATUS_FLETE_ID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'EMPRESACHOFER_ID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'VEHICULO_ID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'LISTA_ID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'GUIA_SADA')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'FE_EMISION_GS')->textInput() ?>

    <?= $form->field($model, 'DIAS_VENCE_GS')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'FE_VENCE_GS')->textInput() ?>

    <?= $form->field($model, 'ORDEN_PESO_CARGA')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'FE_EMISION_OPC')->textInput() ?>

    <?= $form->field($model, 'ORDEN_CARGA_CVA')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'FE_EMISION_OCCVA')->textInput() ?>

    <?= $form->field($model, 'ORDEN_CARGA_TQ')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'FE_EMISION_OCTQ')->textInput() ?>

    <?= $form->field($model, 'FE_IN_BOL')->textInput() ?>

    <?= $form->field($model, 'FE_PE_TARA_BOL')->textInput() ?>

    <?= $form->field($model, 'PESO_TARA_BOL')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'FE_PE_CAR_BOL')->textInput() ?>

    <?= $form->field($model, 'PESO_CAR_BOL')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'FE_OUT_BOL')->textInput() ?>

    <?= $form->field($model, 'FE_IN_CEN')->textInput() ?>

    <?= $form->field($model, 'FE_PE_CAR_CEN')->textInput() ?>

    <?= $form->field($model, 'PESO_CAR_CEN')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'FE_PE_TARA_CEN')->textInput() ?>

    <?= $form->field($model, 'PE_TARA_CEN')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PESO_CARGA')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PESO_DESCARGA')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'FALTANTE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'GUIA_RECEP')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'OBSERVACIONES')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
