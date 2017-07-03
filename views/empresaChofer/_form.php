<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Empresachofer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="empresachofer-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php $var = ArrayHelper::map(app\models\Vehiculo::find()->all(), 'ID','PLACA_CHUTO') ?>
    <?php $var1 = ArrayHelper::map(app\models\Empresa::find()->all(), 'ID','NOMBRE') ?>
    <?php $var2 = ArrayHelper::map(app\models\Chofer::find()->all(), 'ID','CEDULA') ?>

    <?php //echo $form->field($model, 'EMPRESA_ID')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'EMPRESA_ID')->dropDownList($var1, ['prompt' => 'Seleccione' ]) ?>

    <?php //echo $form->field($model, 'CHOFER_ID')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'CHOFER_ID')->dropDownList($var2, ['prompt' => 'Seleccione' ]) ?>
    
    <?php //echo $form->field($model, 'VEHICULO_ID')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'VEHICULO_ID')->dropDownList($var, ['prompt' => 'Seleccione' ]) ?>

    <?= $form->field($model, 'BLOQUEADO')->dropDownList([ '0', '1', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
