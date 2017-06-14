<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UsuarioModulo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuario-modulo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'USUARIO_ID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'MODULO_ID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CONSULTA')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'INSERTA')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ACTUALIZA')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
