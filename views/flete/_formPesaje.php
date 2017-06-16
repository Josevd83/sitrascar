<?php
//use yii\widgets\ActiveForm;
use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\widgets\DatePicker;
?>
<?php //die(var_dump($modelFlete));?>
<div class="usuario-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($modelDistribucion, 'PERMISO_INSAI')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?php echo '<label class="control-label">Fecha de Carga</label>'; ?>
        <?php echo DatePicker::widget([
                'model' => $modelDistribucion, 
                'attribute' => 'FE_EMISION_PI',
                'removeButton' => false,
                'options' => ['placeholder' => 'Ingrese Fecha de Emisión'],
                'pluginOptions' => [
                    'autoclose'=>true
                ]
            ]); 
        ?>
    </div>

    <?php echo '<label class="control-label">Transportistas</label>'; ?>
<div>
    <?php foreach($modelFlete as $index => $flete):  ?>
        <div class="row">
            <div>
                <div class="col-sm-12">
                    <?php  $flete->chofer = $flete->nomApeChofer() ?>
                    <?= $form->field($flete, "[$index]chofer")->textInput(['maxlength' => true,'placeholder'=>'text','disabled'=>true])->label(false); ?>
                </div>
            </div>
            
            <div class="col-sm-2">
                <?php echo DatePicker::widget([
                        'model' => $flete, 
                        'attribute' => "[$index]FE_IN_BOL",
                        'removeButton' => false,
                        'options' => ['placeholder' => $flete->getAttributeLabel('FE_IN_BOL')],
                        'pluginOptions' => [
                            'autoclose'=>true
                        ]
                    ]); 
                ?><br>
                <?php echo DatePicker::widget([
                        'model' => $flete, 
                        'attribute' => "[$index]FE_OUT_BOL",
                        'removeButton' => false,
                        'options' => ['placeholder' => $flete->getAttributeLabel('FE_OUT_BOL')],
                        'pluginOptions' => [
                            'autoclose'=>true
                        ]
                    ]); 
                ?>
            </div>
            <div class="col-sm-2">
                <?php echo DatePicker::widget([
                        'model' => $flete, 
                        'attribute' => "[$index]FE_PE_TARA_BOL",
                        'removeButton' => false,
                        'options' => ['placeholder' => $flete->getAttributeLabel('FE_PE_TARA_BOL')],
                        'pluginOptions' => [
                            'autoclose'=>true
                        ]
                    ]); 
                ?><br>
                <?= $form->field($flete, "[$index]PESO_TARA_BOL", ['inputOptions'=>['placeholder'=>$flete->getAttributeLabel('PESO_TARA_BOL')]])->textInput(['maxlength' => true])->label(false); ?>
            </div>
            <div class="col-sm-2">
                <?php echo DatePicker::widget([
                        'model' => $flete, 
                        'attribute' => "[$index]FE_PE_CAR_BOL",
                        'removeButton' => false,
                        'options' => ['placeholder' => $flete->getAttributeLabel('FE_PE_CAR_BOL')],
                        'pluginOptions' => [
                            'autoclose'=>true
                        ]
                    ]); 
                ?><br>
                <?= $form->field($flete, "[$index]PESO_CAR_BOL", ['inputOptions'=>['placeholder'=>$flete->getAttributeLabel('PESO_CAR_BOL')]])->textInput(['maxlength' => true])->label(false); ?>
            </div>
            <div class="col-sm-2">
                <?php echo DatePicker::widget([
                        'model' => $flete, 
                        'attribute' => "[$index]FE_IN_CEN",
                        'removeButton' => false,
                        'options' => ['placeholder' => $flete->getAttributeLabel('FE_IN_CEN')],
                        'pluginOptions' => [
                            'autoclose'=>true
                        ]
                    ]); 
                ?>
            </div>
            <div class="col-sm-2">
                <?php echo DatePicker::widget([
                        'model' => $flete, 
                        'attribute' => "[$index]FE_PE_TARA_CEN",
                        'removeButton' => false,
                        'options' => ['placeholder' => $flete->getAttributeLabel('FE_PE_TARA_CEN')],
                        'pluginOptions' => [
                            'autoclose'=>true
                        ]
                    ]); 
                ?><br>
                <?= $form->field($flete, "[$index]PE_TARA_CEN", ['inputOptions'=>['placeholder'=>$flete->getAttributeLabel('PE_TARA_CEN')]])->textInput(['maxlength' => true])->label(false); ?>
            </div>
            <div class="col-sm-2">
                <?php echo DatePicker::widget([
                        'model' => $flete, 
                        'attribute' => "[$index]FE_PE_CAR_CEN",
                        'removeButton' => false,
                        'options' => ['placeholder' => $flete->getAttributeLabel('FE_PE_CAR_CEN')],
                        'pluginOptions' => [
                            'autoclose'=>true
                        ]
                    ]); 
                ?><br>
                <?= $form->field($flete, "[$index]PESO_CAR_CEN", ['inputOptions'=>['placeholder'=>$flete->getAttributeLabel('PESO_CAR_CEN')]])->textInput(['maxlength' => true])->label(false); ?>
            </div>
    <?php endforeach ?>
</div>

    <div class="form-group">
        <?= Html::submitButton($modelLista->isNewRecord ? 'Create' : 'Registrar', ['class' => $modelLista->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>