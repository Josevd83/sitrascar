<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%flete}}".
 *
 * @property string $ID
 * @property string $ESTATUS_FLETE_ID
 * @property string $EMPRESACHOFER_ID
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
 * @property string $FE_IN_BOL
 * @property string $FE_PE_TARA_BOL
 * @property string $PESO_TARA_BOL
 * @property string $FE_PE_CAR_BOL
 * @property string $PESO_CAR_BOL
 * @property string $FE_OUT_BOL
 * @property string $FE_IN_CEN
 * @property string $FE_PE_CAR_CEN
 * @property string $PESO_CAR_CEN
 * @property string $FE_PE_TARA_CEN
 * @property string $PE_TARA_CEN
 * @property string $PESO_CARGA
 * @property string $PESO_DESCARGA
 * @property string $FALTANTE
 * @property string $GUIA_RECEP
 * @property string $OBSERVACIONES
 *
 * @property Lista $lISTA
 * @property Vehiculo $vEHICULO
 * @property Empresachofer $eMPRESACHOFER
 * @property Pagos[] $pagos
 * @property Segflete[] $segfletes
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
            [['ESTATUS_FLETE_ID', 'EMPRESACHOFER_ID', 'VEHICULO_ID', 'LISTA_ID'], 'required'],
            [['ESTATUS_FLETE_ID', 'EMPRESACHOFER_ID', 'VEHICULO_ID', 'LISTA_ID', 'GUIA_SADA', 'DIAS_VENCE_GS', 'ORDEN_PESO_CARGA', 'ORDEN_CARGA_CVA', 'ORDEN_CARGA_TQ', 'GUIA_RECEP'], 'integer'],
            [['FE_EMISION_GS', 'FE_VENCE_GS', 'FE_EMISION_OPC', 'FE_EMISION_OCCVA', 'FE_EMISION_OCTQ', 'FE_IN_BOL', 'FE_PE_TARA_BOL', 'FE_PE_CAR_BOL', 'FE_OUT_BOL', 'FE_IN_CEN', 'FE_PE_CAR_CEN', 'FE_PE_TARA_CEN'], 'safe'],
            [['PESO_TARA_BOL', 'PESO_CAR_BOL', 'PESO_CAR_CEN', 'PE_TARA_CEN', 'PESO_CARGA', 'PESO_DESCARGA', 'FALTANTE'], 'number'],
            [['OBSERVACIONES'], 'string'],
            [['LISTA_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Lista::className(), 'targetAttribute' => ['LISTA_ID' => 'ID']],
            [['VEHICULO_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Vehiculo::className(), 'targetAttribute' => ['VEHICULO_ID' => 'ID']],
            [['EMPRESACHOFER_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Empresachofer::className(), 'targetAttribute' => ['EMPRESACHOFER_ID' => 'ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'ESTATUS_FLETE_ID' => 'Estatus  Flete  ID',
            'EMPRESACHOFER_ID' => 'Empresa  Chofer  ID',
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
            'FE_IN_BOL' => 'Fe  In  Bol',
            'FE_PE_TARA_BOL' => 'Fe  Pe  Tara  Bol',
            'PESO_TARA_BOL' => 'Peso  Tara  Bol',
            'FE_PE_CAR_BOL' => 'Fe  Pe  Car  Bol',
            'PESO_CAR_BOL' => 'Peso  Car  Bol',
            'FE_OUT_BOL' => 'Fe  Out  Bol',
            'FE_IN_CEN' => 'Fe  In  Cen',
            'FE_PE_CAR_CEN' => 'Fe  Pe  Car  Cen',
            'PESO_CAR_CEN' => 'Peso  Car  Cen',
            'FE_PE_TARA_CEN' => 'Fe  Pe  Tara  Cen',
            'PE_TARA_CEN' => 'Pe  Tara  Cen',
            'PESO_CARGA' => 'Peso  Carga',
            'PESO_DESCARGA' => 'Peso  Descarga',
            'FALTANTE' => 'Faltante',
            'GUIA_RECEP' => 'Guia  Recep',
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
        return $this->hasOne(Empresachofer::className(), ['ID' => 'EMPRESACHOFER_ID']);
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
    public function getSegfletes()
    {
        return $this->hasMany(Segflete::className(), ['FLETE_ID' => 'ID']);
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
        $empresachofer = Empresachofer::findOne($this->EMPRESACHOFER_ID);
        $chofer = Chofer::findOne($empresachofer->CHOFER_ID);
        return $chofer->PRIMER_NOMBRE." ".$chofer->PRIMER_APELLIDO.", C.I.: ".$chofer->CEDULA;
    }
}
