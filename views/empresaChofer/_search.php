<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EmpresachoferSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="empresachofer-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'VEHICULO_ID') ?>

    <?= $form->field($model, 'EMPRESA_ID') ?>

    <?= $form->field($model, 'CHOFER_ID') ?>

    <?= $form->field($model, 'BLOQUEADO') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
