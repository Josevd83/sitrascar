<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TipoCargaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tipo Cargas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-carga-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tipo Carga', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'NOMBRE',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
