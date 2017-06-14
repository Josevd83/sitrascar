<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\VehiculoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vehiculo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'EMPRESA_ID') ?>

    <?= $form->field($model, 'PLACA_CHUTO') ?>

    <?= $form->field($model, 'MARCA') ?>

    <?= $form->field($model, 'MODELO') ?>

    <?php // echo $form->field($model, 'SERIAL') ?>

    <?php // echo $form->field($model, 'PLACA_REMOLQUE') ?>

    <?php // echo $form->field($model, 'CAPACIDAD') ?>

    <?php // echo $form->field($model, 'COLOR') ?>

    <?php // echo $form->field($model, 'SROP') ?>

    <?php // echo $form->field($model, 'NRO_PRC') ?>

    <?php // echo $form->field($model, 'FE_VENCE_PRC') ?>

    <?php // echo $form->field($model, 'IMG_CARNET') ?>

    <?php // echo $form->field($model, 'ESTATUS') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
