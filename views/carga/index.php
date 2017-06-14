<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CargaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'CARGAS';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="carga-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('NUEVA CARGA', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            //'TIPO_CARGA_ID',
            //'PUERTO_ID',
            //'RUBROS_ID',
            //'rUBROS.NOMBRE',
            [
              'attribute'=> 'RUBROS_ID',
              'value'=>'rUBROS.NOMBRE'
            ],
            [
              'attribute'=> 'PAIS_ID',
              'value'=>'pAIS.NOMBRE'
            ],
            [
              'attribute'=> 'BUQUE_ID',
              'value'=>'bUQUE.NOMBRE'
            ],
            'FECHA_ATRAQUE',
            // 'BL',
            // 'MUELLE',
            // 'PESO',
            // 'COD_VIAJE',
            // 'PESO_ASIGNADO',
            // 'ESTATUS_CARGA',
            // 'PESO_DISTRIBUIDO',
            // 'FECHA_REGISTRO',
            // 'OBSERVACIONES:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
