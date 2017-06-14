<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Cuentas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cuentas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'EMPRESA_ID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'BANCO')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NRO_CUENTA')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ESTATUS')->dropDownList([ '0', '1', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
