<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AccUsuarioSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="acc-usuario-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'creado_por') ?>

    <?= $form->field($model, 'creado_fecha') ?>

    <?= $form->field($model, 'actualizado_por') ?>

    <?= $form->field($model, 'actualizado_fecha') ?>

    <?= $form->field($model, 'perfil_id') ?>

    <?php // echo $form->field($model, 'dni') ?>

    <?php // echo $form->field($model, 'titulo') ?>

    <?php // echo $form->field($model, 'apellidos') ?>

    <?php // echo $form->field($model, 'nombres') ?>

    <?php // echo $form->field($model, 'usuario') ?>

    <?php // echo $form->field($model, 'clave') ?>

    <?php // echo $form->field($model, 'cambia_clave')->checkbox() ?>

    <?php // echo $form->field($model, 'estado')->checkbox() ?>

    <?php // echo $form->field($model, 'token') ?>

    <?php // echo $form->field($model, 'es_interno')->checkbox() ?>

    <?php // echo $form->field($model, 'auth_key') ?>

    <?php // echo $form->field($model, 'ruta_menu') ?>

    <?php // echo $form->field($model, 'nickname') ?>

    <?php // echo $form->field($model, 'foto') ?>

    <?php // echo $form->field($model, 'direccion') ?>

    <?php // echo $form->field($model, 'telefono') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
