<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsuarioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usuarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuario-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Usuario', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'USUARIO',
            'CLAVE',
            'PRIMER_NOMBRE',
            'SEGUNDO_NOMBRE',
            // 'PRIMER_APELLIDO',
            // 'SEGUNDO_APELLIDO',
            // 'CEDULA',
            // 'CORREO',
            // 'TELEFONO',
            // 'ESTATUS',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
