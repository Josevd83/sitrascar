<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\models\Carga */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="carga-form">
    <?php $var = ArrayHelper::map(app\models\TipoCarga::find()->all(), 'ID', 'NOMBRE') ?>
    <?php $var2 = ArrayHelper::map(app\models\Puerto::find()->all(), 'ID', 'NOMBRE') ?>
    <?php $var3 = ArrayHelper::map(app\models\Rubros::find()->all(), 'ID', 'NOMBRE') ?>
    <?php $var4 = ArrayHelper::map(\app\models\Pais::find()->all(), 'ID', 'NOMBRE') ?>
    <?php $var5 = ArrayHelper::map(app\models\Buque::find()->all(), 'ID', 'NOMBRE') ?>
    
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'TIPO_CARGA_ID')->dropDownList($var, ['prompt' => 'Seleccione' ]) ?>

    <?= $form->field($model, 'PUERTO_ID')->dropDownList($var2, ['prompt' => 'Seleccione' ]) ?>

    <?= $form->field($model, 'RUBROS_ID')->dropDownList($var3, ['prompt' => 'Seleccione' ]) ?>

    <?= $form->field($model, 'PAIS_ID')->dropDownList($var4, ['prompt' => 'Seleccione' ]) ?>

    <?= $form->field($model, 'BUQUE_ID')->dropDownList($var5, ['prompt' => 'Seleccione' ]) ?>

    <?php echo '<label class="control-label">Fecha de Atraque</label>'; ?>
    <?php echo DatePicker::widget([
            'model' => $model, 
            'attribute' => 'FECHA_ATRAQUE',
            'removeButton' => false,
            'options' => ['placeholder' => 'Ingrese Fecha de Atraque'],
            'pluginOptions' => [
                'format' => 'yyyy/mm/dd',
                'autoclose'=>true
            ]
        ]); 
    ?>

    <?= $form->field($model, 'BL')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'MUELLE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PESO')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'COD_VIAJE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PESO_ASIGNADO')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ESTATUS_CARGA')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PESO_DISTRIBUIDO')->textInput(['disabled' => true]) ?>

    <?= $form->field($model, 'FECHA_REGISTRO')->textInput(['disabled' => true]) ?>

    <?= $form->field($model, 'OBSERVACIONES')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'GUARDAR CARGA' : 'ACTUALIZAR CARGA', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
