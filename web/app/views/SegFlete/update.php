<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SegFlete */

$this->title = 'Update Seg Flete: ' . $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Seg Fletes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="seg-flete-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
