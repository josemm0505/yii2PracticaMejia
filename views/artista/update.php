<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Artista $model */

$this->title = Yii::t('app', 'Update Artista: {name}', [
    'name' => $model->idartista,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Artistas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idartista, 'url' => ['view', 'idartista' => $model->idartista]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="artista-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
