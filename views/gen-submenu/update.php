<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\GenSubmenu */

$this->title = 'Update Gen Submenu: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Gen Submenus', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="gen-submenu-update" style="margin-left: 40px; margin-left: 40px">

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
