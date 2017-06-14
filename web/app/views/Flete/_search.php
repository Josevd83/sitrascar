<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\FleteSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="flete-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'EMPRESA_CHOFER_ID') ?>

    <?= $form->field($model, 'VEHICULO_ID') ?>

    <?= $form->field($model, 'LISTA_ID') ?>

    <?= $form->field($model, 'GUIA_SADA') ?>

    <?php // echo $form->field($model, 'FE_EMISION_GS') ?>

    <?php // echo $form->field($model, 'DIAS_VENCE_GS') ?>

    <?php // echo $form->field($model, 'FE_VENCE_GS') ?>

    <?php // echo $form->field($model, 'ORDEN_PESO_CARGA') ?>

    <?php // echo $form->field($model, 'FE_EMISION_OPC') ?>

    <?php // echo $form->field($model, 'ORDEN_CARGA_CVA') ?>

    <?php // echo $form->field($model, 'FE_EMISION_OCCVA') ?>

    <?php // echo $form->field($model, 'ORDEN_CARGA_TQ') ?>

    <?php // echo $form->field($model, 'FE_EMISION_OCTQ') ?>

    <?php // echo $form->field($model, 'PESO_CARGA') ?>

    <?php // echo $form->field($model, 'PESO_DESCARGA') ?>

    <?php // echo $form->field($model, 'GUIA_RECEPCION') ?>

    <?php // echo $form->field($model, 'ESTATUS_FLETE') ?>

    <?php // echo $form->field($model, 'OBSERVACIONES') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
