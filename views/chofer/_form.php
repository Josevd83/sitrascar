<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Chofer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="chofer-form">
    <?php $var = [0 => 'INACTIVO', 1 => 'ACTIVO'] ?>
    <?php $var2 = ArrayHelper::map(app\models\Empresa::find()->all(), 'ID','NOMBRE') ?>
    <?php $form = ActiveForm::begin([
     //"method" => "post",
     //"enableClientValidation" => true,
     "options" => ["enctype" => "multipart/form-data"],
     ]); ?>
    
    <?php // echo $form->field($empresachofer, 'EMPRESA_ID')->textInput(['maxlength' => true]) ?>
    <?= $form->field($modelEmpresachofer, 'EMPRESA_ID')->dropDownList($var2, ['prompt' => 'Seleccione' ]) ?>
    <?= $form->field($model, 'CEDULA')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PRIMER_NOMBRE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'SEGUNDO_NOMBRE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PRIMER_APELLIDO')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'SEGUNDO_APELLIDO')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'RIF')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DIRECCION')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CORREO')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TELEFONO_1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TELEFONO_2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'FE_VENCE_CER')->textInput() ?>

    <?= $form->field($model, 'FE_VENCE_LIC')->textInput() ?>

    <?php // echo $form->field($model, 'IMG_CEDULA')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'file2')->fileInput() ?>

    <?php //echo $form->field($model, 'IMG_LICENCIA')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'file3')->fileInput() ?>

    <?php //echo $form->field($model, 'IMG_CERTIFICADO')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'file')->fileInput() ?>


    <?= $form->field($model, 'ESTATUS')->dropDownList($var, ['prompt' => 'Seleccione']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'NUEVO CHOFER' : 'ACTUALIZAR CHOFER', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
