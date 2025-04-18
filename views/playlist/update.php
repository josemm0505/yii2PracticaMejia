<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Playlist $model */

$this->title = Yii::t('app', 'Update Playlist: {name}', [
    'name' => $model->idplaylist,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Playlists'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idplaylist, 'url' => ['view', 'idplaylist' => $model->idplaylist, 'usuario_idusuario' => $model->usuario_idusuario]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="playlist-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
