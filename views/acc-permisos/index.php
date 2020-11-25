<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AccPermisosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Accesos ' . $profile->nombre;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="acc-permisos-index" style="margin-left: 40px; margin-right: 40px">


    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="card shadow" style="padding: 20px">
                <h4><u>ASIGNADOS</u></h4>
                <ul>
                    <?php
                    foreach ($assigned as $assi) {
                        ?>
                        <li><strong><?= $assi['menu_icon'] . ' ' . $assi['menu_name'] ?></strong></li>
                        <ul>
                            <?php
                            foreach ($assi['submenu'] as $sub) {
                                ?>
                            <li>&nbsp;&nbsp;
                                <?= Html::a($sub['nombre'],['to-assign','profile_id' => $profile->id, 'submenu_id' => $sub['id'], 'action' => 'remove']) ?>
                            </li>
                            <?php
                            }
                            echo '</ul>';
                        }
                        ?>

                    </ul>
            </div>
        </div>


        <div class="col-lg-6 col-md-6">
            <div class="card shadow" style="padding: 20px">
                <h4><u>NO ASIGNADOS</u></h4>
                <ul>
                    <?php
                    foreach ($noAssigned as $assi) {
                        ?>
                        <li><strong><?= $assi['menu_icon'] . ' ' . $assi['menu_name'] ?></strong></li>
                        <ul>
                            <?php
                            foreach ($assi['submenu'] as $sub) {
                                ?>
                            <li>&nbsp;&nbsp;
                                <?= Html::a($sub['nombre'],['to-assign','profile_id' => $profile->id, 'submenu_id' => $sub['id'],'action' => 'put']) ?>
                            </li>
                            <?php
                            }
                            echo '</ul>';
                        }
                        ?>

                    </ul>
            </div>
        </div>
    </div>

</div>
