<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
//use yii\widgets\ActiveForm;
use yii\bootstrap\Modal;
use kartik\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use kartik\widgets\DepDrop;
use yii\web\View;
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
                    'autoclose'=>true,
                    'format' => 'dd-mm-yyyy'
                    //'format' => 'mm-dd-yyyy'
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

        //$region = app\models\Chofer::find();

        echo maksyutin\duallistbox\Widget::widget([
            'model' => $modelFlete,
            'attribute' => 'EMPRESACHOFER_ID',
            //'attribute' => 'ID',
            
            'title' => 'Título',
            //'data' => $region,
            'data' => [],
            'data_id'=> 'ID',
            'data_value'=> 'PRIMER_NOMBRE',
            'lngOptions' => [
                'warning_info' => 'warning_info',
                'search_placeholder' => 'Filtrar',
                'showing' => ' - En lista',
                'available' => 'Choferes Disponible',
                'selected' => 'Choferes Seleccionados',
                'id'=>'idddddddddd'
            ]
          ]);
    ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear Lista' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success crear' : 'btn btn-primary crear']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php $this->registerJs(
        "$('#lista-empresa').on('change', function() {
            var id_empresa = $('#lista-empresa').val();
            var limiteChoferes = $('.selected option:not(:selected)').length;
            if(limiteChoferes >= 20){
                ////alert('Límite de choferes alcanzado (20)');
                return false;
            }
            ////alert(limiteChoferes);
            var choferesSeleccionados = [];
            $('.selected option:not(:selected)').each(function(i, value){ 
              //choferesSeleccionados[i] = $('.selected').text(); 
              choferesSeleccionados[i] = $(this).attr('value'); 
            });
             /*$('.selected').each(function(i, value){ 
              //choferesSeleccionados[i] = $('.selected').attr('value'); 
              choferesSeleccionados[i] = $(this).attr('value'); 
            });*/
console.log(choferesSeleccionados);
            ////alert(choferesSeleccionados);
            $('.unselected').empty();
            /*$.post( '".Url::toRoute("lista/buscarchofer")."&id='+id_empresa,
                 function(data){
                    $('.unselected').html(data);
                }
            )*/
            //console.log(hola);
            $.ajax({
                type: 'POST',
                //dataType: 'json',
                url: '".Url::toRoute("lista/buscarchofer")."',
                data: {id_empresa:id_empresa},
                success:function(data){
                    $('.unselected').html(data);
                }
            }); //ajax            
        });",
        View::POS_READY 
    );
 ?>

<?php $this->registerJs("
	$('.atr').hide();
	$('.atl').hide();

	$('.crear').on('click',function(){
		var selec = 0;
		var noselec = 0;
		$('.selected').each(function(){
			selec = $('.selected option:not(:selected)').length;
			noselec = $('.selected option:selected').length;
		});

		var suma = selec + noselec;

		if(suma > 20){
			alert('Ha excedido el máximo de choferes seleccionados');
			return false;
		}
	});
",View::POS_READY);
 ?>
