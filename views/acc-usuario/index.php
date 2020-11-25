<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AccUsuarioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usuarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="acc-usuario-index" style="margin-left: 40px; margin-right: 40px">
    
    <div class="card shadow" style="padding: 20px">
        <h4><u><?= Html::encode($this->title) ?></u></h4>

    <p>
        <?= Html::a('<i class="fas fa-folder-plus"></i> Nuevo', ['create'], ['class' => 'btn btn-outline-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'creado_por',
//            'creado_fecha',
//            'actualizado_por',
//            'actualizado_fecha',
            'perfil_id',
            //'dni',
            //'titulo',
            'apellidos',
            'nombres',
            'usuario',
            //'clave',
            //'cambia_clave:boolean',
            //'estado:boolean',
            //'token',
            //'es_interno:boolean',
            //'auth_key',
            //'ruta_menu',
            'nickname',
            //'foto',
            //'direccion',
            //'telefono',

            /** INICIO BOTONES DE ACCION * */
                [
                    'class' => 'yii\grid\ActionColumn',
//                    'dropdown' => false,
//                    'width' => '150px',
//                    'vAlign' => 'middle',
                    'template' => '{view} {update}',
                    'buttons' => [
                        'view' => function($url, $model) {
                            return Html::a('<i class="fas fa-eye"></i>', $url, [
                                        'title' => 'Visualizar', 'data-toggle' => 'tooltip', 'role' => 'modal-remote', 'data-pjax' => "0", 'class' => 'hand'
                            ]);
                        },
                        'update' => function($url, $model) {
                            return Html::a('<i class="fas fa-highlighter"></i>', $url, [
                                        'title' => 'Actualizar', 'data-toggle' => 'tooltip', 'role' => 'modal-remote', 'data-pjax' => "0", 'class' => 'hand'
                            ]);
                        }
                    ],
                    'urlCreator' => function($action, $model, $key) {
                        if ($action === 'view') {
                            return \yii\helpers\Url::to(['view', 'id' => $key]);
                        } else if ($action === 'update') {
                            return \yii\helpers\Url::to(['update', 'id' => $key]);
                        }
                    }
                ],
            /** FIN BOTONES DE ACCION * */
        ],
    ]); ?>
    </div>
</div>
