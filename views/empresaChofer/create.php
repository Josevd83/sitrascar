<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Empresachofer */

$this->title = 'Create Empresachofer';
$this->params['breadcrumbs'][] = ['label' => 'Empresachofers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="empresachofer-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
