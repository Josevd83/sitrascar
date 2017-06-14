<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Cuentas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cuentas-form">
    <?php $var = [ 0 => 'INACTIVO', 1 => 'ACTIVO'] ?>
    <?php $var2 = ['CORRIENTE',  'AHORRO'] ?>
    <?php $var3 = ['BANCO DE VENEZUELA',
                   'BANESCO',
                   'BANCO PROVINCIAL',
                   'BANCO DEL TESORO',
                   'BANCO BICENTENARIO',
                   'BANCO OCCIDENTAL DE DESCUENTO BOD',
                   'BANCO FONDO COMUN  BFC',
                   'BANCO MERCANTIL'] ?>
    <?php $var4 = ArrayHelper::map(app\models\Empresa::find()->all(), 'ID','NOMBRE') ?>
    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'EMPRESA_ID')->dropDownList($var4, ['prompt' => 'Seleccione' ]) ?>
    <?= $form->field($model, 'BANCO')->dropDownList($var3, ['prompt' => 'Seleccione' ]) ?>
   
    <?= $form->field($model, 'TIPO')->dropDownList($var2, ['prompt' => 'Seleccione' ]) ?>

    <?= $form->field($model, 'NRO_CUENTA')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CEDULA_RIF')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TITULAR')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'ESTATUS')->dropDownList($var, ['prompt' => 'Seleccione' ]) ?>
    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'GUARDAR CUENTA' : 'ACTUALIZAR CUENTA', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
