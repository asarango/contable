<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\GenMenu */

$this->title = $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Menús', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="gen-menu-view" style="margin-left: 40px; margin-right: 40px">

    <div class="row">
        <div class="col-lg-3 col-md-3"></div>
        <div class="col-lg-6 col-md-6">
            <div class="card shadow" style="padding: 20px">
                <h1><?= Html::encode($this->title) ?></h1>

                <p>
                    <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                    <?php
//                    Html::a('Delete', ['delete', 'id' => $model->id], [
//                        'class' => 'btn btn-danger',
//                        'data' => [
//                            'confirm' => 'Are you sure you want to delete this item?',
//                            'method' => 'post',
//                        ],
//                    ])
                    ?>
                </p>

                <?=
                DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'creado_por',
                        'creado_fecha',
                        'actualizado_por',
                        'actualizado_fecha',
                        'id',
                        'codigo',
                        'nombre',
                        'icono',
                        'ruta_menu',
                    ],
                ])
                ?>
            </div>
        </div>
        <div class="col-lg-3 col-md-3"></div>
    </div>



</div>
