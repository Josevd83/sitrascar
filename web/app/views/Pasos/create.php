<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Pasos */

$this->title = 'Create Pasos';
$this->params['breadcrumbs'][] = ['label' => 'Pasos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pasos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
