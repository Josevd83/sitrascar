<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Distribucion */

$this->title = $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Distribucions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="distribucion-view">

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
            'CENTRALES_ID',
            'CARGA_ID',
            'CANTIDAD',
            'FE_ASIGNACION',
            'CANT_FLETES',
            'PERMISO_INSAI',
            'FE_EMISION_PI',
            'DIAS_VENCE_PI',
            'FE_VENCE_PI',
            'CODIGO_SICA',
            'CANT_DESPACHADA',
            'OBSERVACIONES:ntext',
            'FE_REGISTRO',
            'ESTATUS_DIS',
        ],
    ]) ?>

</div>
