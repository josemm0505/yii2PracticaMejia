<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\CancionSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="cancion-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'idcancion') ?>

    <?= $form->field($model, 'titulo') ?>

    <?= $form->field($model, 'duracion') ?>

    <?= $form->field($model, 'album_idalbum') ?>

    <?= $form->field($model, 'album_artista_idartista') ?>

    <?php // echo $form->field($model, 'genero_idgenero') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
