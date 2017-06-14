<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CentralesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="centrales-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'PARROQUIA_ID') ?>

    <?= $form->field($model, 'MUNICIPIO_ID') ?>

    <?= $form->field($model, 'ESTADO_ID') ?>

    <?= $form->field($model, 'NOMBRE') ?>

    <?php // echo $form->field($model, 'RIF') ?>

    <?php // echo $form->field($model, 'DIRECCION') ?>

    <?php // echo $form->field($model, 'TELEFONO_1') ?>

    <?php // echo $form->field($model, 'TELEFONO_2') ?>

    <?php // echo $form->field($model, 'ESTATUS') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
