<?php

namespace app\controllers;

use Yii;
use app\models\Pagos;
use app\models\Flete;
use app\models\Tarifas;
use app\models\Conceptos;
use app\models\PagosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Expression;

/**
 * PagosController implements the CRUD actions for Pagos model.
 */
class PagosController extends Controller
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
     * Lists all Pagos models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PagosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pagos model.
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
     * Creates a new Pagos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Pagos();
        //$modelLista = ;
        $idFlete = 1;

        $modelFlete = Flete::findOne($idFlete);

        $modelConceptos = Conceptos::find()->joinWith('tarifas')->where(['tarifas.CENTRALES_ID' => $modelFlete->lISTA->dISTRIBUCION->cENTRALES->ID])->all();

        //var_dump($modelFlete->eMPRESACHOFER->cHOFER->CEDULA);die;
        //var_dump($modelConceptos);die;
        //if ($model->load(Yii::$app->request->post()) && $model->save()) {
	if ($model->load(Yii::$app->request->post()) && $modelFlete->load(Yii::$app->request->post())) {
	//$formulario = Yii::$app->request->post();
	//var_dump($formulario);die;
	//foreach($model as $mod){var_dump($mod);}die;
		/*if($model->save()){
			return $this->redirect(['view', 'id' => $model->ID]);
		}*/
	foreach($model->CONCEPTOS_ID as $pago){
        $monto = Tarifas::findOne(['CONCEPTOS_ID'=>$pago])->MONTO;
//        var_dump($pago);die;
		$modelPago = new Pagos();
		$modelPago->CONCEPTOS_ID = $pago;
		$modelPago->MONTO = $monto;
        $modelPago->FLETE_ID = $modelFlete->ID;
        $modelPago->ESTATUS_PAGO = 1;
		$modelPago->FE_REGISTRO = new Expression('now()');
        $modelPago->save(false);
		//var_dump($pago)."<hr>";
		//var_dump($modelPago);
        //echo "<hr>";
	}
//die;
	//echo "<pre>";var_dump($model->CONCEPTOS_ID);die;
            return $this->redirect(['view', 'id' => $modelPago->ID]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'modelFlete' => $modelFlete,
                'modelConceptos' => $modelConceptos,
            ]);
        }
    }

    /**
     * Updates an existing Pagos model.
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
     * Deletes an existing Pagos model.
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
     * Finds the Pagos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Pagos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pagos::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
