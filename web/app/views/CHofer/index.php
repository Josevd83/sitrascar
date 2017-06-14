<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ChoferSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Chofers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="chofer-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Chofer', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'CEDULA',
            'PRIMER_NOMBRE',
            'SEGUNDO_NOMBRE',
            'PRIMER_APELLIDO',
            // 'SEGUNDO_APELLIDO',
            // 'RIF',
            // 'DIRECCION',
            // 'CORREO',
            // 'TELEFONO_1',
            // 'TELEFONO_2',
            // 'FE_VENCE_CER',
            // 'FE_VENCE_LIC',
            // 'IMG_CEDULA',
            // 'IMG_LICENCIA',
            // 'IMG_CERTIFICADO',
            // 'ESTATUS',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
