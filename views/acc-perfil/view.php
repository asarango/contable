<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\AccPerfil */

$this->title = $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Perfiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="acc-perfil-view">

    <div class="row">
        <div class="col-lg-4 col-md-4"></div>
        <div class="col-lg-4 col-md-4">
            <div class="card shadow" style="padding: 20px;">
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
                        'id',
                        'codigo',
                        'nombre',
                    ],
                ])
                ?>


            </div>
        </div>
        <div class="col-lg-4 col-md-4"></div>
    </div>



</div>
