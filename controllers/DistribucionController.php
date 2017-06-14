<?php

namespace app\controllers;

use Yii;
use app\models\Distribucion;
use app\models\Centrales;
use app\models\Carga;
use app\models\DistribucionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\web\Response;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/**
 * DistribucionController implements the CRUD actions for Distribucion model.
 */
class DistribucionController extends Controller
{
    /**
     * @inheritdoc
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
     * Lists all Distribucion models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DistribucionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Distribucion model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Distribucion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Distribucion();
        
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ActiveForm::validate($model);
        }

        //if ($model->load(Yii::$app->request->post()) && $model->save()) {
        if ($model->load(Yii::$app->request->post())) {
            $cantidadAsignada = $model->CANTIDAD;
            $modelCarga = Carga::findOne(['ID'=>$model->CARGA_ID]);
            $sumaCarga = $modelCarga->PESO_DISTRIBUIDO+$cantidadAsignada;
            $modelCarga->PESO_DISTRIBUIDO=$sumaCarga;
            if($modelCarga->save()){
                $model->save();
            }
            return $this->redirect(['view', 'id' => $model->ID]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Distribucion model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Distribucion model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Distribucion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Distribucion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Distribucion::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionGetdistribucioncentrales() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $cat_id = $parents[0];
                #$out = self::getSubCatList($cat_id);
                
                $subQuery = (new \yii\db\Query())->select('centrales.id')->from('distribucion, centrales')->where('centrales.ID=distribucion.CENTRALES_ID and distribucion.CARGA_ID='.$cat_id);
                
                $out = Centrales::find()->select(['centrales.ID as id','centrales.NOMBRE as name'])->where(['not in','ID',$subQuery])->asArray()->all();
                
               
                
                
                // SELECT * FROM (SELECT `id` FROM `user` WHERE status=1) u 
               //$query->from(['centrales c' => $subQuery]);
                //$query = (new \yii\db\Query())"select * from centrales c where c.ID NOT IN (select d.ID from distribucion d, centrales a where a.ID=d.CENTRALES_ID and d.ID=1 )";
                //$out = Distribucion::find(['CENTRALES_ID'=>$cat_id])->select(['ID as id','OBSERVACIONES as name'])->asArray()->all(); 
                //$out = ArrayHelper::map(Distribucion::find()->all(), 'ID', 'OBSERVACIONES'); 
                //$out = Distribucion::findAll(['CENTRALES_ID'=>$cat_id])->select(['ID','OBSERVACIONES'])->asArray(); 
                /*echo "<pre>";
                var_dump($out);die;*/
                // the getSubCatList function will query the database based on the
                // cat_id and return an array like below:
                // [
                //    ['id'=>'<sub-cat-id-1>', 'name'=>'<sub-cat-name1>'],
                //    ['id'=>'<sub-cat_id_2>', 'name'=>'<sub-cat-name2>']
                // ]
                echo Json::encode(['output'=>$out, 'selected'=>'']);
                return;
            }
        }
        echo Json::encode(['output'=>'', 'selected'=>'']);
    }
}
