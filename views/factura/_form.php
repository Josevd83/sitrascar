<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
//use yii\widgets\ActiveForm;
use kartik\widgets\ActiveForm;
use kartik\widgets\DepDrop;
use yii\web\View;
use app\models\Pagos;
use kartik\widgets\SwitchInput;

$this->registerCssFile("@web/css/acordeon.css");

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

    <?php //= $form->field($model, 'CUENTAS_ID')->textInput(['maxlength' => true]) ?>

    <div id="integration-list">
        <ul>
            <?php foreach($modelFlete as $flete): ?>
                
                <li>
                    <a class="expand">
                        <div class="right-arrow">+</div>
                        <div class="eleccion">
                                <?php echo SwitchInput::widget([
                                'name'=>'PAGOS_ID[]',
                                 'pluginOptions'=>[
                                        //'handleWidth'=>60,
                                        'onText'=>'Seleccionado',
                                        'offText'=>'Seleccionar',
                                        'onColor' => 'success',
                                        //'offColor' => 'danger',
                                    ]
                                ]); ?>
                            </div>
                        <div>
                            <h2>Felte : <?= $flete->ID; ?></h2>
                            <?php //echo $form->field($model, 'PAGOS_ID[]')->widget(SwitchInput::classname(), []); ?>

                            <?php /*echo $form->field($model, 'PAGOS_ID[]')->widget(SwitchInput::classname(), [
                                'type' => SwitchInput::CHECKBOX
                            ]); */ ?>

                            

                            <?php /*
                                echo SwitchInput::widget([
                                    'name' => 'status_11',
                                    'pluginOptions' => [
                                        'size' => 'large',
                                        'onColor' => 'success',
                                        'offColor' => 'danger',
                                    ]
                                ]);
                                */
                            ?>
                            <span style="margin-left:50px;"><?= $flete->OBSERVACIONES; ?></span>
                        </div>
                    </a>

                    <div class="detail">
                        <div class="col-sm-12 well">
                            <?php $pagos = Pagos::find()->with('cONCEPTOS')->where(['FLETE_ID'=>$flete->ID])->all(); ?>

                            <?php  //var_dump(count($pagos));die; ?>

                            <?php if($pagos): ?>

                                <h2>Pagos Asociados</h2>
                                <?php foreach($pagos as $pago): ?>
                            <?php //var_dump($pago);die;?>
                                    <table border="1">
                                        <tr>
                                            <th>Concepto</th>
                                            <th>Monto</th>
                                            <th>Estatus del Pago</th>
                                        </tr>
                                        <tr>
                                            <td><?= $pago->cONCEPTOS->NOMBRE ?></td>
                                            <td><?= $pago->MONTO ?></td>
                                            <td><?= $pago->ESTATUS_PAGO ?></td>
                                        </tr>
                                    </table>
                                <?php endforeach; ?>


                            <?php else: ?>

                                <p>No existen Pagos asociados al Flete</p>

                            <?php endif; ?>

                        </div>
                        <!--<div id="left" style="width:15%;float:left;height:100%;">
                            <div id="sup">
                                <img src="http://www.ciagent.com/ciagent/cialogo4.png" width="100%" />
                            </div>
                        </div>
                        <div id="right" style="width:85%;float:right;height:100%;padding-left:20px;">
                            <div id="sup">
                                <div><span>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</span>
                                    <br />
                                    <br /><a href="#">Visit Website</a>
                                </div>
                            </div>
                        </div>-->
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>


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