<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Playlist_Has_Cancion $model */

$this->title = $model->playlist_idplaylist;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Playlist Has Cancions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="playlist--has--cancion-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'playlist_idplaylist' => $model->playlist_idplaylist, 'playlist_usuario_idusuario' => $model->playlist_usuario_idusuario, 'cancion_idcancion' => $model->cancion_idcancion, 'cancion_album_idalbum' => $model->cancion_album_idalbum, 'cancion_album_artista_idartista' => $model->cancion_album_artista_idartista, 'cancion_genero_idgenero' => $model->cancion_genero_idgenero], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'playlist_idplaylist' => $model->playlist_idplaylist, 'playlist_usuario_idusuario' => $model->playlist_usuario_idusuario, 'cancion_idcancion' => $model->cancion_idcancion, 'cancion_album_idalbum' => $model->cancion_album_idalbum, 'cancion_album_artista_idartista' => $model->cancion_album_artista_idartista, 'cancion_genero_idgenero' => $model->cancion_genero_idgenero], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'playlist_idplaylist',
            'playlist_usuario_idusuario',
            'cancion_idcancion',
            'cancion_album_idalbum',
            'cancion_album_artista_idartista',
            'cancion_genero_idgenero',
        ],
    ]) ?>

</div>
