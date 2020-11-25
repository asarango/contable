<?php

namespace app\controllers;

use Yii;
use app\models\GenSubmenu;
use app\models\GenSubmenuSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * GenSubmenuController implements the CRUD actions for GenSubmenu model.
 */
class GenSubmenuController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all GenSubmenu models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GenSubmenuSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single GenSubmenu model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new GenSubmenu model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($menu_id)
    {
        
        $menu = \app\models\GenMenu::findOne($menu_id);
        
        
        $model = new GenSubmenu();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/gen-menu/update', 'id' => $menu->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'menu' => $menu
        ]);
    }

    /**
     * Updates an existing GenSubmenu model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        
        $menu = \app\models\GenMenu::findOne($model->menu_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/gen-menu/update', 'id' => $menu->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'menu' => $menu
        ]);
    }

    /**
     * Deletes an existing GenSubmenu model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the GenSubmenu model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return GenSubmenu the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = GenSubmenu::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
