<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cuentas".
 *
 * @property string $ID
 * @property string $EMPRESA_ID
 * @property string $BANCO
 * @property string $TIPO
 * @property string $NRO_CUENTA
 * @property string $CEDULA_RIF
 * @property string $TITULAR
 * @property string $ESTATUS
 *
 * @property Empresa $eMPRESA
 * @property Factura[] $facturas
 */
class Cuentas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cuentas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['EMPRESA_ID'], 'required'],
            [['EMPRESA_ID'], 'integer'],
            [['ESTATUS', 'NRO_CUENTA'], 'string'],
            [['BANCO'], 'string', 'max' => 100],
            [['TIPO', 'CEDULA_RIF'], 'string', 'max' => 10],
            [['NRO_CUENTA'], 'string', 'min' => 20, 'max' => 20],
            [['TITULAR'], 'string', 'max' => 150],
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
            'BANCO' => 'Banco',
            'TIPO' => 'Tipo de Cuenta',
            'NRO_CUENTA' => 'Numero  Cuenta',
            'CEDULA_RIF' => 'Cedula o Rif',
            'TITULAR' => 'Titular de la Cuenta',
            'ESTATUS' => 'Estatus',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEMPRESA()
    {
        return $this->hasOne(Empresa::className(), ['ID' => 'EMPRESA_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFacturas()
    {
        return $this->hasMany(Factura::className(), ['CUENTAS_ID' => 'ID']);
    }

    /**
     * @inheritdoc
     * @return CuentasQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CuentasQuery(get_called_class());
    }
}
