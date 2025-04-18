<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Playlist_Has_Cancion $model */

$this->title = Yii::t('app', 'Create Playlist Has Cancion');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Playlist Has Cancions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="playlist--has--cancion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
