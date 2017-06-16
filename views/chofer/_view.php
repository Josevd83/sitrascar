<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Chofer */

$this->title = $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Chofers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="chofer-view">

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
            'CEDULA',
            'PRIMER_NOMBRE',
            'SEGUNDO_NOMBRE',
            'PRIMER_APELLIDO',
            'SEGUNDO_APELLIDO',
            'RIF',
            'DIRECCION',
            'CORREO',
            'TELEFONO_1',
            'TELEFONO_2',
            'FE_VENCE_CER',
            'FE_VENCE_LIC',
            'IMG_CEDULA',
            'IMG_LICENCIA',
            'IMG_CERTIFICADO',
            'ESTATUS',
        ],
    ]) ?>

</div>
