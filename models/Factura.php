<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%factura}}".
 *
 * @property string $ID
 * @property string $CUENTAS_ID
 * @property string $PAGOS_ID
 * @property string $MONTO_TOTAL
 * @property string $TOTAL_ANTICIPOS
 * @property string $TOTAL_DESCUENTOS
 * @property string $NETO_COBRAR
 * @property string $ESTATUS_FAC
 *
 * @property Pagos $pAGOS
 * @property Cuentas $cUENTAS
 */
class Factura extends \yii\db\ActiveRecord
{
	public $empresa;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%factura}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CUENTAS_ID', 'PAGOS_ID', 'empresa'], 'required'],
            [['CUENTAS_ID', 'PAGOS_ID', 'MONTO_TOTAL', 'TOTAL_ANTICIPOS', 'TOTAL_DESCUENTOS', 'NETO_COBRAR', 'ESTATUS_FAC'], 'integer'],
            [['PAGOS_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Pagos::className(), 'targetAttribute' => ['PAGOS_ID' => 'ID']],
            [['CUENTAS_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Cuentas::className(), 'targetAttribute' => ['CUENTAS_ID' => 'ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'CUENTAS_ID' => 'Cuentas  ID',
            'PAGOS_ID' => 'Pagos  ID',
            'MONTO_TOTAL' => 'Monto  Total',
            'TOTAL_ANTICIPOS' => 'Total  Anticipos',
            'TOTAL_DESCUENTOS' => 'Total  Descuentos',
            'NETO_COBRAR' => 'Neto  Cobrar',
            'ESTATUS_FAC' => 'Estatus  Fac',
            'empresa' => 'Empresa',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPAGOS()
    {
        return $this->hasOne(Pagos::className(), ['ID' => 'PAGOS_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCUENTAS()
    {
        return $this->hasOne(Cuentas::className(), ['ID' => 'CUENTAS_ID']);
    }

    /**
     * @inheritdoc
     * @return FacturaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FacturaQuery(get_called_class());
    }
}
