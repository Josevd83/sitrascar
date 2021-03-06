<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CargaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="carga-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'TIPO_CARGA_ID') ?>

    <?= $form->field($model, 'PUERTO_ID') ?>

    <?= $form->field($model, 'RUBROS_ID') ?>

    <?= $form->field($model, 'PAIS_ID') ?>

    <?php // echo $form->field($model, 'BUQUE_ID') ?>

    <?php // echo $form->field($model, 'FECHA_ATRAQUE') ?>

    <?php // echo $form->field($model, 'BL') ?>

    <?php // echo $form->field($model, 'MUELLE') ?>

    <?php // echo $form->field($model, 'PESO') ?>

    <?php // echo $form->field($model, 'COD_VIAJE') ?>

    <?php // echo $form->field($model, 'PESO_ASIGNADO') ?>

    <?php // echo $form->field($model, 'ESTATUS_CARGA') ?>

    <?php // echo $form->field($model, 'PESO_DISTRIBUIDO') ?>

    <?php // echo $form->field($model, 'FECHA_REGISTRO') ?>

    <?php // echo $form->field($model, 'OBSERVACIONES') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
