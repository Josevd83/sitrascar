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
        <?= Html::a('ACTUALIZAR', ['update', 'id' => $model->ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('BORRAR', ['delete', 'id' => $model->ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'ESTA SEGURO DE ELIMINAR ESTE REGISTRO?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID',
            'tIPOCARGA.NOMBRE',
            'pUERTO.NOMBRE',
            'rUBROS.NOMBRE',
            'pAIS.NOMBRE',
            'bUQUE.NOMBRE',
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
