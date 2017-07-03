<?php
//use yii\widgets\ActiveForm;
use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use yii\web\View;
use yii\helpers\Url;

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

    <?= $form->field($modelLista, "ID")->hiddenInput()->label(false) ?>

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
                <?= $form->field($flete, "[$index]ID")->hiddenInput()->label(false) ?>
                <li>

                    <?= (!empty($flete->GUIA_SADA))? '<div class="left-status"><span class="label label-success">Guia Sada</span></div>': '<div class="left-status"><span class="label label-danger">Guia Sada</span></div>' ?>
                    
                    <?= (!empty($flete->ORDEN_PESO_CARGA))? '<div class="left-status"><span class="label label-success">Orden Pesaje - Carga</span></div>': '<div class="left-status"><span class="label label-danger">Orden Pesaje - Carga</span></div>' ?>
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
                            <?= $form->field($flete, "[$index]GUIA_SADA", ['inputOptions'=>['placeholder'=>$flete->getAttributeLabel('GUIA_SADA')]])->textInput(['maxlength' => true]); ?>
                        </div>
                        <div class="col-sm-2">
                            <?php echo '<label class="control-label">Fecha de Emision</label>'; ?>
			    <?php if($flete->FE_EMISION_GS)$flete->FE_EMISION_GS = Yii::$app->formatter->asDate($flete->FE_EMISION_GS, 'dd-MM-Y'); ?>
                            <?php echo DatePicker::widget([
                                    'model' => $flete, 
                                    'attribute' => "[$index]FE_EMISION_GS",
                                    'removeButton' => false,
                                    'options' => ['placeholder' => $flete->getAttributeLabel('FE_EMISION_GS')],
                                    'pluginOptions' => [
                                        'autoclose'=>true,
					'format' => 'dd-mm-yyyy',
                                    ],
				    'options' => [
					'class' => 'fechaEmision',
				    ]
                                ]); 
                            ?>
                        </div>
                        <div class="col-sm-2">
                            <!--<div class="form-group">
                                <?php //echo '<label class="control-label">Dias Vencimiento</label>'; ?>
                                <?php //= Html::input('text', 'diasVenc', '', ['class' => 'form-control diasVenc','placeholder' => 'Dias Vencimiento']) ?>
                            </div>-->
                            <?= $form->field($flete, "[$index]DIAS_VENCE_GS", ['inputOptions'=>['placeholder'=>$flete->getAttributeLabel('DIAS_VENCE_GS')]])->textInput(['maxlength' => true,'class'=>'diasVenc'])->label('Dias Vencimiento'); ?>
                        </div>
                        <div class="col-sm-2">
                            <?php echo '<label class="control-label">Fecha Vencimiento</label>'; ?>
                            <?php echo DatePicker::widget([
                                    'model' => $flete, 
                                    'attribute' => "[$index]FE_VENCE_GS",
                                    'removeButton' => false,
                                    'options' => ['placeholder' => $flete->getAttributeLabel('FE_VENCE_GS')],
				    //'readonly' => true,
				    'disabled' => true,
                                    'pluginOptions' => [
                                        'autoclose'=>true,
					'format' => 'dd-mm-yyyy'
                                    ],
				    'options' => [
					'class' => 'fechaVencimiento',
				    ]
                                ]); 
                            ?>
                        </div>
                        <div class="col-sm-2">
                            <?= $form->field($flete, "[$index]ORDEN_PESO_CARGA", ['inputOptions'=>['placeholder'=>$flete->getAttributeLabel('ORDEN_PESO_CARGA')]])->textInput(['maxlength' => true]); ?>
                        </div>
                        <div class="col-sm-2">
                            <?php if($flete->FE_EMISION_OPC)$flete->FE_EMISION_OPC = Yii::$app->formatter->asDate($flete->FE_EMISION_OPC, 'dd-MM-Y'); ?>
                            <?php echo '<label class="control-label">Fecha Orden PC</label>'; ?>
                            <?php echo DatePicker::widget([
                                    'model' => $flete, 
                                    'attribute' => "[$index]FE_EMISION_OPC",
                                    'removeButton' => false,
                                    'options' => ['placeholder' => $flete->getAttributeLabel('FE_EMISION_OPC')],
                                    'pluginOptions' => [
                                        'autoclose'=>true,
					'format' => 'dd-mm-yyyy'
                                    ]
                                ]); 
                            ?>
                        </div>
                    </div>
                    <?= (!empty($flete->GUIA_SADA) && !empty($flete->ORDEN_PESO_CARGA))? Html::a('Generar Orden de Carga CVA', ['flete/ordencargacva'],['title'=>'Generar Orden de Carga CVA','data-method'=>'POST','data-params' =>['lista' => $flete->ID],'class'=>'btn btn-info btn-xs']): '' ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
<!---------------------------------------->
<!---------------------------------------->

    <?= $form->field($modelLista, 'ID')->hiddenInput()->label(false) ?>

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
