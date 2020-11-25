<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AccPerfil */

$this->title = 'Actualizar Perfil: ' . $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Perfiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="acc-perfil-update">

    <div class="row">
        <div class="col-lg-4 col-md-4"></div>
        <div class="col-lg-4 col-md-4">
            <div class="card shadow" style="padding: 20px;">

                <h4><u><?= Html::encode($this->title) ?></u></h4>

                <?=
                $this->render('_form', [
                    'model' => $model,
                ])
                ?>

            </div>
        </div>
        <div class="col-lg-4 col-md-4"></div>
    </div>

</div>
