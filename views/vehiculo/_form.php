<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\Vehiculo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vehiculo-form">
	<?php $var = [0 => 'INACTIVO', 1 => 'DISPONIBLE', 2 => 'ASIGNADO'] ?>
    <?php $var2 = ArrayHelper::map(app\models\Empresa::find()->all(), 'ID','NOMBRE') ?>
    <?php $form = ActiveForm::begin([
     "options" => ["enctype" => "multipart/form-data"],
     ]); ?> 

    <?= $form->field($model, 'EMPRESA_ID')->dropDownList($var2, ['prompt' => 'Seleccione la Empresa']) ?>

    <?= $form->field($model, 'PLACA_CHUTO')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'MARCA')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'MODELO')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'SERIAL')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PLACA_REMOLQUE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CAPACIDAD')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'COLOR')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'SROP')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NRO_PRC')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'FE_VENCE_PRC')->textInput() ?>

    <?php //echo $form->field($model, 'IMG_CARNET')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'file')->fileInput() ?>

    <?= $form->field($model, 'ESTATUS')->dropDownList($var, ['prompt' => 'Seleccione Estatus']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'NUEVO VEHICULO' : 'ACTUALIZAR VEHICULO', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
