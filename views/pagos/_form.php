<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Conceptos;
use app\models\Tarifas;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model app\models\Pagos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pagos-form">

    <?php //$var = ArrayHelper::map(app\models\Conceptos::find()->joinWith('tarifas')->all(), 'ID','NOMBRE') ?>
    <?php $var = ArrayHelper::map($modelConceptos, 'ID','NOMBRE') ?>

    <?php $form = ActiveForm::begin(); ?>

     <div class="col-sm-12">
        <div class="row">
            <div class="col-sm-6">
                <div class="row">
                    <div class="col-sm-11 well">
                        <h3>Detalle del Flete</h3>
                        <p><b>Central:</b> <?= $modelFlete->lISTA->dISTRIBUCION->cENTRALES->NOMBRE ?></p>
                        <p><b>Guia SADA:</b> <?= $modelFlete->GUIA_SADA ?></p>
                        <p><b>Guia Recepción:</b> <?= $modelFlete->GUIA_RECEPCION ?></p>
                        <p><b>Observaciones:</b> <?= $modelFlete->OBSERVACIONES ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-11 well">
                        <h3>Datos del Conductor</h3>
                        <p><b>Cédula:</b> <?= $modelFlete->eMPRESACHOFER->cHOFER->CEDULA ?></p>
                        <p><b>Nombres:</b> <?= $modelFlete->eMPRESACHOFER->cHOFER->PRIMER_NOMBRE." ".$modelFlete->eMPRESACHOFER->cHOFER->SEGUNDO_NOMBRE ?></p>
                        <p><b>Apellidos:</b> <?= $modelFlete->eMPRESACHOFER->cHOFER->PRIMER_APELLIDO." ".$modelFlete->eMPRESACHOFER->cHOFER->SEGUNDO_APELLIDO ?></p>
                        <p><b>Empresa:</b> <?= $modelFlete->eMPRESACHOFER->eMPRESA->NOMBRE ?></p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="row well">
                    <?php if(!$var): ?>
                        <p>No existen Conceptos ni Tarifas para la central <b><?= $modelFlete->lISTA->dISTRIBUCION->cENTRALES->NOMBRE ?></b></p>
                    <?php else: ?>
                    <table class="table table-hover">
                        <thead style="border-color:inherit"><tr><th style='border-bottom: 2px solid #ddd;'>Conceptos</th><th style='border-bottom: 2px solid #ddd;'>Monto</th></tr></thead>
                        <tbody>
                        <?= $form->field($model, 'CONCEPTOS_ID')->checkboxList($var, [
                            'item' => function($index, $label, $name, $checked, $value) {
                                //$monto = Tarifas::findOne($value)->MONTO;
                                $monto = 100;
                                echo "<tr><td style='border-top: 1px solid #ddd;'><input tabindex='{$index}' type='checkbox' {$checked}'name='{$name}'value='{$value}' class='concepto' rel='$monto'> {$label}</td><td style='border-top: 1px solid #ddd;'><span>$monto</span></td></tr>";
                            }])->label('');
                        ?>
                            <tr><td class="text-right" style='border-top: 1px solid #ddd;'><b>Total:</b></td><td style='border-top: 1px solid #ddd;'><b><?= Html::input('text', 'monto', 0.00, ['class' => 'form-control', 'style'=>'width:100px','readonly'=>'readonly','id'=>'totalMonto']) ?></b></td></tr>
                        </tbody> 
                    </table>
                        <?php //= $form->field($model, 'CONCEPTOS_ID')->checkboxList($var,['separator'=>'<br/>'])->label('Conceptos') ?>
                    <?php endif; ?>

                     <div class="form-group">
                        <div class="text-right">
                            <?= Html::submitButton($model->isNewRecord ? 'Crear Pago' : 'Modificar Pago', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	 &nbsp;
    <?php //= $form->field($model, 'CARGA_ID')->dropDownList($var, ['prompt' => 'Seleccione' ]) ?>

    <?php //= $form->field($model, 'CONCEPTOS_ID')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'FLETE_ID')->hiddenInput()->label(false) ?>

    <?php //= $form->field($model, 'MONTO')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'ESTATUS_PAGO')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'FE_REGISTRO')->textInput() ?>

    

    <?php ActiveForm::end(); ?>

</div>
<?php $this->registerJs("


	$('.concepto').change(function () {
	    var count = 0;
	    var table_abc = document.getElementsByClassName('concepto');
	    for (var i = 0; table_abc[i]; ++i) {

		if (table_abc[i].checked) {
		    var value = table_abc[i].attributes.rel.value;
		    //count += Number(table_abc[i].attributes.rel.value);
		    count += parseFloat(table_abc[i].attributes.rel.value);
		}
	    }

	    $('#totalMonto').val(count);
	});

    
    ",View::POS_READY); ?>
