<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Lista */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lista-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'DISTRIBUCION_ID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'FECHA_CREACION')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ESTATUS_LISTA')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
