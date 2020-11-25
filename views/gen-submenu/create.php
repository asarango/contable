<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\GenSubmenu */

$this->title = 'Crear Submenu';
$this->params['breadcrumbs'][] = ['label' => 'Menú', 'url' => ['/gen-menu/update', 'id' => $menu->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gen-submenu-create" style="margin-left: 40px; margin-right: 40px">

    <div class="row">
        <div class="col-lg-4 col-md-4"></div>
        <div class="col-lg-4 col-md-4">
            <div class="card shadow" style="padding: 20px">
                <h4><u><?= Html::encode($this->title) ?></u></h4>

                <?=
                $this->render('_form', [
                    'model' => $model,
                    'menu' => $menu
                ])
                ?>
            </div>
        </div>
        <div class="col-lg-4 col-md-4"></div>
    </div>



</div>
