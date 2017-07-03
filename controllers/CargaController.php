<?php

namespace app\controllers;

use Yii;
use app\models\Carga;
use app\models\Buque;
use app\models\CargaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Expression;

/**
 * CargaController implements the CRUD actions for Carga model.
 */
class CargaController extends Controller
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
     * Lists all Carga models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CargaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Carga model.
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
     * Creates a new Carga model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Carga();

        if ($model->load(Yii::$app->request->post())) {
            //$model->FECHA_REGISTRO = 'curdate()';
            $date = date('Y-m-d');
            //var_dump($date);die;
            $model->FECHA_REGISTRO = $date;
            $model->ESTATUS_CARGA = 1;
            
            $modelBuque = Buque::findOne(['ID'=>$model->BUQUE_ID]);
 
            $model->DESCRIPCION = $modelBuque->NOMBRE.' - '.$model->FECHA_ATRAQUE;
                    
            //var_dump($model->FECHA_REGISTRO);die;

            $model->save();
            
            return $this->redirect(['view', 'id' => $model->ID]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Carga model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) ) {
            $modelBuque = Buque::findOne(['ID'=>$model->BUQUE_ID]);
            $model->DESCRIPCION = $modelBuque->NOMBRE.' / '.$model->FECHA_ATRAQUE;
            $model->save();
            return $this->redirect(['view', 'id' => $model->ID]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Carga model.
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
     * Finds the Carga model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Carga the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Carga::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
