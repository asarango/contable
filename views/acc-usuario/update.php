<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AccUsuario */

$this->title = 'Actualizar Usuario: ' . $model->usuario;
$this->params['breadcrumbs'][] = ['label' => 'Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->usuario, 'url' => ['view', 'id' => $model->usuario]];
$this->params['breadcrumbs'][] = 'Editando';
?>
<div class="acc-usuario-update">


    <div class="row">
        <div class="col-lg-4 col-md-4"></div>
        <div class="col-lg-4 col-md-4">
            <div class="card shadow" style="padding: 20px">
                <h4><u><?= Html::encode($this->title) ?></u></h4>

                <?=
                $this->render('_form', [
                    'model' => $model,
                    'modelProfiles' => $modelProfiles
                ])
                ?>

            </div>
        </div>
        <div class="col-lg-4 col-md-4"></div>
    </div>



</div>
