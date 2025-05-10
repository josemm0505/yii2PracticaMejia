<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\PlaylistHasCancion $model */

$this->title = Yii::t('app', 'Update Playlist Has Cancion: {name}', [
    'name' => $model->playlist_idplaylist,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Playlist Has Cancions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->playlist_idplaylist, 'url' => ['view', 'playlist_idplaylist' => $model->playlist_idplaylist, 'cancion_idcancion' => $model->cancion_idcancion]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="playlist-has-cancion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
