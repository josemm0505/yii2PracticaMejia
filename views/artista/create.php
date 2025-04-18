<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Artista $model */

$this->title = Yii::t('app', 'Create Artista');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Artistas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="artista-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
