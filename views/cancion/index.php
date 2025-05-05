<?php

use app\models\Cancion;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\CancionSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Cancions');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cancion-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Cancion'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'idcancion',
            'titulo',
            'duracion',
            'album_idalbum',
            'album_artista_idartista',
            //'genero_idgenero',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Cancion $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idcancion' => $model->idcancion, 'album_idalbum' => $model->album_idalbum, 'album_artista_idartista' => $model->album_artista_idartista, 'genero_idgenero' => $model->genero_idgenero]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
