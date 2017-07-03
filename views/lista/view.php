<?php

use yii\helpers\Html;
use yii\helpers\Url;
//use yii\widgets\DetailView;
use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Lista */

$this->title = "Detalle de la Lista";
$this->params['breadcrumbs'][] = ['label' => 'Listas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?php foreach (Yii::$app->session->getAllFlashes() as $message): ?>
    <?php
        echo \kartik\widgets\Growl::widget([
            //'type' => (!empty($message['type'])) ? $message['type'] : 'danger',
            'type' => (!empty($message['type'])) ? $message['type'] : Growl::TYPE_SUCCESS,
            'title' => (!empty($message['title'])) ? Html::encode($message['title']) : 'Title Not Set!',
            'icon' => (!empty($message['icon'])) ? $message['icon'] : 'fa fa-info',
            'body' => (!empty($message['message'])) ? Html::encode($message['message']) : 'Message Not Set!',
            'showSeparator' => true,
            'delay' => 1, //This delay is how long before the message shows
            'pluginOptions' => [
                'delay' => (!empty($message['duration'])) ? $message['duration'] : 3000, //This delay is how long the message shows for
                'showProgressbar' => (!empty($message['showProgressbar'])) ? $message['showProgressbar'] : true,
                'placement' => [
                    'from' => (!empty($message['positonY'])) ? $message['positonY'] : 'top',
                    'align' => (!empty($message['positonX'])) ? $message['positonX'] : 'right',
                    
                ]
            ]
        ]);
    ?>
<?php endforeach; ?>


<div class="lista-view">

    <h1><?php //= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Nueva Lista', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Volver', ['index'], ['class' => 'btn btn-warning']) ?>
        <?= Html::a('Modificar', ['update', 'id' => $model->ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Desea Eliminar esta Lista?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php /*= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID',
            'DISTRIBUCION_ID',
            'FECHA_CREACION',
            'ESTATUS_LISTA',
        ],
    ]) */?>
<?php 
        
    
        $attributes = [
                            [
                                'group'=>true,
                                'label'=>'<span class="glyphicon glyphicon-list-alt"></span> DATOS DE LA LISTA',
                                'rowOptions'=>['class'=>'info']
                            ],
                            [
                                'columns' => [
                                                [
                                                    'attribute'=>'ID',
                                                    //'value'=>$model->solicitante->NACIONALIDAD."-".$model->solicitante->CEDULA,
                                                    'value'=>$model->ID,
                                                    //'type'=>DetailView::INPUT_SELECT2, 
                                                    'label'=>'Lista N°',
                                                    'displayOnly'=>true,
                                                    'valueColOptions'=>['style'=>'width:30%']
                                                ],
                                                [
                                                    'attribute'=>'DISTRIBUCION_ID',
                                                    'label'=>'Distribución #',
                                                    //'value'=>"(".$model->solicitante->COD_TELEFONO.") ".$model->solicitante->NRO_TELEFONO,
                                                    'value'=>$model->DISTRIBUCION_ID,
                                                    'displayOnly'=>true,
                                                    'valueColOptions'=>['style'=>'width:30%']
                                                ],
                                             ],
                            ],
                            [
                                'columns' => [
                                                [
                                                    'attribute'=>'FECHA_CREACION',
                                                    'value'=>$model->FECHA_CREACION,
                                                    //'value'=>$model->solicitante->PRIMER_NOMBRE." ".$model->solicitante->SEGUNDO_NOMBRE,
                                                    //'type'=>DetailView::INPUT_SELECT2, 
                                                    'label'=>'Fecha Creación',
                                                    'displayOnly'=>true,
                                                    'valueColOptions'=>['style'=>'width:30%']
                                                ],
                                                [
                                                    'attribute'=>'ESTATUS_LISTA',
                                                    'label'=>'Estatus de la Lista',
                                                    'value'=>($model->ESTATUS_LISTA == 1)?'Activo':'Inactivo',
                                                    //'value'=>$model->solicitante->CORREO_ELECTRONICO,
                                                    'displayOnly'=>true,
                                                    'valueColOptions'=>['style'=>'width:30%']
                                                ],
                                             ],
                            ],
                            /*[
                                'columns' => [
                                                [
                                                    'attribute'=>'ID_SOLICITANTE',
                                                    'value'=>$model->solicitante->PRIMER_APELLIDO." ".$model->solicitante->SEGUNDO_APELLIDO,
                                                    //'type'=>DetailView::INPUT_SELECT2, 
                                                    'label'=>'Apellidos',
                                                    'displayOnly'=>true,
                                                    'valueColOptions'=>['style'=>'width:30%']
                                                ],
                                                [
                                                    'attribute'=>'ID_SOLICITANTE',
                                                    'label'=>'',
                                                    'value'=>'',
                                                    'displayOnly'=>true,
                                                    'valueColOptions'=>['style'=>'width:30%']
                                                ],
                                             ],
                            ],*/
                            [
                                'group'=>true,
                                'label'=>'<span class="glyphicon glyphicon-scale"></span> DATOS DE LA DISTRIBUCION',
                                'rowOptions'=>['class'=>'info']
                            ],
                            [
                                'columns' => [
                                                [
                                                    'attribute'=>'ID',
                                                    'value'=>$modelDistribucion->DESCRIPCION,
                                                    //'type'=>DetailView::INPUT_SELECT2, 
                                                    'label'=>'Distribución',
                                                    'displayOnly'=>true,
                                                    'valueColOptions'=>['style'=>'width:30%']
                                                ],
                                                [
                                                    'attribute'=>'CANTIDAD',
                                                    'value'=>$modelDistribucion->CANTIDAD,
                                                    //'type'=>DetailView::INPUT_SELECT2, 
                                                    'label'=>'Cantidad',
                                                    'displayOnly'=>true,
                                                    'valueColOptions'=>['style'=>'width:30%']
                                                ],
                                             ]
                            ], 
                            [
                                'columns' => [
                                                [
                                                    'attribute'=>'CODIGO_SICA',
                                                    'value'=>$modelDistribucion->CODIGO_SICA,
                                                    //'value'=>$model->solicitante->PRIMER_NOMBRE." ".$model->solicitante->SEGUNDO_NOMBRE,
                                                    //'type'=>DetailView::INPUT_SELECT2, 
                                                    'label'=>'Código SICA',
                                                    'displayOnly'=>true,
                                                    'valueColOptions'=>['style'=>'width:30%']
                                                ],
                                                [
                                                    'attribute'=>'OBSERVACIONES',
                                                    'label'=>'Observaciones',
                                                    'value'=>$modelDistribucion->OBSERVACIONES,
                                                    //'value'=>$model->solicitante->CORREO_ELECTRONICO,
                                                    'displayOnly'=>true,
                                                    'valueColOptions'=>['style'=>'width:30%']
                                                ],
                                             ],
                            ],
                            [
                                'group'=>true,
                                'label'=>'<span class="glyphicon glyphicon-download-alt"></span> DESCARGAS',
                                'rowOptions'=>['class'=>'info']
                            ],
                            [
                                'attribute'=>'ID',
                                'format'=>'raw',
                                'label'=>'Solicitud Guía SADA',
                                'value'=> Html::a(Html::img(Url::to('@web/images/pdf-icon.png'),['width'=>'50px']), ['ordencva'],['title'=>'Descargar Solicitud Guía SADA','data-method'=>'POST','data-params' =>['lista' => $model->ID]]),
                                //'value'=> Html::a('Crear Nueva Lista', ['create'], ['class' => 'btn btn-success']),
                                //'format'=>['decimal', 2],
                                'inputContainer' => ['class'=>'col-sm-6'],
                                'displayOnly'=>true,
                            ],
                            [
                                'attribute'=>'ID',
                                'format'=>'raw',
                                'label'=>'Solicitud Permiso INSAI',
                                //'value'=> Html::a('', ['create'], ['class'=>'fa fa-file-pdf-o','style'=>'width:150px;']),
                                'value'=> Html::a(Html::img(Url::to('@web/images/pdf-icon.png'),['width'=>'50px']), ['ordenguiasada'],['title'=>'Solicitud Permiso INSAI','data-method'=>'POST','data-params' =>['lista' => $model->ID]]),
                                //'format'=>['decimal', 2],
                                'inputContainer' => ['class'=>'col-sm-6'],
                                'displayOnly'=>true,
                            ],
							[
                                'attribute'=>'ID',
                                'format'=>'raw',
                                'label'=>'Lista',
                                //'value'=> Html::a('', ['create'], ['class'=>'fa fa-file-pdf-o','style'=>'width:150px;']),
                                'value'=> Html::a(Html::img(Url::to('@web/images/pdf-icon.png'),['width'=>'50px']), ['lista'],['title'=>'Solicitud Permiso INSAI','data-method'=>'POST','data-params' =>['lista' => $model->ID]]),
                                //'format'=>['decimal', 2],
                                'inputContainer' => ['class'=>'col-sm-6'],
                                'displayOnly'=>true,
                            ],
                      ];
    ?>
    
    <?php  echo DetailView::widget([
                'model' => $model,
                'attributes' => $attributes,
                'mode' => 'view',
                'panel' => [
                            'heading' => '<span class="glyphicon glyphicon-list-alt"></span> INFORMACIÓN GENERAL',
                            'type' => DetailView::TYPE_PRIMARY,
                            ],
                'bordered' => true,
                'striped' => false,
                'condensed' => false,
                'responsive' =>true,
                'hover' => true,
                'fadeDelay'=>800,
                'enableEditMode'=>false
                /*'buttons1'=>Html::a('', ['/documento/update','id'=>$model->ID_DOCUMENTO], ['class'=>'kv-action-btn glyphicon glyphicon-pencil']) .'{delete}',
                'deleteOptions'=>[
                                    //'url'=>Url::to(['documento/delete/', 'id'=>$model->ID_DOCUMENTO]),
                                    'url'=>'eliminar',
                                    'params'=>['id'=>$model->ID_DOCUMENTO, 'kvdelete'=>true],
                                    'confirm'=>'¿Está seguro de eliminar este documento?'
                                 ],*/
            ])
        
    ?>

</div>
