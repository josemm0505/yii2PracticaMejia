<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Cancion $model */

$this->title = Yii::t('app', 'Update Cancion: {name}', [
    'name' => $model->idcancion,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cancions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idcancion, 'url' => ['view', 'idcancion' => $model->idcancion, 'album_idalbum' => $model->album_idalbum, 'album_artista_idartista' => $model->album_artista_idartista, 'genero_idgenero' => $model->genero_idgenero]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="cancion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
