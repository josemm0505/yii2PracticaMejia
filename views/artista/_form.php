<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Artista $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="artista-form">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>

    <?php if($model->imagenArtista): ?>
        <div class="form-group">
            <?= Html::label('Imagen Actual') ?>
            <div>
                <?= Html::img(Yii::getAlias('@web') . '/imgArtistas/' . $model->imagenArtista, ['style' => 'width: 200px']) ?>
            </div>
        </div>
    <?php endif; ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true,'placeholder' => 'Nombre del Artista', 'required'=>true]) ?>

    <?= $form->field($model, 'biografia')->textarea(['maxlength' => 2000,'placeholder' => 'Biografía del Artista', 'required'=>true]) ?>

    <?= $form->field($model, 'imageFile')->fileInput()->label("Seleccione una Imagen") ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
