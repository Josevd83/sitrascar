<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UsuarioSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuario-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'USUARIO') ?>

    <?= $form->field($model, 'CLAVE') ?>

    <?= $form->field($model, 'PRIMER_NOMBRE') ?>

    <?= $form->field($model, 'SEGUNDO_NOMBRE') ?>

    <?php // echo $form->field($model, 'PRIMER_APELLIDO') ?>

    <?php // echo $form->field($model, 'SEGUNDO_APELLIDO') ?>

    <?php // echo $form->field($model, 'CEDULA') ?>

    <?php // echo $form->field($model, 'CORREO') ?>

    <?php // echo $form->field($model, 'TELEFONO') ?>

    <?php // echo $form->field($model, 'ESTATUS') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
