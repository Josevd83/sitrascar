<?php

namespace app\controllers;

use Yii;
use app\models\Chofer;
use app\models\Empresa;
use app\models\Empresachofer;
use app\models\ChoferSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kartik\mpdf\Pdf;
use app\models\FormUpload;
use yii\web\UploadedFile;
use yii\web\Response;
use yii\helpers\Html;
use kartik\widgets\Growl;
/**
 * ChoferController implements the CRUD actions for Chofer model.
 */
class ChoferController extends Controller
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
     * Lists all Chofer models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ChoferSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Chofer model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = Chofer::findOne($id);
        $modelEmpresachofer = Empresachofer::findOne([$model->ID]);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'modelEmpresachofer' => $modelEmpresachofer
        ]);
    }

    /**
     * Creates a new Chofer model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        /*$model = new Chofer();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }*/
        $model = new Chofer();
        $modelEmpresachofer = new Empresachofer();

        if ($model->load(Yii::$app->request->post()) && $modelEmpresachofer->load(Yii::$app->request->post())) {
            $model->file = UploadedFile::getInstance($model, 'file');
            $model->file2 = UploadedFile::getInstance($model, 'file2');
            $model->file3 = UploadedFile::getInstance($model, 'file3');
            //$file = $model->file;
            if(!empty($model->file)) {
            $model->file->saveAs('certificados/' .$model->CEDULA . '.' . $model->file->extension);
            $model->IMG_CERTIFICADO = 'certificados/' .$model->CEDULA . '.' . $model->file->extension;
            }
           if(!empty($model->file2)) {
            $model->file2->saveAs('cedulas/' .$model->CEDULA. '.' . $model->file2->extension);
            $model->IMG_CEDULA = 'cedulas/' .$model->CEDULA . '.' . $model->file2->extension;
            }
            if(!empty($model->file3)) {
            $model->file3->saveAs('licencias/' .$model->CEDULA . '.' . $model->file3->extension);
            $model->IMG_LICENCIA = 'licencias/' .$model->CEDULA . '.' . $model->file3->extension;
            }
            //var_dump($mode
            //l);die;
            //if($model->save()){
                $model->save(false);
                //var_dump($model->ID);die;
                $modelEmpresachofer->CHOFER_ID = $model->ID;
                //var_dump($modelEmpresachofer->EMPRESA_ID);die;
                $modelEmpresachofer->EMPRESA_ID = $modelEmpresachofer->EMPRESA_ID;

                $modelEmpresachofer->save();
           // 
               

            /*Yii::$app->getSession()->setFlash('success', [
                'type' => Growl::TYPE_SUCCESS,
                'icon' => 'fa fa-users',
                'message' => Html::encode('La Lista ha sido creada exitósamente'),
                'title' => Html::encode('Resultado'),
                'showSeparator' => true,
                    
            ]);*/
            return $this->redirect(['view', 'id' => $model->ID]);
            
            //}
        } else {
            return $this->render('create', [
                'model' => $model,
                'modelEmpresachofer' => $modelEmpresachofer,
            ]);
        }
    
    }

    /**
     * Updates an existing Chofer model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $actual_image = $model->IMG_CERTIFICADO;
        $actual_image2 = $model->IMG_CEDULA;
        $actual_image3 = $model->IMG_LICENCIA;
        $modelEmpresachofer = Empresachofer::findOne(['CHOFER_ID'=>$model->ID]);
                
        if ($model->load(Yii::$app->request->post())&& $modelEmpresachofer->load(Yii::$app->request->post())){
            $image= UploadedFile::getInstance($model, 'file');
            $image2= UploadedFile::getInstance($model, 'file2');
            $image3= UploadedFile::getInstance($model, 'file3');
            if(!empty($image) && $image->size !== 0) {
                $model->file = UploadedFile::getInstance($model, 'file');
                $model->file->saveAs('certificados/' . $model->CEDULA . '.' . $model->file->extension);
                $model->IMG_CERTIFICADO = 'certificados/' . $model->CEDULA . '.' . $model->file->extension;
            }else
                $model->IMG_CERTIFICADO = $actual_image;
            if(!empty($image2) && $image2->size !== 0) {
                $model->file2 = UploadedFile::getInstance($model, 'file2');
                $model->file2->saveAs('cedulas/' . $model->CEDULA . '.' . $model->file2->extension);
                $model->IMG_CEDULA = 'cedulas/' . $model->CEDULA . '.' . $model->file2->extension;
            }else
                $model->IMG_CEDULA = $actual_image2;
            if(!empty($image3) && $image3->size !== 0) {
                $model->file3 = UploadedFile::getInstance($model, 'file3');
                $model->file3->saveAs('licencias/' . $model->CEDULA . '.' . $model->file3->extension);
                $model->IMG_LICENCIA = 'licencias/' . $model->CEDULA . '.' . $model->file3->extension;
            }else
                $model->IMG_LICENCIA = $actual_image3;
            $model->save(false); 
            $modelEmpresachofer->CHOFER_ID = $model->ID;
            $modelEmpresachofer->EMPRESA_ID = $modelEmpresachofer->EMPRESA_ID;

            $modelEmpresachofer->save();
            return $this->redirect(['view', 'id' => $model->ID]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'modelEmpresachofer' => $modelEmpresachofer,
            ]);
        }
    }
    
    public function actionUpload()
 {
  
  $model = new FormUpload;
  $msg = null;
  
  if ($model->load(Yii::$app->request->post()))
  {
   $model->file = UploadedFile::getInstances($model, 'file');
   //$model->file = UploadedFile::getInstance($model, 'file');
   //$file = $model->file;
   //$file->saveAs(...);
   
   if ($model->file && $model->validate()) {
    foreach ($model->file as $file) {
     $file->saveAs('archivos/' . $file->baseName . '.' . $file->extension);
     $msg = "<p><strong class='label label-info'>Enhorabuena, subida realizada con éxito</strong></p>";
    }
   }
  }
  return $this->render("chofer", ["model" => $model, "msg" => $msg]);
 }

    /**
     * Deletes an existing Chofer model.
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
     * Finds the Chofer model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Chofer the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Chofer::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionReport()
    {
        $model = $this->findModel(1);
        $content = $this->renderPartial('_view',['model'=>$model]);

        $pdf = new Pdf([
        // set to use core fonts only
            'mode' => Pdf::MODE_CORE, 
            // A4 paper format
            'format' => Pdf::FORMAT_A4, 
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT, 
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER, 
            // your html content input
            'content' => $content,  
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting 
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            // any css to be embedded if required
            'cssInline' => '.kv-heading-1{font-size:18px}', 
             // set mPDF properties on the fly
            'options' => ['title' => 'Reporte Sitrascar'],
             // call mPDF methods on the fly
            'methods' => [ 
                'SetHeader'=>['Reporte Sitrascar'], 
                'SetFooter'=>['{PAGENO}'],
            ]
        ]);
    
    // return the pdf output as per the destination setting
        return $pdf->render(); 
    }
    
}
