<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Lista */

$this->title = 'Permso INSAI - Guía Sada';
$this->params['breadcrumbs'][] = ['label' => 'Listas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lista-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formInsaiSada', [
        'modelLista' => $modelLista,
        'modelFlete' => $modelFlete,
        'modelDistribucion' => $modelDistribucion,
    ]) ?>

</div>
