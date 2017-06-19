<?php

namespace app\controllers;

use Yii;
use app\models\Lista;
use app\models\Chofer;
use app\models\EmpresaChofer;
use app\models\ListaSearch;
use app\models\Distribucion;
use app\models\Flete;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\web\Response;
use yii\helpers\ArrayHelper;
use kartik\mpdf\Pdf;
use yii\helpers\Html;
use yii\db\Expression;
use kartik\widgets\Growl;


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
        $model = Lista::findOne($id);
        $modelDistribucion = Distribucion::findOne([$model->DISTRIBUCION_ID]);
        return $this->render('view', [
            //'model' => $this->findModel($id),
            'model' => $model,
            'modelDistribucion' => $modelDistribucion,
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
        //$modelFlete = new Chofer();
        $modelDistribucion = new Distribucion();
        $items = Lista::getChoferesDisponibles();

        /*if ($model->load(Yii::$app->request->post())){
            var_dump(Yii::$app->request->post());
            die;
            
        }*/

        //if ($model->load(Yii::$app->request->post()) && $model->save()) {
        if ($model->load(Yii::$app->request->post()) && $modelFlete->load(Yii::$app->request->post())) {
            //var_dump($model->attributes);die;
            //var_dump($modelFlete->attributes);die;
            //var_dump($modelFlete->EMPRESA_CHOFER_ID);die;
            //echo $model->FECHA_CREACION."<br>";
            $fecha = Yii::$app->formatter->asDate($model->FECHA_CREACION, 'Y-MM-dd');
            //var_dump($fecha);die;

            $model->ESTATUS_LISTA = 1;
            $model->FECHA_CREACION = $fecha;
            #$model->FECHA_CREACION = new Expression('now()');
            //echo $model->FECHA_CREACION; die;
            if($model->save()){
                $choferes = Json::decode($modelFlete->EMPRESA_CHOFER_ID);
                //var_dump($prueba);die;
                foreach($choferes as $chofer)
                {
                    $modelFlete = new Flete();
                    //var_dump($flete)."<hr>";
                    //echo $chofer."<hr>";
                    $modelEmpresaChofer = EmpresaChofer::findOne(['CHOFER_ID'=>$chofer]);

                    $modelFlete->ESTATUS_FLETE_ID = 1;
                    $modelFlete->EMPRESA_CHOFER_ID = $modelEmpresaChofer->ID;
                    $modelFlete->VEHICULO_ID = $modelEmpresaChofer->VEHICULO_ID;
                    $modelFlete->LISTA_ID = $model->ID;

                    if($modelFlete->save()){
                        $modelEmpresaChofer->BLOQUEADO = "1";
                        $modelEmpresaChofer->save();
                    }

                }
                //die;

            }
            
            /*$model->ESTATUS_LISTA = 1;
            if($model->save()){

            }*/

            Yii::$app->getSession()->setFlash('success', [
                'type' => Growl::TYPE_SUCCESS,
                'icon' => 'fa fa-users',
                'message' => Html::encode('La Lista ha sido creada exitósamente'),
                'title' => Html::encode('Resultado'),
                'showSeparator' => true,
                    
            ]);
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
        $modelDistribucion = Distribucion::findOne($model->DISTRIBUCION_ID);
        $modelFlete = new Flete();

        //var_dump($modelDistribucion->attributes);die;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'modelDistribucion' => $modelDistribucion,
                'modelFlete' => $modelFlete,
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
                ##$out = Distribucion::findAll(['CENTRALES_ID'=>$cat_id])->select(['ID as id','OBSERVACIONES as name'])->asArray()->all(); 
                $out = Distribucion::find()->select(['ID as id','OBSERVACIONES as name'])->where(['CENTRALES_ID'=>$cat_id])->andWhere(['not', ['CODIGO_SICA' => null]])->asArray()->all(); 
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

    public function actionGetdistribucioncentrales2() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $cat_id = $parents[0];
                #$out = self::getSubCatList($cat_id); 
                ##$out = Distribucion::findAll(['CENTRALES_ID'=>$cat_id])->select(['ID as id','OBSERVACIONES as name'])->asArray()->all(); 
                $out = Distribucion::find()->select(['ID as id','OBSERVACIONES as name'])->where(['CENTRALES_ID'=>$cat_id])->andWhere(['not', ['CODIGO_SICA' => null]])->asArray()->all(); 
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

    public function actionOrdencva()
    {
       /* $model = Chofer::findOne(1);
        $content = $this->renderPartial('_ordencva',['model'=>$model]);

        $pdf = new Pdf([
        // set to use core fonts only
            //'mode' => Pdf::MODE_CORE, 
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
                'SetHeader'=>['Orden CVA'], 
                'SetFooter'=>['{PAGENO}'],
            ]
        ]);
    
    // return the pdf output as per the destination setting
        return $pdf->render(); */
        $imagen =  Html::img('@web/images/logo-sitrascar.png');
        $content = $this->renderPartial('_ordencva');
        //return $content;
        //$pdf = Yii::$app->pdf; // or new Pdf();
        $pdf = new Pdf(['cssInline' => '.kv-heading-1{font-size:24px}']); // or new Pdf();
        $mpdf = $pdf->api; // fetches mpdf api
        //$mpdf->SetHeader('GLOBAL FREITH, C.A.'); // call methods or set any properties
        $mpdf->SetHTMLHeader("<div class='encabezado'>$imagen GLOBAL FREIGHT, C.A.<br /></div><div class='rif'>RIF J-29900002-7</div>");
        //$mpdf->SetHTMLHeader("<div class='encabezado'>$imagen</div>");
        $mpdf->WriteHtml($content); // call mpdf write html
        echo $mpdf->Output('ordenCVA', 'D'); // call the mpdf api output as needed
        //return $pdf->render();
    }

    public function actionOrdenguiasada()
    {
        $imagen =  Html::img('@web/images/logo-sitrascar.png');
        $content = $this->renderPartial('_ordenguiasada');
        $pdf = new Pdf(['cssInline' => '.kv-heading-1{font-size:24px}']); // or new Pdf();
        $mpdf = $pdf->api; // fetches mpdf api
        $mpdf->SetHTMLHeader("<div class='encabezado'>$imagen GLOBAL FREIGHT, C.A.</div>");
        $mpdf->WriteHtml($content); // call mpdf write html
        echo $mpdf->Output('ordenGuiaSada', 'D');
        //return $pdf->render();
    }

    //public function actionBuscarchofer($id)
    public function actionBuscarchofer()
    {
        //$id_empresa =  [':id_empresa' => Yii::$app->request->post('id_empresa')];
//echo $id;die;
        $id =  Yii::$app->request->post('id_empresa');
        $id_empresa = $id;
        if ($id_empresa != null) {
            //$choferes = Chofer::find(['EMPRESA_ID'=>$id_empresa])->with('empresaChofers')->all();
            //$choferes = EmpresaChofer::find(['EMPRESA_ID'=>$id_empresa])->select(['chofer.ID as ID', 'chofer.PRIMER_NOMBRE as PRIMER_NOMBRE'])->with('cHOFER')->all();
            $empresaChoferes = EmpresaChofer::findAll(['EMPRESA_ID'=>$id_empresa, 'BLOQUEADO'=>'0']);
            //var_dump($empresaChoferes);die;
            //echo count($empresaChoferes);die;
            if (count($empresaChoferes) > 0) {
                    foreach ($empresaChoferes as $empresaChofer) {
                        //$chofer = $empresaChofer->cHOFER;
                        $chofer = Chofer::findOne(['ID'=>$empresaChofer->CHOFER_ID]);
                        echo "<option value='" . $chofer->ID . "'>" . $chofer->PRIMER_NOMBRE . "</option>";
                    }
                } else {
                    echo "'<option>No hay choferes disponibles</option>'";
                }
            }
    }
}
