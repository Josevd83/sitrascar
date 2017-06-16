<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Chofer */

$this->title = 'NUEVO CHOFER';
$this->params['breadcrumbs'][] = ['label' => 'Chofers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="chofer-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
