<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\widgets\DepDrop;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Centrales */
/* @var $form yii\widgets\ActiveForm */
if (isset($modelMunicipio))
    $municipio =[$modelMunicipio->ID => $modelMunicipio->NOMBRE];
else 
    $municipio =[];
if (isset($modelParroquia))
    $parroquia =[$modelParroquia->ID => $modelParroquia->NOMBRE];
else 
    $parroquia =[];
?>

<div class="centrales-form">
    <?php $var = ArrayHelper::map(app\models\Estado::find()->all(), 'ID', 'NOMBRE') ?>
    <?php $var2 = [ 0 => 'INACTIVO', 1 => 'ACTIVO'] ?>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ESTADO_ID')->dropDownList($var, ['prompt' => 'Seleccione' ]) ?>
    
     <?php
        echo $form->field($model, 'MUNICIPIO_ID')->widget(DepDrop::classname(), [
            'options'=>['id'=>'subcat-id'],
            'data'=>$municipio,
            'pluginOptions'=>[
                'depends'=>['centrales-estado_id'],
                'placeholder'=>'Seleccione',
                'url'=>Url::to(['centrales/getestadomunicipio'])
            ]
        ]);
     ?>
     <?php
        echo $form->field($model, 'PARROQUIA_ID')->widget(DepDrop::classname(), [
            'options'=>['id'=>'subcat-id2'],
            'data'=>$parroquia,
            'pluginOptions'=>[
                'depends'=>['subcat-id'],
                'placeholder'=>'Seleccione',
                'url'=>Url::to(['centrales/getmunicipioparroquia'])
            ]
        ]);
    ?>
    <?php // echo $form->field($model, 'PARROQUIA_ID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NOMBRE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'RIF')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DIRECCION')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TELEFONO_1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TELEFONO_2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ESTATUS')->dropDownList($var2, ['prompt' => 'Seleccione']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'NUEVA CENTRAL' : 'ACTUALIZAR CENTRAL', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
