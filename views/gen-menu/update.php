<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\GenMenu */

$this->title = 'Editar Menú: ' . $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Gen Menus', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Editando';
?>
<div class="gen-menu-update" style="margin-left: 40px; margin-right: 40px">


    <div class="row">
        <div class="col-lg-4 col-md-4">
            <div class="card shadow" style="padding: 20px">
                <h4><?= Html::encode($this->title) ?></h4>

                <?=
                $this->render('_form', [
                    'model' => $model,
                ])
                ?>
            </div>
        </div>
        <div class="col-lg-8 col-md-4">
            <div class="card shadow" style="padding: 20px;">
                <h4><u>Acciones del menú <?= $model->nombre ?></u></h4>
                <p>
                 <?= Html::a('<i class="fas fa-folder-plus"></i> Nuevo', 
                         ['/gen-submenu/create', 'menu_id' => $model->id], 
                         ['class' => 'btn btn-outline-success']) ?>
                </p>
                <?=
                GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        'codigo',
                        'nombre',
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
                                    return \yii\helpers\Url::to(['/gen-submenu/view', 'id' => $key]);
                                } else if ($action === 'update') {
                                    return \yii\helpers\Url::to(['/gen-submenu/update', 'id' => $key]);
                                }
                            }
                        ],
                    /** FIN BOTONES DE ACCION * */
                    ],
                ]);
                ?>
            </div>
        </div>
    </div>




</div>
