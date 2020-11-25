<?php

namespace app\controllers;

use Yii;
use app\models\AccPermisos;
use app\models\AccPermisosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AccPermisosController implements the CRUD actions for AccPermisos model.
 */
class AccPermisosController extends Controller
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
     * Lists all AccPermisos models.
     * @return mixed
     */
    public function actionIndex($id)
    {
        $profile = \app\models\AccPerfil::findOne($id);
        
        $menus = \app\models\GenMenu::find()->orderBy('nombre')->all();
        $noAssigned = $this->no_assigned($menus, $profile->id);
        $assigned = $this->assigned($menus, $profile->id);
        
        return $this->render('index', [
            'profile' => $profile,
            'noAssigned' => $noAssigned,
            'assigned' => $assigned
        ]);
    }
    
    
    private function no_assigned($menus, $profileId){
        $arrayNoAssigned = array();
        
        foreach ($menus as $menu){
            
            $submenu = $this->query_no_assigned($profileId, $menu->id); 
            
            array_push($arrayNoAssigned, array(
                'menu_id' => $menu->id,
                'menu_name' => $menu->nombre,
                'menu_icon' => $menu->icono,
                'submenu' => $submenu
            ));
        }
        
        return $arrayNoAssigned;
    }
    
    private function query_no_assigned($profileId, $menuId){
        $con = Yii::$app->db;
        $query = "select 	s.id 
                                    ,s.nombre 
                    from	gen_submenu s
                    where	s.menu_id = $menuId
                                    and s.id not in (select submenu_id from acc_permisos where perfil_id = $profileId);";
        $res = $con->createCommand($query)->queryAll();
        return $res;
    }
    
    
    private function assigned($menus, $profileId){
        $arrayNoAssigned = array();
        
        foreach ($menus as $menu){
            
            $submenu = $this->query_assigned($profileId, $menu->id); 
            
            array_push($arrayNoAssigned, array(
                'menu_id' => $menu->id,
                'menu_name' => $menu->nombre,
                'menu_icon' => $menu->icono,
                'submenu' => $submenu
            ));
        }
        
        return $arrayNoAssigned;
    }
    
    private function query_assigned($profileId, $menuId){
        $con = Yii::$app->db;
        $query = "select 	s.id 
                                    ,s.nombre 
                    from	gen_submenu s
                    where	s.menu_id = $menuId
                                    and s.id in (select submenu_id from acc_permisos where perfil_id = $profileId);";
        $res = $con->createCommand($query)->queryAll();
        return $res;
    }

    /**
     * Displays a single AccPermisos model.
     * @param integer $perfil_id
     * @param integer $submenu_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($perfil_id, $submenu_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($perfil_id, $submenu_id),
        ]);
    }

    /**
     * Creates a new AccPermisos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AccPermisos();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'perfil_id' => $model->perfil_id, 'submenu_id' => $model->submenu_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing AccPermisos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $perfil_id
     * @param integer $submenu_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($perfil_id, $submenu_id)
    {
        $model = $this->findModel($perfil_id, $submenu_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'perfil_id' => $model->perfil_id, 'submenu_id' => $model->submenu_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing AccPermisos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $perfil_id
     * @param integer $submenu_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($perfil_id, $submenu_id)
    {
        $this->findModel($perfil_id, $submenu_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AccPermisos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $perfil_id
     * @param integer $submenu_id
     * @return AccPermisos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($perfil_id, $submenu_id)
    {
        if (($model = AccPermisos::findOne(['perfil_id' => $perfil_id, 'submenu_id' => $submenu_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    
    public function actionToAssign(){
        //print_r($_GET);
        $profileId = $_GET['profile_id'];
        $submenuId = $_GET['submenu_id'];
        $action = $_GET['action'];
        
        if($action == 'put'){
            $access = new AccPermisos();
            $access->perfil_id = $profileId;
            $access->submenu_id = $submenuId;
            $access->save();
        }else{
            $access = \app\models\AccPermisos::find()->where([
                'perfil_id' => $profileId,
                'submenu_id' => $submenuId
            ])->one();
            
            $access->delete();
        }
        
        return $this->redirect(['index','id' => $profileId]);
        
    }
}
