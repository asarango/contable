<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\AccPermisos */

$this->title = $model->perfil_id;
$this->params['breadcrumbs'][] = ['label' => 'Acc Permisos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="acc-permisos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'perfil_id' => $model->perfil_id, 'submenu_id' => $model->submenu_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'perfil_id' => $model->perfil_id, 'submenu_id' => $model->submenu_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'perfil_id',
            'submenu_id',
        ],
    ]) ?>

</div>
