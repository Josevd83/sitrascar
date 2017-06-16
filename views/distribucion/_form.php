<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
//use yii\widgets\ActiveForm;
use kartik\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use kartik\widgets\DepDrop;
/* @var $this yii\web\View */
/* @var $model app\models\Distribucion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="distribucion-form">
    <?php $var = ArrayHelper::map(app\models\Carga::find()->all(), 'ID','ID') ?>
    <?php $var2 = ArrayHelper::map(app\models\Centrales::find()->all(), 'ID','NOMBRE') ?>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'CARGA_ID')->dropDownList($var, ['prompt' => 'Seleccione' ]) ?>
    
    <?php
        echo $form->field($model, 'CENTRALES_ID')->widget(DepDrop::classname(), [
            'options'=>['id'=>'subcat-id'],
            'pluginOptions'=>[
                'depends'=>['distribucion-carga_id'],
                'placeholder'=>'Seleccione',
                'url'=>Url::to(['distribucion/getdistribucioncentrales'])
            ]
        ]);
    ?>
    <?= $form->field($model, 'CANTIDAD', ['enableAjaxValidation' => true])->textInput(['maxlength' => true]) ?>

    <?= '<label class="control-label">Fecha de Asignacion</label>'; ?>
    <?= DatePicker::widget([
            'model' => $model, 
            'attribute' => 'FE_ASIGNACION',
            'removeButton' => false,
            'options' => ['placeholder' => 'Ingrese Fecha de Asignacion'],
            'pluginOptions' => [
                'format' => 'yyyy-mm-dd',
                'autoclose'=>true
            ]
        ]); 
    ?>

   
    <?= $form->field($model, 'CANT_FLETES')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PERMISO_INSAI')->textInput(['maxlength' => true]) ?>

    <?= '<label class="control-label">Fecha de Emision Permiso INSAI</label>'; ?>
    
    <?= DatePicker::widget([
            'model' => $model, 
            'attribute' => 'FE_EMISION_PI',
            'removeButton' => false,
            'options' => ['placeholder' => 'Ingrese Fecha de Emision Permiso INSAI'],
            'pluginOptions' => [
                'format' => 'yyyy-mm-dd',
                'autoclose'=>true
            ]
        ]); 
    ?>

    <?= $form->field($model, 'DIAS_VENCE_PI')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'FE_VENCE_PI')->textInput() ?>

    <?= $form->field($model, 'CODIGO_SICA')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CANT_DESPACHADA')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'OBSERVACIONES')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'FE_REGISTRO')->textInput() ?>

    <?= $form->field($model, 'ESTATUS_DIS')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'GUARDAR DISTRIBUCION' : 'ACTUALIZAR DISTRIBUCION', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
