<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VehiculoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Vehiculos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vehiculo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Vehiculo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'EMPRESA_ID',
            'PLACA_CHUTO',
            'MARCA',
            'MODELO',
            // 'SERIAL',
            // 'PLACA_REMOLQUE',
            // 'CAPACIDAD',
            // 'COLOR',
            // 'SROP',
            // 'NRO_PRC',
            // 'FE_VENCE_PRC',
            // 'IMG_CARNET',
            // 'ESTATUS',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
