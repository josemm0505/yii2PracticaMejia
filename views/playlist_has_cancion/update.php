<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Playlist_Has_Cancion $model */

$this->title = Yii::t('app', 'Update Playlist Has Cancion: {name}', [
    'name' => $model->playlist_idplaylist,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Playlist Has Cancions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->playlist_idplaylist, 'url' => ['view', 'playlist_idplaylist' => $model->playlist_idplaylist, 'playlist_usuario_idusuario' => $model->playlist_usuario_idusuario, 'cancion_idcancion' => $model->cancion_idcancion, 'cancion_album_idalbum' => $model->cancion_album_idalbum, 'cancion_album_artista_idartista' => $model->cancion_album_artista_idartista, 'cancion_genero_idgenero' => $model->cancion_genero_idgenero]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="playlist--has--cancion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
