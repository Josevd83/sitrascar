<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Centrales */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="centrales-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'PARROQUIA_ID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'MUNICIPIO_ID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ESTADO_ID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NOMBRE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'RIF')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DIRECCION')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TELEFONO_1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TELEFONO_2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ESTATUS')->dropDownList([ '0', '1', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
