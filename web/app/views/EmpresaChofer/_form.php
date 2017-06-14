<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EmpresaChofer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="empresa-chofer-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'VEHICULO_ID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'EMPRESA_ID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CHOFER_ID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'BLOQUEADO')->dropDownList([ '0', '1', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
