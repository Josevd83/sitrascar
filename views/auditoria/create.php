<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Auditoria */

$this->title = 'Create Auditoria';
$this->params['breadcrumbs'][] = ['label' => 'Auditorias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auditoria-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
