<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AccPermisos */

$this->title = 'Create Acc Permisos';
$this->params['breadcrumbs'][] = ['label' => 'Acc Permisos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="acc-permisos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
