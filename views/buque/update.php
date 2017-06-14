<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Buque */

$this->title = 'Update Buque: ' . $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Buques', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="buque-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
