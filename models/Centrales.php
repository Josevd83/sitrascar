<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%centrales}}".
 *
 * @property string $ID
 * @property string $PARROQUIA_ID
 * @property string $MUNICIPIO_ID
 * @property string $ESTADO_ID
 * @property string $NOMBRE
 * @property string $RIF
 * @property string $DIRECCION
 * @property string $TELEFONO_1
 * @property string $TELEFONO_2
 * @property string $ESTATUS
 *
 * @property Estado $eSTADO
 * @property Municipio $mUNICIPIO
 * @property Parroquia $pARROQUIA
 * @property Distribucion[] $distribucions
 * @property Tarifas[] $tarifas
 */
class Centrales extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%centrales}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PARROQUIA_ID', 'MUNICIPIO_ID', 'ESTADO_ID'], 'required'],
            [['PARROQUIA_ID', 'MUNICIPIO_ID', 'ESTADO_ID', 'TELEFONO_1', 'TELEFONO_2'], 'integer'],
            [['ESTATUS'], 'string'],
            [['NOMBRE'], 'string', 'max' => 100],
            [['RIF'], 'string', 'max' => 10],
            [['DIRECCION'], 'string', 'max' => 200],
            [['ESTADO_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Estado::className(), 'targetAttribute' => ['ESTADO_ID' => 'ID']],
            [['MUNICIPIO_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Municipio::className(), 'targetAttribute' => ['MUNICIPIO_ID' => 'ID']],
            [['PARROQUIA_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Parroquia::className(), 'targetAttribute' => ['PARROQUIA_ID' => 'ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'PARROQUIA_ID' => 'Parroquia',
            'MUNICIPIO_ID' => 'Municipio',
            'ESTADO_ID' => 'Estado',
            'eSTADO.NOMBRE' => 'Estado',
            'mUNICIPIO.NOMBRE' => 'Municipio',
            'pARROQUIA.NOMBRE' => 'Parroquia',
            'NOMBRE' => 'Nombre de la Central',
            'RIF' => 'Rif',
            'DIRECCION' => 'Direccion',
            'TELEFONO_1' => 'Telefono Principal',
            'TELEFONO_2' => 'Telefono Secundario',
            'ESTATUS' => 'Estatus',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getESTADO()
    {
        return $this->hasOne(Estado::className(), ['ID' => 'ESTADO_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMUNICIPIO()
    {
        return $this->hasOne(Municipio::className(), ['ID' => 'MUNICIPIO_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPARROQUIA()
    {
        return $this->hasOne(Parroquia::className(), ['ID' => 'PARROQUIA_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDistribucions()
    {
        return $this->hasMany(Distribucion::className(), ['CENTRALES_ID' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTarifas()
    {
        return $this->hasMany(Tarifas::className(), ['CENTRALES_ID' => 'ID']);
    }

    /**
     * @inheritdoc
     * @return CentralesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CentralesQuery(get_called_class());
    }
}
