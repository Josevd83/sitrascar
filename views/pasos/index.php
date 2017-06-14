<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PasosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pasos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pasos-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Pasos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'NOMBRE',
            'ORDEN',
            'ESTATUS',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
