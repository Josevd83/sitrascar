<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Cuentas */

$this->title = $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Cuentas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cuentas-view">

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
            'eMPRESA.NOMBRE',
            'BANCO',
             ['label'=>'Tipo de Cuenta','value'=>($model->TIPO == 1)?'CORRIENTE':'AHORRO'],
            'NRO_CUENTA',
            'CEDULA_RIF',
            'TITULAR',
            ['label'=>'Estatus','value'=>($model->ESTATUS == 1)?'ACTIVA':'INACTIVA'],
        ],
    ]) ?>

</div>
