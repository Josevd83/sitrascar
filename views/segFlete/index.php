<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SegfleteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Segfletes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="segflete-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Segflete', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'PASOS_ID',
            'FLETE_ID',
            'FECHA',
            'PESO',
            // 'OBSERVACIONES:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
