<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Buque */

$this->title = 'NUEVO BUQUE';
$this->params['breadcrumbs'][] = ['label' => 'Buques', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="buque-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
