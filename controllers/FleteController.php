<?php

namespace app\controllers;

use Yii;
use app\models\Flete;
use app\models\Segflete;
use app\models\SegfleteSearch;
use app\models\Lista;
use app\models\Distribucion;
use app\models\FleteSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FleteController implements the CRUD actions for Flete model.
 */
class FleteController extends Controller
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
     * Lists all Flete models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FleteSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Flete model.
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
     * Creates a new Flete model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Flete();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Flete model.
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
     * Deletes an existing Flete model.
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
     * Finds the Flete model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Flete the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Flete::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    #public function actionPinsaigsada($id = 1)
    public function actionPinsaigsada()
    {
        $id = 1;
        $modelLista = Lista::findOne($id);
        $modelFlete = Flete::findAll(['LISTA_ID'=>$id]);
        $modelDistribucion = Distribucion::findOne($modelLista->DISTRIBUCION_ID);
//$modelDistribucion->FE_REGISTRO = Yii::$app->formatter->asDate($modelDistribucion->FE_REGISTRO, 'Y-MM-dd');

        
        if ($modelLista->load(Yii::$app->request->post()) /*&& $modelFlete->load(Yii::$app->request->post()) && $modelDistribucion->load(Yii::$app->request->post())*/) {
            echo "<pre>";
            var_dump($_POST['Flete']);

            die;
            return $this->redirect(['view', 'id' => $model->ID]);
        } else {
           return $this->render('pinsaigsada', [
                'modelLista'=>$modelLista,
                'modelFlete'=>$modelFlete,
                'modelDistribucion'=>$modelDistribucion,
            ]);
        }
    }

        
	public function actionPesaje()
    {
        $id = 1;
        $modelLista = Lista::findOne($id);
		$modelDistribucion = Distribucion::findOne($modelLista->DISTRIBUCION_ID);
        $modelFlete = Flete::findAll(['LISTA_ID'=>$id]);		
        return $this->render('pesaje', [
                'modelLista'=>$modelLista,
                'modelFlete'=>$modelFlete,
                'modelDistribucion'=>$modelDistribucion,
				
            ]);
    }
}
