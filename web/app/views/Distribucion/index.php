<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DistribucionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Distribucions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="distribucion-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Distribucion', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'CENTRALES_ID',
            'CARGA_ID',
            'CANTIDAD',
            'FE_ASIGNACION',
            // 'CANT_FLETES',
            // 'PERMISO_INSAI',
            // 'FE_EMISION_PI',
            // 'DIAS_VENCE_PI',
            // 'FE_VENCE_PI',
            // 'CODIGO_SICA',
            // 'CANT_DESPACHADA',
            // 'OBSERVACIONES:ntext',
            // 'FE_REGISTRO',
            // 'ESTATUS_DIS',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
