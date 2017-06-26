<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%vehiculo}}".
 *
 * @property string $ID
 * @property string $EMPRESA_ID
 * @property string $PLACA_CHUTO
 * @property string $MARCA
 * @property string $MODELO
 * @property string $SERIAL
 * @property string $PLACA_REMOLQUE
 * @property string $CAPACIDAD
 * @property string $COLOR
 * @property string $SROP
 * @property string $NRO_PRC
 * @property string $FE_VENCE_PRC
 * @property string $IMG_CARNET
 * @property string $ESTATUS
 *
 * @property EmpresaChofer[] $empresaChofers
 * @property Flete[] $fletes
 * @property Empresa $eMPRESA
 */
class Vehiculo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%vehiculo}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['EMPRESA_ID', 'PLACA_CHUTO', 'SERIAL'], 'required'],
            [['EMPRESA_ID', 'CAPACIDAD', 'SROP', 'NRO_PRC'], 'integer'],
            [['FE_VENCE_PRC'], 'safe'],
            [['ESTATUS'], 'string'],
            [['PLACA_CHUTO', 'PLACA_REMOLQUE'], 'string', 'max' => 10],
            [['MARCA', 'MODELO', 'COLOR'], 'string', 'max' => 50],
            [['SERIAL'], 'string', 'min' => 18, 'max' => 18],
            [['IMG_CARNET'], 'string', 'max' => 100],
            [['EMPRESA_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Empresa::className(), 'targetAttribute' => ['EMPRESA_ID' => 'ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'EMPRESA_ID' => 'Empresa',
			'eMPRESA.NOMBRE' => 'Empresa',
            'PLACA_CHUTO' => 'Placa del Chuto',
            'MARCA' => 'Marca',
            'MODELO' => 'Modelo',
            'SERIAL' => 'Serial',
            'PLACA_REMOLQUE' => 'Placa del Remolque',
            'CAPACIDAD' => 'Capacidad',
            'COLOR' => 'Color',
            'SROP' => 'SROP',
            'NRO_PRC' => 'Nro de Poliza de Responsabilidad Civil',
            'FE_VENCE_PRC' => 'Fecha de Vencimiento de Poliza de R.C.',
            'IMG_CARNET' => 'Imagen Carnet de Circulacion',
            'ESTATUS' => 'Estatus',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpresaChofers()
    {
        return $this->hasMany(EmpresaChofer::className(), ['VEHICULO_ID' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFletes()
    {
        return $this->hasMany(Flete::className(), ['VEHICULO_ID' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEMPRESA()
    {
        return $this->hasOne(Empresa::className(), ['ID' => 'EMPRESA_ID']);
    }

    /**
     * @inheritdoc
     * @return VehiculoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new VehiculoQuery(get_called_class());
    }
}
