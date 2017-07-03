<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%distribucion}}".
 *
 * @property string $ID
 * @property string $CENTRALES_ID
 * @property string $CARGA_ID
 * @property string $CANTIDAD
 * @property string $FE_ASIGNACION
 * @property string $CANT_FLETES
 * @property string $PERMISO_INSAI
 * @property string $FE_EMISION_PI
 * @property string $DIAS_VENCE_PI
 * @property string $FE_VENCE_PI
 * @property string $CODIGO_SICA
 * @property string $CANT_DESPACHADA
 * @property string $OBSERVACIONES
 * @property string $FE_REGISTRO
 * @property string $ESTATUS_DIS
 *
 * @property Carga $cARGA
 * @property Centrales $cENTRALES
 * @property Lista[] $listas
 */
class Distribucion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%distribucion}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CENTRALES_ID', 'CARGA_ID', 'CANTIDAD', 'CANT_FLETES'], 'required'],
            [['CENTRALES_ID', 'CARGA_ID', 'CANTIDAD', 'CANT_FLETES', 'DIAS_VENCE_PI', 'CODIGO_SICA', 'CANT_DESPACHADA', 'ESTATUS_DIS'], 'integer'],
            [['FE_ASIGNACION', 'FE_EMISION_PI', 'FE_VENCE_PI'], 'safe'],
            [['OBSERVACIONES'], 'string'],
            [['PERMISO_INSAI'], 'string', 'max' => 20],
            [['CANTIDAD'], 'distribucionCarga'],
            [['CARGA_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Carga::className(), 'targetAttribute' => ['CARGA_ID' => 'ID']],
            [['CENTRALES_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Centrales::className(), 'targetAttribute' => ['CENTRALES_ID' => 'ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'CARGA_ID' => 'Descripcion de la Carga',
            'DESCRIPCION' => 'Descripcion de la Distribucion',
            'CENTRALES_ID' => 'Central',
            'cENTRALES.NOMBRE' => 'Central',
            'CANTIDAD' => 'Cantidad Asignada',
            'FE_ASIGNACION' => 'Fecha de Asignacion',
            'CANT_FLETES' => 'Cantidad de Fletes Requeridos',
            'PERMISO_INSAI' => 'Numero de Permiso Insai',
            'FE_EMISION_PI' => 'Fecha de Emision PI',
            'DIAS_VENCE_PI' => 'Dias de Vigencia',
            'FE_VENCE_PI' => 'Fecha de Vencimiento PI',
            'CODIGO_SICA' => 'Codigo SICA',
            'CANT_DESPACHADA' => 'Cantidad  Despachada',
            'OBSERVACIONES' => 'Observaciones',
            'FE_REGISTRO' => 'Fecha de Registro',
            'ESTATUS_DIS' => 'Estatus',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCARGA()
    {
        return $this->hasOne(Carga::className(), ['ID' => 'CARGA_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCENTRALES()
    {
        return $this->hasOne(Centrales::className(), ['ID' => 'CENTRALES_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getListas()
    {
        return $this->hasMany(Lista::className(), ['DISTRIBUCION_ID' => 'ID']);
    }

    /**
     * @inheritdoc
     * @return DistribucionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DistribucionQuery(get_called_class());
    }
    
     public function PESO_CARGA()
    {
        return $this->hasOne(Carga::className(), ['ID' => 'CARGA_ID']);
    }
    
    public function distribucionCarga($attribute, $params)
    {
        
        if(isset($this->ID)){
        $model = Distribucion::findOne($this->ID);
        //var_dump($this->ID); die;
	$cantidadAnterior = $model->CANTIDAD;
        }else
        $cantidadAnterior = 0;
        //var_dump($cantidadAnterior); die;
        $modelCarga = Carga::findOne(['ID'=>$this->CARGA_ID]);
        $cantidadAsignada = $this->CANTIDAD;
        $pesodistribuido=$modelCarga->PESO_DISTRIBUIDO-$cantidadAnterior;
        $sumaCarga = $pesodistribuido+$cantidadAsignada;        
        if($sumaCarga > $modelCarga->PESO_ASIGNADO){
                $this->addError('CANTIDAD', 'El Peso distribuido sobrepasa el disponible en la carga.');
        }

    }
}
