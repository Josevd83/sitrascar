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
            'EMPRESA_CHOFER_ID',
            'VEHICULO_ID',
            'LISTA_ID',
            'GUIA_SADA',
            // 'FE_EMISION_GS',
            // 'DIAS_VENCE_GS',
            // 'FE_VENCE_GS',
            // 'ORDEN_PESO_CARGA',
            // 'FE_EMISION_OPC',
            // 'ORDEN_CARGA_CVA',
            // 'FE_EMISION_OCCVA',
            // 'ORDEN_CARGA_TQ',
            // 'FE_EMISION_OCTQ',
            // 'PESO_CARGA',
            // 'PESO_DESCARGA',
            // 'GUIA_RECEPCION',
            // 'ESTATUS_FLETE',
            // 'OBSERVACIONES:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
