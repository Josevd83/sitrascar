<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%conceptos}}".
 *
 * @property string $ID
 * @property string $NOMBRE
 * @property string $SIGNO
 * @property string $FORMULA
 * @property string $ESTATUS
 *
 * @property Pagos[] $pagos
 * @property Tarifas[] $tarifas
 */
class Conceptos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%conceptos}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SIGNO'], 'integer'],
            [['ESTATUS'], 'string'],
            [['NOMBRE'], 'string', 'max' => 30],
            [['FORMULA'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'NOMBRE' => 'Nombre',
            'SIGNO' => 'Signo',
            'FORMULA' => 'Formula',
            'ESTATUS' => 'Estatus',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPagos()
    {
        return $this->hasMany(Pagos::className(), ['CONCEPTOS_ID' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTarifas()
    {
        return $this->hasMany(Tarifas::className(), ['CONCEPTOS_ID' => 'ID']);
    }

    /**
     * @inheritdoc
     * @return ConceptosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ConceptosQuery(get_called_class());
    }
}
