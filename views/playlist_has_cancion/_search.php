<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Playlist_Has_CancionSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="playlist--has--cancion-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'playlist_idplaylist') ?>

    <?= $form->field($model, 'playlist_usuario_idusuario') ?>

    <?= $form->field($model, 'cancion_idcancion') ?>

    <?= $form->field($model, 'cancion_album_idalbum') ?>

    <?= $form->field($model, 'cancion_album_artista_idartista') ?>

    <?php // echo $form->field($model, 'cancion_genero_idgenero') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
