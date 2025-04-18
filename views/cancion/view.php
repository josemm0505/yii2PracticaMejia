<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Cancion $model */

$this->title = $model->idcancion;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cancions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="cancion-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'idcancion' => $model->idcancion, 'album_idalbum' => $model->album_idalbum, 'album_artista_idartista' => $model->album_artista_idartista, 'genero_idgenero' => $model->genero_idgenero], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'idcancion' => $model->idcancion, 'album_idalbum' => $model->album_idalbum, 'album_artista_idartista' => $model->album_artista_idartista, 'genero_idgenero' => $model->genero_idgenero], [
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
            'idcancion',
            'titulo',
            'duracion',
            'album_idalbum',
            'album_artista_idartista',
            'genero_idgenero',
        ],
    ]) ?>

</div>
