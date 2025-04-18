<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Album $model */

$this->title = Yii::t('app', 'Update Album: {name}', [
    'name' => $model->idalbum,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Albums'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idalbum, 'url' => ['view', 'idalbum' => $model->idalbum, 'artista_idartista' => $model->artista_idartista]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="album-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
