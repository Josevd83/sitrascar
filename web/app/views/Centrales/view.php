<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Centrales */

$this->title = $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Centrales', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="centrales-view">

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
            'PARROQUIA_ID',
            'MUNICIPIO_ID',
            'ESTADO_ID',
            'NOMBRE',
            'RIF',
            'DIRECCION',
            'TELEFONO_1',
            'TELEFONO_2',
            'ESTATUS',
        ],
    ]) ?>

</div>
