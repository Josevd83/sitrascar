<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Flete */

$this->title = 'Create Flete';
$this->params['breadcrumbs'][] = ['label' => 'Fletes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="flete-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
