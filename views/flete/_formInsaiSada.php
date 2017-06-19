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
                <?= $form->field($flete, "[$index]GUIA_SADA", ['inputOptions'=>['placeholder'=>$flete->getAttributeLabel('GUIA_SADA')]])->textInput(['maxlength' => true])->label(false); ?>
            </div>
            <div class="col-sm-2">
                <?php echo DatePicker::widget([
                        'model' => $flete, 
                        'attribute' => "[$index]FE_EMISION_GS",
                        'removeButton' => false,
                        'options' => ['placeholder' => $flete->getAttributeLabel('FE_EMISION_GS')],
                        'pluginOptions' => [
                            'autoclose'=>true
                        ]
                    ]); 
                ?>
            </div>
            <div class="col-sm-2">
                <?php echo DatePicker::widget([
                        'model' => $flete, 
                        'attribute' => "[$index]FE_VENCE_GS",
                        'removeButton' => false,
                        'options' => ['placeholder' => $flete->getAttributeLabel('FE_VENCE_GS')],
                        'pluginOptions' => [
                            'autoclose'=>true
                        ]
                    ]); 
                ?>
            </div>
            <div class="col-sm-2">
                <?= $form->field($flete, "[$index]ORDEN_PESO_CARGA", ['inputOptions'=>['placeholder'=>$flete->getAttributeLabel('ORDEN_PESO_CARGA')]])->textInput(['maxlength' => true])->label(false); ?>
            </div>
            <div class="col-sm-2">
                <?= $form->field($flete, "[$index]PESO_CARGA", ['inputOptions'=>['placeholder'=>$flete->getAttributeLabel('PESO_CARGA')]])->textInput(['maxlength' => true])->label(false); ?>
            </div>
            <div class="col-sm-2">
                <?php echo DatePicker::widget([
                        'model' => $flete, 
                        'attribute' => "[$index]FE_EMISION_OPC",
                        'removeButton' => false,
                        'options' => ['placeholder' => $flete->getAttributeLabel('FE_EMISION_OPC')],
                        'pluginOptions' => [
                            'autoclose'=>true
                        ]
                    ]); 
                ?>
            </div>

            <div class="col-sm-12" style="margin-bottom:10px;"><hr style="border-bottom:1px dashed #ccc;"></div>

        </div>
    <?php endforeach ?>
</div>

<!---------------------------------------->
<!---------------------------------------->
    <div id="integration-list">
        <ul>
            <?php foreach($modelFlete as $index => $flete): ?>
                
                <li>
                    <a class="expand">
                        <div class="right-arrow">+</div>
                        <div>
                            <h2>Flete : <?= $flete->ID; ?></h2>
                            <span><?= $flete->OBSERVACIONES; ?></span>
                        </div>
                    </a>

                    <div class="detail">
                        <div>
                            <div class="col-sm-12">
                                <?php  $flete->chofer = $flete->nomApeChofer() ?>
                                <?= $form->field($flete, "[$index]chofer")->textInput(['maxlength' => true,'placeholder'=>'text','disabled'=>true])->label(false); ?>
                            </div>
                        </div>
                        
                        <div class="col-sm-2">
                            <?= $form->field($flete, "[$index]GUIA_SADA", ['inputOptions'=>['placeholder'=>$flete->getAttributeLabel('GUIA_SADA')]])->textInput(['maxlength' => true])->label(false); ?>
                        </div>
                        <div class="col-sm-2">
                            <?php echo DatePicker::widget([
                                    'model' => $flete, 
                                    'attribute' => "[$index]FE_EMISION_GS",
                                    'removeButton' => false,
                                    'options' => ['placeholder' => $flete->getAttributeLabel('FE_EMISION_GS')],
                                    'pluginOptions' => [
                                        'autoclose'=>true
                                    ]
                                ]); 
                            ?>
                        </div>
                        <div class="col-sm-2">
                            <?php echo DatePicker::widget([
                                    'model' => $flete, 
                                    'attribute' => "[$index]FE_VENCE_GS",
                                    'removeButton' => false,
                                    'options' => ['placeholder' => $flete->getAttributeLabel('FE_VENCE_GS')],
                                    'pluginOptions' => [
                                        'autoclose'=>true
                                    ]
                                ]); 
                            ?>
                        </div>
                        <div class="col-sm-2">
                            <?= $form->field($flete, "[$index]ORDEN_PESO_CARGA", ['inputOptions'=>['placeholder'=>$flete->getAttributeLabel('ORDEN_PESO_CARGA')]])->textInput(['maxlength' => true])->label(false); ?>
                        </div>
                        <div class="col-sm-2">
                            <?= $form->field($flete, "[$index]PESO_CARGA", ['inputOptions'=>['placeholder'=>$flete->getAttributeLabel('PESO_CARGA')]])->textInput(['maxlength' => true])->label(false); ?>
                        </div>
                        <div class="col-sm-2">
                            <?php echo DatePicker::widget([
                                    'model' => $flete, 
                                    'attribute' => "[$index]FE_EMISION_OPC",
                                    'removeButton' => false,
                                    'options' => ['placeholder' => $flete->getAttributeLabel('FE_EMISION_OPC')],
                                    'pluginOptions' => [
                                        'autoclose'=>true
                                    ]
                                ]); 
                            ?>
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
    });',
    View::POS_READY
    //'my-button-handler'
);
?>