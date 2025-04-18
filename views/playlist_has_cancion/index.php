<?php

use app\models\Playlist_Has_Cancion;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\Playlist_Has_CancionSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Playlist Has Cancions');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="playlist--has--cancion-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Playlist Has Cancion'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'playlist_idplaylist',
            'playlist_usuario_idusuario',
            'cancion_idcancion',
            'cancion_album_idalbum',
            'cancion_album_artista_idartista',
            //'cancion_genero_idgenero',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Playlist_Has_Cancion $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'playlist_idplaylist' => $model->playlist_idplaylist, 'playlist_usuario_idusuario' => $model->playlist_usuario_idusuario, 'cancion_idcancion' => $model->cancion_idcancion, 'cancion_album_idalbum' => $model->cancion_album_idalbum, 'cancion_album_artista_idartista' => $model->cancion_album_artista_idartista, 'cancion_genero_idgenero' => $model->cancion_genero_idgenero]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
