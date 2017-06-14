<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Carga */

$this->title = $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Cargas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="carga-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID',
            'TIPO_CARGA_ID',
            'PUERTO_ID',
            'RUBROS_ID',
            'PAIS_ID',
            'BUQUE_ID',
            'FECHA_ATRAQUE',
            'BL',
            'MUELLE',
            'PESO',
            'COD_VIAJE',
            'PESO_ASIGNADO',
            'ESTATUS_CARGA',
            'PESO_DISTRIBUIDO',
            'FECHA_REGISTRO',
            'OBSERVACIONES:ntext',
        ],
    ]) ?>

</div>
