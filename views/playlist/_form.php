<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Usuario;
use app\models\Cancion;

/** @var yii\web\View $this */
/** @var app\models\Playlist $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="playlist-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true,'placeholder' => 'Nombre de la Playlist', 'required'=>true]) ?>

    <?= $form->field($model, 'usuario_idusuario')->dropDownList(ArrayHelper :: map(Usuario :: find()-> select(['idusuario', 'username'])
                                                                                                    -> orderBy('username')
                                                                                                    -> asArray()
                                                                                                    -> all(), 'idusuario', 'username'), ['prompt'=> 'Seleccione un Usuario', 'required'=> true]) ?>

<div class="mb-3">
        <?= Html :: label ('Seleccione las canciones para la playlist', 'cancion-search', ['class'=>'form-label']) ?>
        <div class="input-group">
        <input type="text" id="cancion-search" placeholder="Buscar canciones... " class="form-control">
        <a href="<?= Yii :: $app -> urlManager -> createUrl(['cancion/create'])?>" class="btn btn-secondary">
            <i class="bi bi-plus"></i>
            Nueva Cancion </a>
        </div>

        <?= Html :: activeListBox ($model, 'canciones', ArrayHelper::map(Cancion::find()->orderBy(['titulo'=> SORT_ASC])->all(),
                                            'idcancion', function($cancion){
                                                return $cancion->titulo;
                                            }), ['multiple' => true, 'size' => 5, 'id'=>'canciones-select','class' => 'form-control mt-2']) ?>

    </div>    

<div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script>
document.querySelector("#cancion-search").addEventListener('input', function(){
    let canciones = document.querySelectorAll("#canciones-select option");
    canciones.forEach(cancion => {
        if(cancion.text.toLowerCase().includes(this.value.toLowerCase())){
            cancion.style.display = 'block';
        } else {
            cancion.style.display = 'none';
        }
    });
});
</script>
