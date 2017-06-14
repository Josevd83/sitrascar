<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Distribucion */

$this->title = 'ACTUALIZAR DISTRIBUCION: ' . $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Distribuir Carga', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="distribucion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
