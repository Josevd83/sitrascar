<?php

namespace app\controllers;

use Yii;
use app\models\Flete;
use app\models\Segflete;
use app\models\SegfleteSearch;
use app\models\Lista;
use app\models\Distribucion;
use app\models\Carga;
use app\models\FleteSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kartik\widgets\Growl;
use yii\helpers\Html;
use kartik\mpdf\Pdf;

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

        
        if ($modelLista->load(Yii::$app->request->post())  && $modelDistribucion->load(Yii::$app->request->post())) {

            $fletes = Yii::$app->request->post("Flete");
            //echo "<pre>";
            //var_dump(Yii::$app->request->post("Flete"));
            //die;
            foreach ($fletes as $flete) {
                //$fecha = Yii::$app->formatter->asDate($model->FECHA_CREACION, 'Y-MM-dd');

                $actualizaFlete = Flete::findOne($flete['ID']);
                $actualizaFlete->GUIA_SADA = $flete['GUIA_SADA'];
                $actualizaFlete->FE_EMISION_GS = Yii::$app->formatter->asDate($flete['FE_EMISION_GS'], 'Y-MM-dd');
                $actualizaFlete->DIAS_VENCE_GS = $flete['DIAS_VENCE_GS'];
                $actualizaFlete->ORDEN_PESO_CARGA = $flete['ORDEN_PESO_CARGA'];
                $actualizaFlete->FE_EMISION_OPC = Yii::$app->formatter->asDate($flete['FE_EMISION_OPC'], 'Y-MM-dd');
                $actualizaFlete->save();
            }

	//var_dump($modelLista->ID);die;
	  $modelLista = Lista::findOne($modelLista->ID);
          $modelFlete = Flete::findAll(['LISTA_ID'=>$modelLista->ID]);
          $modelDistribucion = Distribucion::findOne($modelLista->DISTRIBUCION_ID);

	  Yii::$app->getSession()->setFlash('success', [
                'type' => Growl::TYPE_SUCCESS,
                'icon' => 'fa fa-users',
                'message' => Html::encode('Actualización realizada exitósamente'),
                'title' => Html::encode('Resultado'),
                'showSeparator' => true,
                    
          ]);

            //echo "<pre>";

            //var_dump($modelDistribucion);
            //var_dump(Yii::$app->request->post("Flete"));
            //var_dump($_POST['Flete']);

            //die;
            #return $this->redirect(['view', 'id' => $model->ID]);
            return $this->render('pinsaigsada', [
                'modelLista'=>$modelLista,
                'modelFlete'=>$modelFlete,
                'modelDistribucion'=>$modelDistribucion,
            ]);
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

  public function actionOrdencargacva()
  {
    //var_dump(Yii::$app->request->post());die;
    if (Yii::$app->request->post('flete')){
	$modelFlete = Flete::findOne(Yii::$app->request->post('flete'));
        $modelLista = Lista::findOne($modelFlete->LISTA_ID);
        $modelDistribucion = Distribucion::findOne($modelLista->DISTRIBUCION_ID);
	$modelCarga = Carga::findOne($modelDistribucion->CARGA_ID);
        //$modelFlete = Flete::findAll(['LISTA_ID'=>$modelLista->ID]);
        //$modelCarga = Carga::find();


        $imagen =  Html::img('@web/images/logo-sitrascar.png');
        $content = $this->renderPartial('orden_carga_cva',['modelLista'=>$modelLista, 'modelDistribucion'=>$modelDistribucion, 'modelFlete'=>$modelFlete, 'modelCarga'=>$modelCarga]);
        $pdf = new Pdf(['cssInline' => '.kv-heading-1{font-size:24px}']); // or new Pdf();
        $mpdf = $pdf->api; // fetches mpdf api
        $mpdf->SetHTMLHeader("<div class='encabezado'>$imagen GLOBAL FREIGHT, C.A.</div>");
        $mpdf->WriteHtml($content); // call mpdf write html
        echo $mpdf->Output('ordenGuiaSada', 'D');
        //return $pdf->render();
    }else{throw new NotFoundHttpException('Solicitud Inválida.');}
    
  }
}
