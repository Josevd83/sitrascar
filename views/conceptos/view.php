<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Conceptos */

$this->title = "Detalle del Concepto";
$this->params['breadcrumbs'][] = ['label' => 'Conceptos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="conceptos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modificar', ['update', 'id' => $model->ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php if($model->ESTATUS=='1')$model->ESTATUS='ACTIVO';else $model->ESTATUS='INACTIVO' ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'ID',
            'NOMBRE',
            'SIGNO',
            'FORMULA',
            'ESTATUS',
        ],
    ]) ?>

</div>
