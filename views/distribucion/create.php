<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Distribucion */

$this->title = 'NUEVA DISTRIBUCION';
$this->params['breadcrumbs'][] = ['label' => 'Distribuir Carga', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="distribucion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
