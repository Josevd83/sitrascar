<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
//use yii\widgets\ActiveForm;
use yii\bootstrap\Modal;
use kartik\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use kartik\widgets\DepDrop;
//use softark\duallistbox\DualListbox;

/* @var $this yii\web\View */
/* @var $model app\models\Lista */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lista-form">

    <?php $var = ArrayHelper::map(app\models\Centrales::find()->all(), 'ID', 'NOMBRE') ?>
	<?php $var2 = ArrayHelper::map(app\models\Empresa::find()->all(), 'ID', 'NOMBRE') ?>

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($modelDistribucion, 'CENTRALES_ID')->dropDownList($var, ['prompt' => 'Seleccione' ]) ?>

    <?php
        echo $form->field($model, 'DISTRIBUCION_ID')->widget(DepDrop::classname(), [
            'options'=>['id'=>'subcat-id'],
            'pluginOptions'=>[
                'depends'=>['distribucion-centrales_id'],
                'placeholder'=>'Seleccione',
                'url'=>Url::to(['lista/getdistribucioncentrales'])
            ]
        ]);
    ?>

    <?php // $form->field($model, 'FECHA_CREACION')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?php echo '<label class="control-label">Fecha de Carga</label>'; ?>
        <?php echo DatePicker::widget([
                'model' => $model, 
                'attribute' => 'FECHA_CREACION',
                'removeButton' => false,
                'options' => ['placeholder' => 'Ingrese Fecha de Carga'],
                'pluginOptions' => [
                    'autoclose'=>true
                ]
            ]); 
        ?>
    </div>

    <?= $form->field($model, 'empresa')->dropDownList($var2, ['prompt' => 'Seleccione' ]) ?>

    <?php //= $form->field($model, 'DISTRIBUCION_ID')->textInput(['maxlength' => true]) ?>

    <?php /*
        $items = app\models\Lista::getChoferesDisponibles();
        $options = [
            'multiple' => true,
            'size' => 20,
        ];
        // echo $form->field($model, $attribute)->listBox($items, $options);
        echo $form->field($modelFlete, 'EMPRESA_CHOFER_ID')->widget(DualListbox::className(),[
            'items' => $items,
            'options' => $options,
            'clientOptions' => [
                'moveOnSelect' => false,
                'selectedListLabel' => 'Selected Items',
                'nonSelectedListLabel' => 'Available Items',
            ],
        ]);*/
    ?>

    <div class="form-group">
     <?php

        $region = app\models\Chofer::find();

        echo maksyutin\duallistbox\Widget::widget([
            'model' => $modelFlete,
            'attribute' => 'EMPRESA_CHOFER_ID',
            'title' => 'Título',
            'data' => $region,
            'data_id'=> 'ID',
            'data_value'=> 'PRIMER_NOMBRE',
            'lngOptions' => [
                'warning_info' => 'warning_info',
                'search_placeholder' => 'Filtrar',
                'showing' => ' - En lista',
                'available' => 'Choferes Disponible',
                'selected' => 'Choferes Seleccionados'
            ]
          ]);
    ?>
    </div>

    <?= $form->field($model, 'ESTATUS_LISTA')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
