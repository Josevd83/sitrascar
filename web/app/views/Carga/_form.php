<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Carga */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="carga-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'TIPO_CARGA_ID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PUERTO_ID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'RUBROS_ID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PAIS_ID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'BUQUE_ID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'FECHA_ATRAQUE')->textInput() ?>

    <?= $form->field($model, 'BL')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'MUELLE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PESO')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'COD_VIAJE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PESO_ASIGNADO')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ESTATUS_CARGA')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PESO_DISTRIBUIDO')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'FECHA_REGISTRO')->textInput() ?>

    <?= $form->field($model, 'OBSERVACIONES')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
