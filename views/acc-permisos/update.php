<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AccPermisos */

$this->title = 'Update Acc Permisos: ' . $model->perfil_id;
$this->params['breadcrumbs'][] = ['label' => 'Acc Permisos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->perfil_id, 'url' => ['view', 'perfil_id' => $model->perfil_id, 'submenu_id' => $model->submenu_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="acc-permisos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
