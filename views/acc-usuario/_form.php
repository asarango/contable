<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;
use buibr\select2\Select2Widget;

/* @var $this yii\web\View */
/* @var $model app\models\AccUsuario */
/* @var $form yii\widgets\ActiveForm */

$user = Yii::$app->user->identity->usuario;
$now = date("Y-m-d H:i:s");
?>

<div class="acc-usuario-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php 
        if($model->isNewRecord){
            echo $form->field($model, 'creado_por')->hiddenInput(['value' => $user])->label(false);
        }else{
            echo $form->field($model, 'creado_por')->hiddenInput(['maxlength' => true])->label(false);
        }
    ?>

    <?php 
    if($model->isNewRecord){
        echo $form->field($model, 'creado_fecha')->hiddenInput(['value' => $now])->label(false);
    }else{
        echo $form->field($model, 'creado_fecha')->hiddenInput()->label(false);
    }
    ?>

    <?= $form->field($model, 'actualizado_por')->hiddenInput(['value' => $user])->label(false) ?>

    <?= $form->field($model, 'actualizado_fecha')->hiddenInput(['value' => $now])->label(false) ?>

    <?php
    $data = ArrayHelper::map($modelProfiles, 'id', 'nombre');
    echo $form->field($model, 'perfil_id')->widget(
            Select2Widget::className(),
            [
                'items' => $data
            ]
    );
    ?>

    <?= $form->field($model, 'dni')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'titulo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'apellidos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nombres')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'usuario')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'clave')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cambia_clave')->checkbox() ?>

    <?= $form->field($model, 'estado')->checkbox() ?>


    <?= $form->field($model, 'nickname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'direccion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telefono')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Grabar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
