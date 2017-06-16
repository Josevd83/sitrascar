<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ChoferSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="chofer-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'CEDULA') ?>

    <?= $form->field($model, 'PRIMER_NOMBRE') ?>

    <?php // echo $form->field($model, 'SEGUNDO_NOMBRE') ?>

    <?= $form->field($model, 'PRIMER_APELLIDO') ?>

    <?php // echo $form->field($model, 'SEGUNDO_APELLIDO') ?>

    <?php // echo $form->field($model, 'RIF') ?>

    <?php // echo $form->field($model, 'DIRECCION') ?>

    <?php // echo $form->field($model, 'CORREO') ?>

    <?= $form->field($model, 'TELEFONO_1') ?>

    <?php // echo $form->field($model, 'TELEFONO_2') ?>

    <?php // echo $form->field($model, 'FE_VENCE_CER') ?>

    <?php // echo $form->field($model, 'FE_VENCE_LIC') ?>

    <?php // echo $form->field($model, 'IMG_CEDULA') ?>

    <?php // echo $form->field($model, 'IMG_LICENCIA') ?>

    <?php // echo $form->field($model, 'IMG_CERTIFICADO') ?>

    <?php // echo $form->field($model, 'ESTATUS') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
