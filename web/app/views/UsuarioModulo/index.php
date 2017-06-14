<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsuarioModuloSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usuario Modulos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuario-modulo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Usuario Modulo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'USUARIO_ID',
            'MODULO_ID',
            'CONSULTA',
            'INSERTA',
            // 'ACTUALIZA',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
