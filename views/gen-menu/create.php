<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\GenMenu */

$this->title = 'Crear Menú';
$this->params['breadcrumbs'][] = ['label' => 'Menús', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gen-menu-create" style="margin-left: 40px; margin-right: 40px">



    <div class="row">
        <div class="col-lg-4 col-md-4"></div>
        <div class="col-lg-4 col-md-4">
            <div class="card shadow" style="padding: 30px">
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
