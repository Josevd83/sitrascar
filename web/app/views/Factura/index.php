<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FacturaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Facturas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="factura-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Factura', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'CUENTAS_ID',
            'PAGOS_ID',
            'MONTO_TOTAL',
            'TOTAL_ANTICIPOS',
            // 'TOTAL_DESCUENTOS',
            // 'NETO_COBRAR',
            // 'ESTATUS_FAC',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
