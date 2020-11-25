<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\AccUsuario */

$this->title = $model->usuario;
$this->params['breadcrumbs'][] = ['label' => 'Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="acc-usuario-view">

    <div class="row">
        <div class="col-lg-4 col-md-4"></div>
        <div class="col-lg-4 col-md-4">
            <div class="card shadow" style="padding: 20px">
                <h4><u><?= Html::encode($this->title) ?></u></h4>

                <p>
                    <?= Html::a('Actualizar', ['update', 'id' => $model->usuario], ['class' => 'btn btn-primary']) ?>
                    <?php
//                    Html::a('Delete', ['delete', 'id' => $model->usuario], [
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
                        'perfil_id',
                        'dni',
                        'titulo',
                        'apellidos',
                        'nombres',
                        'usuario',
                        'clave',
                        'cambia_clave:boolean',
                        'estado:boolean',
                        'token',
                        'es_interno:boolean',
                        'auth_key',
                        'ruta_menu',
                        'nickname',
                        'foto',
                        'direccion',
                        'telefono',
                    ],
                ])
                ?>
            </div>
        </div>
        <div class="col-lg-4 col-md-4"></div>
    </div>




</div>
