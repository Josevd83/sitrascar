<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%flete}}".
 *
 * @property string $ID
 * @property string $EMPRESA_CHOFER_ID
 * @property string $VEHICULO_ID
 * @property string $LISTA_ID
 * @property string $GUIA_SADA
 * @property string $FE_EMISION_GS
 * @property string $DIAS_VENCE_GS
 * @property string $FE_VENCE_GS
 * @property string $ORDEN_PESO_CARGA
 * @property string $FE_EMISION_OPC
 * @property string $ORDEN_CARGA_CVA
 * @property string $FE_EMISION_OCCVA
 * @property string $ORDEN_CARGA_TQ
 * @property string $FE_EMISION_OCTQ
 * @property string $PESO_CARGA
 * @property string $PESO_DESCARGA
 * @property string $GUIA_RECEPCION
 * @property string $ESTATUS_FLETE
 * @property string $OBSERVACIONES
 *
 * @property Lista $lISTA
 * @property Vehiculo $vEHICULO
 * @property EmpresaChofer $eMPRESACHOFER
 * @property Pagos[] $pagos
 * @property SegFlete[] $segFletes
 */
class Flete extends \yii\db\ActiveRecord
{
    public $chofer;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%flete}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['EMPRESA_CHOFER_ID', 'VEHICULO_ID', 'LISTA_ID'], 'required'],
            [['EMPRESA_CHOFER_ID', 'VEHICULO_ID', 'LISTA_ID', 'GUIA_SADA', 'DIAS_VENCE_GS', 'ORDEN_PESO_CARGA', 'ORDEN_CARGA_CVA', 'ORDEN_CARGA_TQ', 'PESO_CARGA', 'PESO_DESCARGA', 'GUIA_RECEPCION', 'ESTATUS_FLETE'], 'integer'],
            [['FE_EMISION_GS', 'FE_VENCE_GS', 'FE_EMISION_OPC', 'FE_EMISION_OCCVA', 'FE_EMISION_OCTQ'], 'safe'],
            [['OBSERVACIONES'], 'string'],
            [['LISTA_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Lista::className(), 'targetAttribute' => ['LISTA_ID' => 'ID']],
            [['VEHICULO_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Vehiculo::className(), 'targetAttribute' => ['VEHICULO_ID' => 'ID']],
            [['EMPRESA_CHOFER_ID'], 'exist', 'skipOnError' => true, 'targetClass' => EmpresaChofer::className(), 'targetAttribute' => ['EMPRESA_CHOFER_ID' => 'ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'EMPRESA_CHOFER_ID' => 'Empresa  Chofer  ID',
            'VEHICULO_ID' => 'Vehiculo  ID',
            'LISTA_ID' => 'Lista  ID',
            'GUIA_SADA' => 'Guia  Sada',
            'FE_EMISION_GS' => 'Fe  Emision  Gs',
            'DIAS_VENCE_GS' => 'Dias  Vence  Gs',
            'FE_VENCE_GS' => 'Fe  Vence  Gs',
            'ORDEN_PESO_CARGA' => 'Orden  Peso  Carga',
            'FE_EMISION_OPC' => 'Fe  Emision  Opc',
            'ORDEN_CARGA_CVA' => 'Orden  Carga  Cva',
            'FE_EMISION_OCCVA' => 'Fe  Emision  Occva',
            'ORDEN_CARGA_TQ' => 'Orden  Carga  Tq',
            'FE_EMISION_OCTQ' => 'Fe  Emision  Octq',
            'PESO_CARGA' => 'Peso  Carga',
            'PESO_DESCARGA' => 'Peso  Descarga',
            'GUIA_RECEPCION' => 'Guia  Recepcion',
            'ESTATUS_FLETE' => 'Estatus  Flete',
            'OBSERVACIONES' => 'Observaciones',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLISTA()
    {
        return $this->hasOne(Lista::className(), ['ID' => 'LISTA_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVEHICULO()
    {
        return $this->hasOne(Vehiculo::className(), ['ID' => 'VEHICULO_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEMPRESACHOFER()
    {
        return $this->hasOne(EmpresaChofer::className(), ['ID' => 'EMPRESA_CHOFER_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPagos()
    {
        return $this->hasMany(Pagos::className(), ['FLETE_ID' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSegFletes()
    {
        return $this->hasMany(SegFlete::className(), ['FLETE_ID' => 'ID']);
    }

    /**
     * @inheritdoc
     * @return FleteQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FleteQuery(get_called_class());
    }

    public function nomApeChofer()
    {
        $empresaChofer = EmpresaChofer::findOne($this->EMPRESA_CHOFER_ID);
        $chofer = Chofer::findOne($empresaChofer->CHOFER_ID);
        return $chofer->PRIMER_NOMBRE." ".$chofer->PRIMER_APELLIDO.", C.I.: ".$chofer->CEDULA;
    }
}
