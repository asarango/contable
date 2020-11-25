<?php
/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\bootstrap4\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
        <link rel="stylesheet" href="css/myStyle.css">

        <?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>



    </head>
    <body class="bodyFondo">
        <?php $this->beginBody() ?>


        <header class="fixed-top">
            <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #FFF">
                <a class="navbar-brand" href="#">Contable.xyz</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#principalHeader" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="principalHeader">
                    <ul class="navbar-nav mr-auto">

                    </ul>
                    <div class="form-inline my-2 my-lg-0">
                        <?php
                        if (Yii::$app->user->isGuest) {
                            echo Html::a('Iniciar sesión', ['/site/login'], ['class' => 'btn btn-outline-primary']);
                        } else {
                            echo Html::a('Salir (' . Yii::$app->user->identity->usuario . ')', ['/site/logout'],
                                    ['class' => 'btn btn-outline-danger', 'data' => ['method' => 'post']]);
                        }
                        ?>
                    </div>
                </div>
            </nav>         

            <?php
            if (!Yii::$app->user->isGuest) {
                $usuario = \app\models\AccUsuario::findOne(\Yii::$app->user->identity->usuario);
                $menusClass = new \app\models\GenMenu();
                $menus = $menusClass->consulta_menu_perfil($usuario->perfil_id);
                ?>
                <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #FFF; font-size: 10px" >

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="menu">
                        <ul class="navbar-nav mr-auto">
                             <li class="nav-item">                                    
                                    <?= Html::a('INICIO', ['/site/index'], ['class' => 'nav-link']) ?>
                             </li>
                            <?php
                            foreach ($menus as $menu) {
                                ?>
                                <li class="nav-item">                                    
                                    <?= Html::a($menu['nombre'], [$menu['ruta_menu']], ['class' => 'nav-link']) ?>
                                </li>
                                <?php
                            }
                            ?>
                        </ul>

                    </div>
                </nav>
                <?php
            }
            ?>
            <hr class="m-0 hrShadow">

        </header>





            <?php
                if (!Yii::$app->user->isGuest) {
                    ?>
                     <div class="" style="margin-top: 120px">
                         <?php
                }else{
                    ?>
            <div class="" style="margin-top: 80px;">
            <?php
                }
            ?>
            
                <?=
                Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ])
                ?>
                <?= Alert::widget() ?>
                <?= $content ?>
            </div>
 

        <footer class="footer">
            <div class="container">
                <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

                <p class="pull-right"><?= Yii::powered() ?></p>
            </div>
        </footer>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
