<?php

namespace app\controllers;

use Yii;
use app\models\Lista;
use app\models\Chofer;
use app\models\Empresachofer;
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
            //var_dump(Json::decode($modelFlete->EMPRESA_CHOFER_ID));die;

            $model->ESTATUS_LISTA = 1;
            $model->FECHA_CREACION = $fecha;
            #$model->FECHA_CREACION = new Expression('now()');
            //echo $model->FECHA_CREACION; die;
            if($model->save()){
                $choferes = Json::decode($modelFlete->EMPRESACHOFER_ID);
                //var_dump($prueba);die;
                foreach($choferes as $chofer)
                {
                    $modelFlete = new Flete();
                    //var_dump($flete)."<hr>";
                    //echo $chofer."<hr>";
                    $modelEmpresachofer = Empresachofer::findOne(['CHOFER_ID'=>$chofer]);

                    $modelFlete->ESTATUS_FLETE_ID = 1;
                    $modelFlete->EMPRESACHOFER_ID = $modelEmpresachofer->ID;
                    $modelFlete->VEHICULO_ID = $modelEmpresachofer->VEHICULO_ID;
                    $modelFlete->LISTA_ID = $model->ID;

                    if($modelFlete->save()){
                        $modelEmpresachofer->BLOQUEADO = "1";
                        $modelEmpresachofer->save();
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
        $modelFlete = new Flete();// Flete::find()->where(['LISTA_ID'=>$model->ID]);
        //var_dump($modelFlete);die;
        //$modelFlete->EMPRESACHOFER_ID = [11=>11,22=>22,33=>33,44=>44,55=>55];

        //var_dump($modelDistribucion->attributes);die;

        if ($model->load(Yii::$app->request->post()) && $modelFlete->load(Yii::$app->request->post())) {
            $fecha = Yii::$app->formatter->asDate($model->FECHA_CREACION, 'Y-MM-dd');

            $model->ESTATUS_LISTA = 1;
            $model->FECHA_CREACION = $fecha;
            if($model->save()){

		$fletes_anteriores = Flete::findAll(['LISTA_ID'=>$model->ID]);
		foreach($fletes_anteriores as $flete_anterior){
			$empresa_chofer_anterior = Empresachofer::findOne($flete_anterior->EMPRESACHOFER_ID);
			$empresa_chofer_anterior->BLOQUEADO = '0';
			$empresa_chofer_anterior->save();
			$flete_anterior->delete();
		}
		
                $choferes = Json::decode($modelFlete->EMPRESACHOFER_ID);
                foreach($choferes as $chofer)
                {
                    $modelFlete = new Flete();
                    $modelEmpresachofer = Empresachofer::findOne(['CHOFER_ID'=>$chofer]);

                    $modelFlete->ESTATUS_FLETE_ID = 1;
                    $modelFlete->EMPRESACHOFER_ID = $modelEmpresachofer->ID;
                    $modelFlete->VEHICULO_ID = $modelEmpresachofer->VEHICULO_ID;
                    $modelFlete->LISTA_ID = $model->ID;

                    if($modelFlete->save()){
                        $modelEmpresachofer->BLOQUEADO = "1";
                        $modelEmpresachofer->save();
                    }
                }

            }

            Yii::$app->getSession()->setFlash('success', [
                'type' => Growl::TYPE_SUCCESS,
                'icon' => 'fa fa-users',
                'message' => Html::encode('La Lista ha sido creada exitósamente'),
                'title' => Html::encode('Resultado'),
                'showSeparator' => true,
            ]);
            return $this->redirect(['view', 'id' => $model->ID]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'modelFlete' => $modelFlete,
                'modelDistribucion' => $modelDistribucion,
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
///////////////////////////////////////
$parametros = [':CENTRALES_ID' => $cat_id];
		
$consulta = Yii::$app->db->createCommand('SELECT ID as id, DESCRIPCION as name FROM distribucion WHERE CENTRALES_ID=:CENTRALES_ID  AND CANTIDAD>CANT_DESPACHADA AND CODIGO_SICA IS NOT NULL')->bindValues($parametros)->queryAll();
//$ids = [];
//var_dump($consulta);die;
//foreach($consulta as  $valor){
//echo $valor['ID']."<br>";
//	$ids[] = $valor['ID'];
//}

//var_dump($ids);die;
//$out = Distribucion::find($ids)->select(['ID as id','OBSERVACIONES as name'])->asArray()->all();
$out = $consulta;

                ##$out = Distribucion::find()->select(['ID as id','OBSERVACIONES as name'])->where(['CENTRALES_ID'=>$cat_id])->andWhere(['>', 'CANTIDAD', 'CANTIDAD_DESPACHADA'])->andWhere(['not', ['CODIGO_SICA' => null]])->asArray()->all();
///////////////////////////////////////

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

                #$out = Distribucion::find()->select(['ID as id','OBSERVACIONES as name'])->where(['CENTRALES_ID'=>$cat_id])->andWhere(['>', ['CANTIDAD' => 'CANTIDAD_DESPACHADA']])->andWhere(['not', ['CODIGO_SICA' => null]])->asArray()->all(); 
$parametros = [':CENTRALES_ID' => $cat_id];
		$consulta = Yii::$app->db->createCommand('SELECT ID as id, DESCRIPCION as name FROM distribucion WHERE CENTRALES_ID=:CENTRALES_ID  AND CANTIDAD>CANT_DESPACHADA AND CODIGO_SICA IS NOT NULL')->bindValues($parametros)->queryAll();

		$out = $consulta;

                echo Json::encode(['output'=>$out, 'selected'=>'']);
                return;
            }
        }
        echo Json::encode(['output'=>'', 'selected'=>'']);
    }

    public function actionOrdencva()
    {
       $modelLista = Lista::findOne(Yii::$app->request->post('lista'));
       $modelDistribucion = Distribucion::findOne($modelLista->DISTRIBUCION_ID);
       $modelFlete = Flete::findAll(['LISTA_ID'=>$modelLista->ID]);
        $imagen =  Html::img('@web/images/logo-sitrascar.png');
        $content = $this->renderPartial('_ordencva', ['modelLista'=>$modelLista, 'modelDistribucion'=>$modelDistribucion, 'modelFlete'=>$modelFlete]);
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
        //var_dump(Yii::$app->request->post());die;
        if (Yii::$app->request->post('lista')){

            $modelLista = Lista::findOne(Yii::$app->request->post('lista'));
            $modelDistribucion = Distribucion::findOne($modelLista->DISTRIBUCION_ID);
            $modelFlete = Flete::findAll(['LISTA_ID'=>$modelLista->ID]);
            //$modelCarga = Carga::find();


            $imagen =  Html::img('@web/images/logo-sitrascar.png');
            $content = $this->renderPartial('_ordenguiasada',['modelLista'=>$modelLista, 'modelDistribucion'=>$modelDistribucion, 'modelFlete'=>$modelFlete]);
            $pdf = new Pdf(['cssInline' => '.kv-heading-1{font-size:24px}']); // or new Pdf();
            $mpdf = $pdf->api; // fetches mpdf api
            $mpdf->SetHTMLHeader("<div class='encabezado'>$imagen GLOBAL FREIGHT, C.A.</div>");
            $mpdf->WriteHtml($content); // call mpdf write html
            echo $mpdf->Output('ordenGuiaSada', 'D');
            //return $pdf->render();
        }else{throw new NotFoundHttpException('Solicitud Inválida.');}
        
    }
	
	public function actionLista()
    {
        //var_dump(Yii::$app->request->post());die;
        if (Yii::$app->request->post('lista')){

            $modelLista = Lista::findOne(Yii::$app->request->post('lista'));
            $modelDistribucion = Distribucion::findOne($modelLista->DISTRIBUCION_ID);
	        $modelFlete = Flete::findAll(['LISTA_ID'=>$modelLista->ID]);
            //$modelCarga = Carga::find();
			//var_dump($modelFlete);die;

            $imagen =  Html::img('@web/images/logo-sitrascar.png');
            $content = $this->renderPartial('_lista',['modelLista'=>$modelLista, 'modelDistribucion'=>$modelDistribucion, 'modelFlete'=>$modelFlete]);
            $pdf = new Pdf(['cssInline' => '.kv-heading-1{font-size:24px}']); // or new Pdf();
            $mpdf = $pdf->api; // fetches mpdf api
            $mpdf->SetHTMLHeader("<div class='encabezado'>$imagen</div>");
            $mpdf->WriteHtml($content); // call mpdf write html
            echo $mpdf->Output('lista', 'D');
            //return $pdf->render();
        }else{throw new NotFoundHttpException('Solicitud Inválida.');}
        
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
            $empresachoferes = Empresachofer::findAll(['EMPRESA_ID'=>$id_empresa, 'BLOQUEADO'=>'0']);
            //var_dump($empresaChoferes);die;
            //echo count($empresaChoferes);die;
            if (count($empresachoferes) > 0) {
                    foreach ($empresachoferes as $empresachofer) {
                        //$chofer = $empresaChofer->cHOFER;
                        $chofer = Chofer::findOne(['ID'=>$empresachofer->CHOFER_ID]);
                        echo "<option value='" . $chofer->ID . "'>" . $chofer->PRIMER_NOMBRE." ".$chofer->PRIMER_APELLIDO . "</option>";
                    }
                } else {
                    echo "'<option>No hay choferes disponibles</option>'";
                }
            }
    }

    public function actionBuscarchoferseleccionado()
    {

        $id_lista =  Yii::$app->request->post('id_lista');

        if ($id_lista != null) {
            $parametros = [':LISTA_ID' => $id_lista];
            $empresachoferes = Yii::$app->db->createCommand("SELECT chofer.ID,
                                                             CONCAT(chofer.PRIMER_NOMBRE, ' ', IFNULL(chofer.SEGUNDO_NOMBRE, ''), ' ', chofer.PRIMER_APELLIDO, ' ', IFNULL(chofer.SEGUNDO_APELLIDO, '')) AS nombre 
                                                      FROM flete JOIN empresachofer ON flete.EMPRESACHOFER_ID=empresachofer.ID
                                                                 JOIN chofer ON empresachofer.CHOFER_ID=chofer.ID
                                                      WHERE flete.LISTA_ID=:LISTA_ID")->bindValues($parametros)->queryAll();

            if (count($empresachoferes) > 0) {
                    foreach ($empresachoferes as $empresachofer) {

                        echo "<option value='" . $empresachofer['ID'] . "'>" . $empresachofer['nombre'] . "</option>";
                    }
                } else {
                    //echo "'<option>No hay choferes disponibles</option>'";
		   echo "''";
                }
            }
    }
}
