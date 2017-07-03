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
            'eSTADO.NOMBRE',
            'mUNICIPIO.NOMBRE',
            'pARROQUIA.NOMBRE',
            'NOMBRE',
            'RIF',
            'DIRECCION',
            'TELEFONO_1',
            'TELEFONO_2',
            ['label'=>'Estatus','value'=>($model->ESTATUS == 1)?'ACTIVO':'INACTIVO'],
        ],
    ]) ?>

</div>
