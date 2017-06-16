<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "carga".
 *
 * @property string $ID
 * @property string $TIPO_CARGA_ID
 * @property string $PUERTO_ID
 * @property string $RUBROS_ID
 * @property string $PAIS_ID
 * @property string $BUQUE_ID
 * @property string $FECHA_ATRAQUE
 * @property string $BL
 * @property string $MUELLE
 * @property string $PESO
 * @property string $COD_VIAJE
 * @property string $PESO_ASIGNADO
 * @property string $ESTATUS_CARGA
 * @property string $PESO_DISTRIBUIDO
 * @property string $FECHA_REGISTRO
 * @property string $OBSERVACIONES
 *
 * @property Buque $bUQUE
 * @property Pais $pAIS
 * @property Rubros $rUBROS
 * @property Puerto $pUERTO
 * @property TipoCarga $tIPOCARGA
 * @property Distribucion[] $distribucions
 */
class Carga extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'carga';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TIPO_CARGA_ID', 'PUERTO_ID', 'RUBROS_ID', 'PAIS_ID', 'BUQUE_ID', 'FECHA_ATRAQUE', 'ESTATUS_CARGA'], 'required'],
            [['TIPO_CARGA_ID', 'PUERTO_ID', 'RUBROS_ID', 'PAIS_ID', 'BUQUE_ID', 'BL', 'MUELLE', 'ESTATUS_CARGA'], 'integer'],
            [['FECHA_ATRAQUE'], 'safe'],
            [['PESO', 'PESO_ASIGNADO', 'PESO_DISTRIBUIDO'], 'number'],
            [['OBSERVACIONES'], 'string'],
            [['COD_VIAJE'], 'string', 'max' => 50],
            [['BUQUE_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Buque::className(), 'targetAttribute' => ['BUQUE_ID' => 'ID']],
            [['PAIS_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Pais::className(), 'targetAttribute' => ['PAIS_ID' => 'ID']],
            [['RUBROS_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Rubros::className(), 'targetAttribute' => ['RUBROS_ID' => 'ID']],
            [['PUERTO_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Puerto::className(), 'targetAttribute' => ['PUERTO_ID' => 'ID']],
            [['TIPO_CARGA_ID'], 'exist', 'skipOnError' => true, 'targetClass' => TipoCarga::className(), 'targetAttribute' => ['TIPO_CARGA_ID' => 'ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'Numero',
            'TIPO_CARGA_ID' => 'Tipo de Carga',
            'tIPOCARGA.NOMBRE' => 'Tipo de Carga',
            'PUERTO_ID' => 'Puerto de Llegada',
            'pUERTO.NOMBRE' => 'Puerto de Llegada',
            'RUBROS_ID' => 'Rubro',
            'rUBROS.NOMBRE' => 'Rubro',
            'PAIS_ID' => 'Pais',
            'pAIS.NOMBRE' => 'Pais',
            'BUQUE_ID' => 'Buque',
            'bUQUE.NOMBRE' => 'Buque',
            'FECHA_ATRAQUE' => 'Fecha de Atraque',
            'BL' => 'Bl',
            'MUELLE' => 'Muelle',
            'PESO' => 'Peso',
            'COD_VIAJE' => 'Codigo de  Viaje',
            'PESO_ASIGNADO' => 'Peso  Asignado',
            'ESTATUS_CARGA' => 'Estatus de la Carga',
            'PESO_DISTRIBUIDO' => 'Peso  Distribuido',
            'FECHA_REGISTRO' => 'Fecha de Registro',
            'OBSERVACIONES' => 'Observaciones',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBUQUE()
    {
        return $this->hasOne(Buque::className(), ['ID' => 'BUQUE_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPAIS()
    {
        return $this->hasOne(Pais::className(), ['ID' => 'PAIS_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRUBROS()
    {
        return $this->hasOne(Rubros::className(), ['ID' => 'RUBROS_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPUERTO()
    {
        return $this->hasOne(Puerto::className(), ['ID' => 'PUERTO_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTIPOCARGA()
    {
        return $this->hasOne(TipoCarga::className(), ['ID' => 'TIPO_CARGA_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDistribucions()
    {
        return $this->hasMany(Distribucion::className(), ['CARGA_ID' => 'ID']);
    }

    /**
     * @inheritdoc
     * @return CargaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CargaQuery(get_called_class());
    }
}
