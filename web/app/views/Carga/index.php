<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CargaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cargas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="carga-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Carga', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'TIPO_CARGA_ID',
            'PUERTO_ID',
            'RUBROS_ID',
            'PAIS_ID',
            // 'BUQUE_ID',
            // 'FECHA_ATRAQUE',
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
