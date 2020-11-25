<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\GenSubmenu */
/* @var $form yii\widgets\ActiveForm */

$user = Yii::$app->user->identity->usuario;
$now = date("Y-m-d H:i:s");
?>

<div class="gen-submenu-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    if ($model->isNewRecord) {
        echo $form->field($model, 'creado_por')->hiddenInput(['value' => $user])->label(false);
    } else {
        echo $form->field($model, 'creado_por')->hiddenInput(['maxlength' => true])->label(false);
    }
    ?>

    <?php
    if ($model->isNewRecord) {
        echo $form->field($model, 'creado_fecha')->hiddenInput(['value' => $now])->label(false);
    } else {
        echo $form->field($model, 'creado_fecha')->hiddenInput()->label(false);
    }
    ?>

    <?= $form->field($model, 'actualizado_por')->hiddenInput(['value' => $user])->label(false) ?>

    <?= $form->field($model, 'actualizado_fecha')->hiddenInput(['value' => $now])->label(false) ?>

    <?= $form->field($model, 'menu_id')->hiddenInput(['value' => $menu->id])->label(false) ?>

    <?= $form->field($model, 'codigo')->textInput(['maxlength' => true])->label('Acción') ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Grabar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
