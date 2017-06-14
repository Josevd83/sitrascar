<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Parroquia */

$this->title = 'Update Parroquia: ' . $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Parroquias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="parroquia-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>