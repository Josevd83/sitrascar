<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PuertoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Puertos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="puerto-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Puerto', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'ESTADO_ID',
            'NOMBRE',
            'ESTATUS',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
