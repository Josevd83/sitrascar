<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
//use yii\widgets\ActiveForm;
use kartik\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use kartik\widgets\DepDrop;
use yii\web\View;
/* @var $this yii\web\View */
/* @var $model app\models\Distribucion */
/* @var $form yii\widgets\ActiveForm */
if (isset($modelCentrales))
    $central =[$modelCentrales->ID => $modelCentrales->NOMBRE];
else 
    $central =[];
        
?>

<div class="distribucion-form">
    <?php $var = ArrayHelper::map(app\models\Carga::find()->all(), 'ID','DESCRIPCION') ?>
    <?php $var2 = ArrayHelper::map(app\models\Centrales::find()->all(), 'ID','NOMBRE') ?>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'CARGA_ID')->dropDownList($var, ['prompt' => 'Seleccione' ]) ?>
    
    <?php
        echo $form->field($model, 'CENTRALES_ID')->widget(DepDrop::classname(), [
            'options'=>['id'=>'subcat-id'],
            'data'=>$central,
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

    <?php //echo $form->field($model, 'DIAS_VENCE_PI')->textInput(['maxlength' => true]) ?>
    <?php  echo $form->field($model, 'DIAS_VENCE_PI', ['inputOptions'=>['placeholder'=>$model->getAttributeLabel('DIAS_VENCE_PI')]])->textInput(['maxlength' => true,'class'=>'diasVenc'])->label('Dias Vencimiento'); ?>

    <?php //echo $form->field($model, 'FE_VENCE_PI')->textInput() ?>
    <?php  echo DatePicker::widget([
                                    'model' => $model, 
                                    'attribute' => 'FE_VENCE_PI',
                                    'removeButton' => false,
                                    'options' => ['placeholder' => $model->getAttributeLabel('FE_VENCE_PI')],
				    'readonly' => true,
				    //'disabled' => true,
                                    'pluginOptions' => [
                                        'autoclose'=>true,
					'format' => 'dd-mm-yyyy'
                                    ],
				    'options' => [
					'class' => 'fechaVencimiento',
				    ]
                                ]); 
    ?>

    <?= $form->field($model, 'CODIGO_SICA')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CANT_DESPACHADA')->textInput(['disabled' => true]) ?>

    <?= $form->field($model, 'OBSERVACIONES')->textarea(['rows' => 6]) ?>

    <?php // echo $form->field($model, 'FE_REGISTRO')->textInput(['disabled' => true]) ?>

    <?php // echo $form->field($model, 'ESTATUS_DIS')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'GUARDAR DISTRIBUCION' : 'ACTUALIZAR DISTRIBUCION', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php 
$this->registerJsFile(
    '@web/js/funciones2.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);
?>

<?php
$this->registerJs(
    '$(function() {
      $(".expand").on( "click", function() {
        $(this).next().slideToggle(200);
        $expand = $(this).find(">:first-child");
        
        if($expand.text() == "+") {
          $expand.text("-");
        } else {
          $expand.text("+");
        }
      });
    });

        
        $(".diasVenc").on("change",function(){
                if($.isNumeric($(this).val())== false){
                    alert("Ingresar solo numeros");
                    $(this).val("");
                    $("#distribucion-fe_vence_pi").val("");
                    return false;
                }
                var fecha_emision = $("#distribucion-fe_emision_pi").val();
                if(!fecha_emision){
                    alert("Ingrese Fecha de Emision");
                    $(this).closest("li").find(".diasVenc").val("");
                    return(false);
                }
		var fecha = sumaFecha($(this).val(),fecha_emision);
		$("#distribucion-fe_vence_pi").val(fecha);
	});

	$(function() {                
                $(".diasVenc").each(function(){
                    var fecha_emision = $(this).closest("li").find(".fechaEmision").val();
			if($(this).val()!="" && fecha_emision!=""){
				var fecha = sumaFecha($(this).val(),fecha_emision);
				$("#distribucion-fe_vence_pi").val(fecha);

			}
		});

   	});
    ',
    View::POS_READY
    //'my-button-handler'
); 
?>

