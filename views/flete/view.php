<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Flete */

$this->title = $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Fletes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="flete-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID',
            'ESTATUS_FLETE_ID',
            'EMPRESA_CHOFER_ID',
            'VEHICULO_ID',
            'LISTA_ID',
            'GUIA_SADA',
            'FE_EMISION_GS',
            'DIAS_VENCE_GS',
            'FE_VENCE_GS',
            'ORDEN_PESO_CARGA',
            'FE_EMISION_OPC',
            'ORDEN_CARGA_CVA',
            'FE_EMISION_OCCVA',
            'ORDEN_CARGA_TQ',
            'FE_EMISION_OCTQ',
            'FE_IN_BOL',
            'FE_PE_TARA_BOL',
            'PESO_TARA_BOL',
            'FE_PE_CAR_BOL',
            'PESO_CAR_BOL',
            'FE_OUT_BOL',
            'FE_IN_CEN',
            'FE_PE_CAR_CEN',
            'PESO_CAR_CEN',
            'FE_PE_TARA_CEN',
            'PE_TARA_CEN',
            'PESO_CARGA',
            'PESO_DESCARGA',
            'FALTANTE',
            'GUIA_RECEP',
            'OBSERVACIONES:ntext',
        ],
    ]) ?>

</div>
