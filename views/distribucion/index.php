<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DistribucionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'DISTRIBUCION';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="distribucion-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('NUEVA DISTRIBUCION', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'DESCRIPCION',
            //'CARGA_ID',
            'FE_ASIGNACION',
            'CANTIDAD',
            'CANT_DESPACHADA',
            
            // 'CANT_FLETES',
            // 'PERMISO_INSAI',
            // 'FE_EMISION_PI',
            // 'DIAS_VENCE_PI',
            // 'FE_VENCE_PI',
            // 'CODIGO_SICA',

            // 'OBSERVACIONES:ntext',
            // 'FE_REGISTRO',
            // 'ESTATUS_DIS',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
