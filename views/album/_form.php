<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Album $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="album-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'titulo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fecha_lanzamiento')->textInput() ?>

    <?= $form->field($model, 'portadaAlbum')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'artista_idartista')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
