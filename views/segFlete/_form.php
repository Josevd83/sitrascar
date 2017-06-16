<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Segflete */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="segflete-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'PASOS_ID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'FLETE_ID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'FECHA')->textInput() ?>

    <?= $form->field($model, 'PESO')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'OBSERVACIONES')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
