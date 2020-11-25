<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\GenSubmenu */

$this->title = $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Menú', 'url' => ['/gen-menu/update', 'id' => $model->menu_id]];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="gen-submenu-view" style="margin-left: 40px; margin-right: 40px">

    <div class="row">

        <div class="col-lg-3 col-md-3"></div>
        <div class="col-lg-6 col-md-6">
            <div class="card shadow" style="padding: 20px">
                <h4><u><?= Html::encode($this->title) ?></u></h4>

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
                        'menu_id',
                        'id',
                        'codigo',
                        'nombre',
                    ],
                ])
                ?>
            </div>
        </div>
        <div class="col-lg-3 col-md-3"></div>




    </div>
</div>
