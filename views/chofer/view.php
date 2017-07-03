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
        <?= Html::a('ASOCIAR VEHICULO', ['empresachofer/update', 'id' => $modelEmpresachofer->ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('BORRAR', ['delete', 'id' => $model->ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'ESTA SEGURO DE ELIMINAR ESTE REGISTRO?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $modelEmpresachofer,
        'attributes' => [
            'cHOFER.ID',
            'eMPRESA.NOMBRE',
            'cHOFER.CEDULA',
            'cHOFER.PRIMER_NOMBRE',
            'cHOFER.SEGUNDO_NOMBRE',
            'cHOFER.PRIMER_APELLIDO',
            'cHOFER.SEGUNDO_APELLIDO',
            'cHOFER.RIF',
            'cHOFER.DIRECCION',
            'cHOFER.CORREO',
            'cHOFER.TELEFONO_1',
            'cHOFER.TELEFONO_2',
            'cHOFER.FE_VENCE_CER',
            'cHOFER.FE_VENCE_LIC',
            'cHOFER.IMG_CEDULA',
            'cHOFER.IMG_LICENCIA',
            'cHOFER.IMG_CERTIFICADO',
            ['label'=>'Estatus','value'=>($model->ESTATUS == 1)?'ACTIVO':'INACTIVO']
        ],
    ]) ?>

</div>
