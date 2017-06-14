<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "empresa".
 *
 * @property string $ID
 * @property string $RIF
 * @property string $NOMBRE
 * @property string $CERT_SUNACCOP
 * @property string $CERT_INPSASEL
 * @property string $DIRECCION
 * @property string $TELEFONO_1
 * @property string $TELEFONO_2
 * @property string $CORREO
 * @property string $ESTATUS
 *
 * @property Cuentas[] $cuentas
 * @property EmpresaChofer[] $empresaChofers
 * @property Vehiculo[] $vehiculos
 */
class Empresa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'empresa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['RIF', 'NOMBRE'], 'required'],
            [['CERT_SUNACCOP', 'CERT_INPSASEL', 'TELEFONO_1', 'TELEFONO_2'], 'integer'],
            [['DIRECCION', 'ESTATUS'], 'string'],
            [['RIF'], 'string', 'max' => 10],
            [['NOMBRE'], 'string', 'max' => 100],
            [['CORREO'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'RIF' => 'Rif',
            'NOMBRE' => 'Nombre de la Empresa',
            'CERT_SUNACCOP' => 'Certificado  Sunaccop',
            'CERT_INPSASEL' => 'Certificado  Inpsasel',
            'DIRECCION' => 'Direccion',
            'TELEFONO_1' => 'Telefono',
            'TELEFONO_2' => 'Telefono Aternativo',
            'CORREO' => 'Correo Electronico',
            'ESTATUS' => 'Estatus',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCuentas()
    {
        return $this->hasMany(Cuentas::className(), ['EMPRESA_ID' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpresaChofers()
    {
        return $this->hasMany(EmpresaChofer::className(), ['EMPRESA_ID' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVehiculos()
    {
        return $this->hasMany(Vehiculo::className(), ['EMPRESA_ID' => 'ID']);
    }
}
