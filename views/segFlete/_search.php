<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SegfleteSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="segflete-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'PASOS_ID') ?>

    <?= $form->field($model, 'FLETE_ID') ?>

    <?= $form->field($model, 'FECHA') ?>

    <?= $form->field($model, 'PESO') ?>

    <?php // echo $form->field($model, 'OBSERVACIONES') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
