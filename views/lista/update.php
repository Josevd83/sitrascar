<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Lista */

$this->title = 'Modificar Lista';
$this->params['breadcrumbs'][] = ['label' => 'Listas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Modificar', 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="lista-update">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->

    <?= $this->render('_formUpdate', [
        'model' => $model,
        'modelDistribucion' => $modelDistribucion,
        'modelFlete' => $modelFlete,
    ]) ?>

</div>
