<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pais */

$this->title = 'Update Pais: ' . $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Pais', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pais-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
