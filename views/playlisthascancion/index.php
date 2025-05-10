<?php

use app\models\PlaylistHasCancion;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\PlaylistHasCancionSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Playlist Has Cancions');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="playlist-has-cancion-index">

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
            'cancion_idcancion',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, PlaylistHasCancion $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'playlist_idplaylist' => $model->playlist_idplaylist, 'cancion_idcancion' => $model->cancion_idcancion]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
