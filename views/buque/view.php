<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Buque */

$this->title = $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Buques', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="buque-view">

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
            'NOMBRE',
            'ESTATUS',
        ],
    ]) ?>

</div>
