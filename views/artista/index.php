<?php

use app\models\Artista;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\ArtistaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Artistas');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="artista-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Artista'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'idartista',
            'nombre',
            'biografia',
            //'imagenArtista',
            [
                'attribute' => 'imagenArtista',
                'format' => 'html',
                'value' => function ($model) {
                    if($model -> imagenArtista)
                        return Html::img(Yii::getAlias('@web') . '/imgArtistas/' . $model->imagenArtista, ['style' => 'width: 200px']);
                    return null;
                }
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Artista $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idartista' => $model->idartista]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
