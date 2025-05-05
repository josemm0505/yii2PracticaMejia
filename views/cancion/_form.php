<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Album;
use app\models\Artista;
use  app\models\Genero;

/** @var yii\web\View $this */
/** @var app\models\Cancion $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="cancion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'titulo')->textInput(['maxlength' => true,'placeholder' => 'Nombre de la Cancion', 'required'=>true]) ?>

    <?= $form->field($model, 'duracion')->input('text') 
                                        -> textInput(['placeholder'=>'00:00:00', 'pattern'=>'^([0-1]?[0-9]|2[0-3]):[0-5][0-9]:[0-5][0-9]$', 'title' => 'Formato Requerido: HH:MM:SS', 'required'=>true])?>

    <?= $form->field($model, 'album_idalbum')->dropDownList(ArrayHelper :: map(Album :: find()-> select(['idalbum', 'titulo'])
                                                                                                    -> orderBy('titulo')
                                                                                                    -> asArray()
                                                                                                    -> all(), 'idalbum', 'titulo'), ['prompt'=> 'Seleccione un Album', 'required'=> true]) ?>

    <?= $form->field($model, 'album_artista_idartista')->dropDownList(ArrayHelper :: map(Artista :: find()-> select(['idartista', 'nombre'])
                                                                                                    -> orderBy('nombre')
                                                                                                    -> asArray()
                                                                                                    -> all(), 'idartista', 'nombre'), ['prompt'=> 'Seleccione un Artista', 'required'=> true]) ?>

    <?= $form->field($model, 'genero_idgenero')->dropDownList(ArrayHelper :: map(Genero :: find()-> select(['idgenero', 'nombre'])
                                                                                                    -> orderBy('nombre')
                                                                                                    -> asArray()
                                                                                                    -> all(), 'idgenero', 'nombre'), ['prompt'=> 'Seleccione un Genero', 'required'=> true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
