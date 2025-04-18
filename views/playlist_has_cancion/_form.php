<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Playlist_Has_Cancion $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="playlist--has--cancion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'playlist_idplaylist')->textInput() ?>

    <?= $form->field($model, 'playlist_usuario_idusuario')->textInput() ?>

    <?= $form->field($model, 'cancion_idcancion')->textInput() ?>

    <?= $form->field($model, 'cancion_album_idalbum')->textInput() ?>

    <?= $form->field($model, 'cancion_album_artista_idartista')->textInput() ?>

    <?= $form->field($model, 'cancion_genero_idgenero')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
