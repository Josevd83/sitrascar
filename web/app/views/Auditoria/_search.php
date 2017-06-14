<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AuditoriaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="auditoria-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'MODULO_ID') ?>

    <?= $form->field($model, 'USUARIO_ID') ?>

    <?= $form->field($model, 'FECHA') ?>

    <?= $form->field($model, 'TABLA') ?>

    <?php // echo $form->field($model, 'ID_REGISTRO') ?>

    <?php // echo $form->field($model, 'CAMPO') ?>

    <?php // echo $form->field($model, 'DATO_ANTERIOR') ?>

    <?php // echo $form->field($model, 'DATO_NUEVO') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
