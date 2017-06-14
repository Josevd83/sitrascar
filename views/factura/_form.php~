<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
//use yii\widgets\ActiveForm;
use kartik\widgets\ActiveForm;
use kartik\widgets\DepDrop;

/* @var $this yii\web\View */
/* @var $model app\models\Factura */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="factura-form">

	 <?php $var = ArrayHelper::map(app\models\Empresa::find()->all(), 'ID', 'NOMBRE') ?>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'empresa')->dropDownList($var, ['prompt' => 'Seleccione' ]) ?>
    
    <?php
        echo $form->field($model, 'CUENTAS_ID')->widget(DepDrop::classname(), [
            'options'=>['id'=>'subcat-id'],
            'pluginOptions'=>[
                'depends'=>['factura-empresa'],
                'placeholder'=>'Seleccione',
                'url'=>Url::to(['factura/getcuentas'])
            ]
        ]);
    ?>

    <?= $form->field($model, 'CUENTAS_ID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PAGOS_ID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'MONTO_TOTAL')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TOTAL_ANTICIPOS')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TOTAL_DESCUENTOS')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NETO_COBRAR')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ESTATUS_FAC')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
