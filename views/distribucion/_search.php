<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DistribucionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="distribucion-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'DESCRIPCION') ?>
    
    <?= $form->field($model, 'FE_ASIGNACION') ?>

    <?= $form->field($model, 'CANTIDAD') ?>

    <?= $form->field($model, 'CANT_DESPACHADA') ?>

    <?php // echo $form->field($model, '') ?>

    <?php // echo $form->field($model, 'CANT_FLETES') ?>

    <?php // echo $form->field($model, 'PERMISO_INSAI') ?>

    <?php // echo $form->field($model, 'FE_EMISION_PI') ?>

    <?php // echo $form->field($model, 'DIAS_VENCE_PI') ?>

    <?php // echo $form->field($model, 'FE_VENCE_PI') ?>

    <?php // echo $form->field($model, 'CODIGO_SICA') ?>

    <?php // echo $form->field($model, 'CANT_DESPACHADA') ?>

    <?php // echo $form->field($model, 'OBSERVACIONES') ?>

    <?php // echo $form->field($model, 'FE_REGISTRO') ?>

    <?php // echo $form->field($model, 'ESTATUS_DIS') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
