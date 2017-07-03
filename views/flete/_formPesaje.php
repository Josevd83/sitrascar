<?php
//use yii\widgets\ActiveForm;
use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use yii\web\View;

$this->registerCssFile("@web/css/acordeon.css");
$this->registerCss("
    .expand div > span{
    margin-left: 50px;
}
");
?>
<?php //die(var_dump($modelFlete));?>
<div class="usuario-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($modelDistribucion, 'PERMISO_INSAI')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
	<?php if($modelDistribucion->FE_EMISION_PI)$modelDistribucion->FE_EMISION_PI = Yii::$app->formatter->asDate($modelDistribucion->FE_EMISION_PI, 'dd-MM-Y'); ?>
        <?php echo '<label class="control-label">Fecha de Carga</label>'; ?>
        <?php echo DatePicker::widget([
                'model' => $modelDistribucion, 
                'attribute' => 'FE_EMISION_PI',
                'removeButton' => false,
                //'options' => ['placeholder' => 'Fecha de Emisión'],
                'pluginOptions' => [
                    'autoclose'=>true,
		    'format' => 'dd-mm-yyyy',
                ]
            ]); 
        ?>
    </div>

    <?php echo '<label class="control-label">Transportistas</label>'; ?>
<!---------------------------------------->
<!---------------------------------------->
    <div id="integration-list">
        <ul>
            <?php foreach($modelFlete as $index => $flete): ?>
                <?php //var_dump($flete->GUIA_SADA);die; ?>
                <li>
                    <?= (!empty($flete->GUIA_SADA))? '<div class="left-status"><span class="label label-success">PESAJE TARA CENTRAL</span></div>': '<div class="left-status"><span class="label label-danger">PESAJE TARA CENTRAL</span></div>' ?>                    
                    <?= (!empty($flete->ORDEN_PESO_CARGA))? '<div class="left-status"><span class="label label-success">PESAJE CARGA CENTRAL</span></div>': '<div class="left-status"><span class="label label-danger">PESAJE CARGA CENTRAL</span></div>' ?>
                    <?= (!empty($flete->ORDEN_PESO_CARGA))? '<div class="left-status"><span class="label label-success">PESAJE CARGA BOLIPUERTO</span></div>': '<div class="left-status"><span class="label label-danger">PESAJE CARGA BOLIPUERTO</span></div>' ?>
                    <?= (!empty($flete->GUIA_SADA))? '<div class="left-status"><span class="label label-success">PESAJE TARA BOLIPUERTO</span></div>': '<div class="left-status"><span class="label label-danger">PESAJE TARA BOLIPUERTO</span></div>' ?>
 
                    <a class="expand">
                        <div class="right-arrow">+</div>
                        
                        <!--<div class="left-status">
                            <?php //= (!empty($flete->GUIA_SADA))? '<div class=""><span class="label label-success">Guia Sada</span></div>': '<div class="left-status"><span class="label label-danger">Guia Sada</span></div>' ?>
                    
                            <?php //= (!empty($flete->ORDEN_PESO_CARGA))? '<div class=""><span class="label label-success">Orden Pesaje - Carga</span></div>': '<div class="left-status"><span class="label label-danger">Orden Pesaje - Carga</span></div>' ?>
                        </div>-->
                        <div>
                            <h4>Chofer : <?= $flete->nomApeChofer(); ?></h4>
                            <span><?= $flete->OBSERVACIONES; ?></span>
                        </div>
                    </a>

                    <div class="detail">
                        <!--<div>
                            <div class="col-sm-12">
                                <?php  //$flete->chofer = $flete->nomApeChofer() ?>
                                <?php //= $form->field($flete, "[$index]chofer")->textInput(['maxlength' => true,'placeholder'=>'text','disabled'=>true]); ?>
                            </div>
                        </div>-->
                        
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
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
<!---------------------------------------->
<!---------------------------------------->

    <div class="form-group">
        <?= Html::submitButton($modelLista->isNewRecord ? 'Create' : 'Registrar', ['class' => $modelLista->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
$this->registerJsFile(
    '@web/js/funciones.js',
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

	/*$(".fechaEmision").on("change",function(){
		var fecha = sumaFecha(3,$(this).val());
		$(this).closest("li").find(".fechaVencimiento").val(fecha);
		$(this).closest("li").find(".diasVenc").val(3);
	});*/
        
        $(".diasVenc").on("change",function(){
                if($.isNumeric($(this).val())== false){
                    alert("Ingresar solo numeros");
                    $(this).val("");
                    $(this).closest("li").find(".fechaVencimiento").val("");
                    return false;
                }
                var fecha_emision = $(this).closest("li").find(".fechaEmision").val();
                if(!fecha_emision){
                    alert("Ingrese Fecha de Emision");
                    $(this).closest("li").find(".diasVenc").val("");
                    return(false);
                }
		var fecha = sumaFecha($(this).val(),fecha_emision);
		$(this).closest("li").find(".fechaVencimiento").val(fecha);
		//$(this).closest("li").find(".diasVenc").val(3);
	});

	$(function() {
		/*$(".fechaEmision").each(function(){
			if($(this).val()!=""){
				var fecha = sumaFecha(3,$(this).val());
				$(this).closest("li").find(".fechaVencimiento").val(fecha);
                                $(this).closest("li").find(".diasVenc").val(3);
			}
		});*/
                
                $(".diasVenc").each(function(){
                    var fecha_emision = $(this).closest("li").find(".fechaEmision").val();
			if($(this).val()!="" && fecha_emision!=""){
				var fecha = sumaFecha($(this).val(),fecha_emision);
				$(this).closest("li").find(".fechaVencimiento").val(fecha);
                                //$(this).closest("li").find(".diasVenc").val(3);
			}
		});
   	});
    ',
    View::POS_READY
    //'my-button-handler'
);
?>
