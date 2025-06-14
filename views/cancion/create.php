<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Cancion $model */

$this->title = Yii::t('app', 'Create Cancion');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cancions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cancion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
