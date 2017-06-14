<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Centrales */

$this->title = 'Create Centrales';
$this->params['breadcrumbs'][] = ['label' => 'Centrales', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="centrales-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
