<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Distribucion */

$this->title = $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Distribucion', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="distribucion-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('ACTUALIZAR', ['update', 'id' => $model->ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('BORRAR', ['delete', 'id' => $model->ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'ESTA SEGURO DE ELIMINAR ESTE REGISTRO?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID',
            'DESCRIPCION',
            'cARGA.DESCRIPCION',
            'cENTRALES.NOMBRE',
            'CANTIDAD',
            'FE_ASIGNACION',
            'CANT_FLETES',
            'PERMISO_INSAI',
            'FE_EMISION_PI',
            'DIAS_VENCE_PI',
            'FE_VENCE_PI',
            'CODIGO_SICA',
            'CANT_DESPACHADA',
            'OBSERVACIONES:ntext',
            'FE_REGISTRO',
            ['label'=>'Estatus de la Distribucion','value'=>($model->ESTATUS_DIS == 1)?'EN PROCESO':'COMPLETADO'],
        ],
    ]) ?>

</div>
