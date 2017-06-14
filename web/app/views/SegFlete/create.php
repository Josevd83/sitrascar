<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SegFlete */

$this->title = 'Create Seg Flete';
$this->params['breadcrumbs'][] = ['label' => 'Seg Fletes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="seg-flete-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
