<?php

namespace app\controllers;

use Yii;
use app\models\Lista;
use app\models\ListaSearch;
use app\models\Distribucion;
use app\models\Flete;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\web\Response;
use yii\helpers\ArrayHelper;


/**
 * ListaController implements the CRUD actions for Lista model.
 */
class ListaController extends Controller
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
     * Lists all Lista models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ListaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Lista model.
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
     * Creates a new Lista model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Lista();
        $modelFlete = new Flete();
        $modelDistribucion = new Distribucion();
        $items = Lista::getChoferesDisponibles();

        /*if ($model->load(Yii::$app->request->post())){
            var_dump(Yii::$app->request->post());
            die;
            
        }*/

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'modelFlete' => $modelFlete,
                'modelDistribucion' => $modelDistribucion,
                'items'=>$items
            ]);
        }
    }

    /**
     * Updates an existing Lista model.
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
     * Deletes an existing Lista model.
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
     * Finds the Lista model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Lista the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Lista::findOne($id)) !== null) {
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
            $out = Distribucion::find(['CENTRALES_ID'=>$cat_id])->select(['ID as id','OBSERVACIONES as name'])->asArray()->all(); 
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