<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\AlbumSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="album-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'idalbum') ?>

    <?= $form->field($model, 'titulo') ?>

    <?= $form->field($model, 'fecha_lanzamiento') ?>

    <?= $form->field($model, 'portadaAlbum') ?>

    <?= $form->field($model, 'artista_idartista') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
