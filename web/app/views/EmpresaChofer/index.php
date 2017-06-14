<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EmpresaChoferSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Empresa Chofers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="empresa-chofer-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Empresa Chofer', ['create'], ['class' => 'btn btn-success']) ?>
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
