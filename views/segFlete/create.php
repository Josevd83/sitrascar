<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Segflete */

$this->title = 'Create Segflete';
$this->params['breadcrumbs'][] = ['label' => 'Segfletes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="segflete-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
