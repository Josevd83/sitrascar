<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\FacturaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="factura-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'CUENTAS_ID') ?>

    <?= $form->field($model, 'PAGOS_ID') ?>

    <?= $form->field($model, 'MONTO_TOTAL') ?>

    <?= $form->field($model, 'TOTAL_ANTICIPOS') ?>

    <?php // echo $form->field($model, 'TOTAL_DESCUENTOS') ?>

    <?php // echo $form->field($model, 'NETO_COBRAR') ?>

    <?php // echo $form->field($model, 'ESTATUS_FAC') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
