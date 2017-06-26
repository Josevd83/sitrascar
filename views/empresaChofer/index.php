<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EmpresachoferSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Empresachofers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="empresachofer-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Empresachofer', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'VEHICULO_ID',
            'EMPRESA_ID',
            'CHOFER_ID',
            'BLOQUEADO',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
