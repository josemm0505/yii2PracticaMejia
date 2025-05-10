<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\PlaylistSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="playlist-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'idplaylist') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'usuario_idusuario') ?>

    <?= $form->field($model, 'createAt') ?>

    <?= $form->field($model, 'updateAt') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
