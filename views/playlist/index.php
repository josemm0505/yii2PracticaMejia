<?php

use app\models\Playlist;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\PlaylistSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Playlists');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="playlist-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php 
        if(!Yii::$app->user->isGuest)
        echo Html::a(Yii::t('app', 'Create Playlist'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'idplaylist',
            'nombre',
            [
                'attribute'=>'usuario_idusuario',
                'format'=>'html',
                'value'=>function($model){
                    return $model->usuario_idusuario ? $model->usuarioIdusuario->username : '(Sin usuario)';
                }
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Playlist $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idplaylist' => $model->idplaylist, 'usuario_idusuario' => $model->usuario_idusuario]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>

