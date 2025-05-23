<?php

use app\models\Album;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\AlbumSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Albums');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="album-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php 
        if(!Yii::$app->user->isGuest)
        echo Html::a(Yii::t('app', 'Create Album'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'idalbum',
            'titulo',
            'fecha_lanzamiento',
            //'portadaAlbum',
            [
                'attribute' => 'portadaAlbum',
                'format' => 'html',
                'value' => function ($model) {
                    if($model-> portadaAlbum)
                        return Html::img(Yii::getAlias('@web') . '/portadas/' . $model->portadaAlbum, ['style' => 'width: 200px']);
                    return null;
                }
            ],
            [
                'attribute'=>'artista_idartista',
                'format'=>'html',
                'value'=>function($model){
                    return $model->artista_idartista ? $model->artistaIdartista->nombre : '(Sin artista)';
                }
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Album $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idalbum' => $model->idalbum, 'artista_idartista' => $model->artista_idartista]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
