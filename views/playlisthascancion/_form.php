<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\PlaylistHasCancion $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="playlist-has-cancion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'playlist_idplaylist')->textInput() ?>

    <?= $form->field($model, 'cancion_idcancion')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
