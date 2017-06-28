<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Lista */

$this->title = 'Permso INSAI - Guía Sada';
$this->params['breadcrumbs'][] = ['label' => 'Listas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?php foreach (Yii::$app->session->getAllFlashes() as $message): ?>
    <?php
        echo \kartik\widgets\Growl::widget([
            //'type' => (!empty($message['type'])) ? $message['type'] : 'danger',
            'type' => (!empty($message['type'])) ? $message['type'] : Growl::TYPE_SUCCESS,
            'title' => (!empty($message['title'])) ? Html::encode($message['title']) : 'Title Not Set!',
            'icon' => (!empty($message['icon'])) ? $message['icon'] : 'fa fa-info',
            'body' => (!empty($message['message'])) ? Html::encode($message['message']) : 'Message Not Set!',
            'showSeparator' => true,
            'delay' => 1, //This delay is how long before the message shows
            'pluginOptions' => [
                'delay' => (!empty($message['duration'])) ? $message['duration'] : 3000, //This delay is how long the message shows for
                'showProgressbar' => (!empty($message['showProgressbar'])) ? $message['showProgressbar'] : true,
                'placement' => [
                    'from' => (!empty($message['positonY'])) ? $message['positonY'] : 'top',
                    'align' => (!empty($message['positonX'])) ? $message['positonX'] : 'right',
                    
                ]
            ]
        ]);
    ?>
<?php endforeach; ?>

<div class="lista-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formInsaiSada', [
        'modelLista' => $modelLista,
        'modelFlete' => $modelFlete,
        'modelDistribucion' => $modelDistribucion,
    ]) ?>

</div>
