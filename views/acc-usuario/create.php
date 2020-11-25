<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AccUsuario */

$this->title = 'Crear Usuario';
$this->params['breadcrumbs'][] = ['label' => 'Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="acc-usuario-create">

    <div class="row">
        <div class="col-lg-3 col-md-3"></div>
        <div class="col-lg-6 col-md-6">

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
        <div class="col-lg-3 col-md-3"></div>
    </div>
</div>
