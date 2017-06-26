<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VehiculoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'VEHICULOS';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vehiculo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('NUEVO VEHICULO', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            [
              'attribute'=> 'EMPRESA_ID',
              'value'=>'eMPRESA.NOMBRE'
            ],
            'PLACA_CHUTO',
            'PLACA_REMOLQUE',
            'MARCA',
            'ESTATUS',
            //'MODELO',
            // 'SERIAL',
            
            // 'CAPACIDAD',
            // 'COLOR',
            // 'SROP',
            // 'NRO_PRC',
            // 'FE_VENCE_PRC',
            // 'IMG_CARNET',
            

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
