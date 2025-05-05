<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Usuario;

/** @var yii\web\View $this */
/** @var app\models\Playlist $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="playlist-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true,'placeholder' => 'Nombre de la Playlist', 'required'=>true]) ?>

    <?= $form->field($model, 'usuario_idusuario')->dropDownList(ArrayHelper :: map(Usuario :: find()-> select(['idusuario', 'nombre'])
                                                                                                    -> orderBy('nombre')
                                                                                                    -> asArray()
                                                                                                    -> all(), 'idusuario', 'nombre'), ['prompt'=> 'Seleccione un Usuario', 'required'=> true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
