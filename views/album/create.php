<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Album $model */

$this->title = Yii::t('app', 'Create Album');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Albums'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="album-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
