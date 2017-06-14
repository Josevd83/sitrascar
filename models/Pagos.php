<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%pagos}}".
 *
 * @property string $ID
 * @property string $CONCEPTOS_ID
 * @property string $FLETE_ID
 * @property string $MONTO
 * @property string $ESTATUS_PAGO
 * @property string $FE_REGISTRO
 *
 * @property Factura[] $facturas
 * @property Flete $fLETE
 * @property Conceptos $cONCEPTOS
 */
class Pagos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%pagos}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CONCEPTOS_ID', 'FLETE_ID'], 'required'],
            [['CONCEPTOS_ID', 'FLETE_ID', 'MONTO', 'ESTATUS_PAGO'], 'integer'],
            [['FE_REGISTRO'], 'safe'],
            [['FLETE_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Flete::className(), 'targetAttribute' => ['FLETE_ID' => 'ID']],
            [['CONCEPTOS_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Conceptos::className(), 'targetAttribute' => ['CONCEPTOS_ID' => 'ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'CONCEPTOS_ID' => 'Conceptos  ID',
            'FLETE_ID' => 'Flete  ID',
            'MONTO' => 'Monto',
            'ESTATUS_PAGO' => 'Estatus  Pago',
            'FE_REGISTRO' => 'Fe  Registro',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFacturas()
    {
        return $this->hasMany(Factura::className(), ['PAGOS_ID' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFLETE()
    {
        return $this->hasOne(Flete::className(), ['ID' => 'FLETE_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCONCEPTOS()
    {
        return $this->hasOne(Conceptos::className(), ['ID' => 'CONCEPTOS_ID']);
    }

    /**
     * @inheritdoc
     * @return PagosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PagosQuery(get_called_class());
    }
}
