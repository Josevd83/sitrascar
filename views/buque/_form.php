<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Buque */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="buque-form">
	<?php $var = [ 0 => 'INACTIVO', 1 => 'ACTIVO'] ?>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'NOMBRE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ESTATUS')->dropDownList($var, ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'NUEVO BUQUE' : 'ACTUALIZAR BUQUE', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
