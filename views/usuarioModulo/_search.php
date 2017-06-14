<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UsuarioModuloSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuario-modulo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'USUARIO_ID') ?>

    <?= $form->field($model, 'MODULO_ID') ?>

    <?= $form->field($model, 'CONSULTA') ?>

    <?= $form->field($model, 'INSERTA') ?>

    <?php // echo $form->field($model, 'ACTUALIZA') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
