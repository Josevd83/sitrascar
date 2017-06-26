<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FleteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Fletes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="flete-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Flete', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'ESTATUS_FLETE_ID',
            'EMPRESACHOFER_ID',
            'VEHICULO_ID',
            'LISTA_ID',
            // 'GUIA_SADA',
            // 'FE_EMISION_GS',
            // 'DIAS_VENCE_GS',
            // 'FE_VENCE_GS',
            // 'ORDEN_PESO_CARGA',
            // 'FE_EMISION_OPC',
            // 'ORDEN_CARGA_CVA',
            // 'FE_EMISION_OCCVA',
            // 'ORDEN_CARGA_TQ',
            // 'FE_EMISION_OCTQ',
            // 'FE_IN_BOL',
            // 'FE_PE_TARA_BOL',
            // 'PESO_TARA_BOL',
            // 'FE_PE_CAR_BOL',
            // 'PESO_CAR_BOL',
            // 'FE_OUT_BOL',
            // 'FE_IN_CEN',
            // 'FE_PE_CAR_CEN',
            // 'PESO_CAR_CEN',
            // 'FE_PE_TARA_CEN',
            // 'PE_TARA_CEN',
            // 'PESO_CARGA',
            // 'PESO_DESCARGA',
            // 'FALTANTE',
            // 'GUIA_RECEP',
            // 'OBSERVACIONES:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
