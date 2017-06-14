<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CentralesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Centrales';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="centrales-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Centrales', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'PARROQUIA_ID',
            'MUNICIPIO_ID',
            'ESTADO_ID',
            'NOMBRE',
            // 'RIF',
            // 'DIRECCION',
            // 'TELEFONO_1',
            // 'TELEFONO_2',
            // 'ESTATUS',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
