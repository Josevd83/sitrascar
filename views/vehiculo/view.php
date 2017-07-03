<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Vehiculo */

$this->title = $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Vehiculos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
if($model->ESTATUS == 0) $estatus = 'INACTIVO';
if($model->ESTATUS == 1) $estatus = 'DISPONIBLE';
if($model->ESTATUS == 2) $estatus = 'ASIGNADO';
?>
<div class="vehiculo-view">

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
	    'eMPRESA.NOMBRE',
            'PLACA_CHUTO',
            'MARCA',
            'MODELO',
            'SERIAL',
            'PLACA_REMOLQUE',
            'CAPACIDAD',
            'COLOR',
            'SROP',
            'NRO_PRC',
            'FE_VENCE_PRC',
            'IMG_CARNET',
            ['label'=>'Estatus','value'=>$estatus],
        ],
    ]) ?>

</div>
