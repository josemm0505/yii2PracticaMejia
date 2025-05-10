<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Artista;
use app\models\Cancion;

/** @var yii\web\View $this */
/** @var app\models\Album $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="album-form">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>

    <?php if($model->portadaAlbum): ?>
        <div class="form-group">
            <?= Html::label('Imagen Actual') ?>
            <div>
                <?= Html::img(Yii::getAlias('@web') . '/portadas/' . $model->portadaAlbum, ['style' => 'width: 200px']) ?>
            </div>
        </div>
    <?php endif; ?>


    <?= $form->field($model, 'imageFile')->fileInput()-> label("Seleccione Portada") ?>

    <?= $form->field($model, 'titulo')->textInput(['maxlength' => true, 'placeholder' => 'Titulo del Album', 'required'=>true]) ?>

    <?= $form->field($model, 'fecha_lanzamiento')->input('date') ?>

    <?= $form->field($model, 'artista_idartista')->dropDownList(ArrayHelper :: map(Artista :: find()-> select(['idartista', 'nombre'])
                                                                                                    -> orderBy('nombre')
                                                                                                    -> asArray()
                                                                                                    -> all(), 'idartista', 'nombre'), ['prompt'=> 'Seleccione un Artista', 'required'=> true]) 
    ?>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
