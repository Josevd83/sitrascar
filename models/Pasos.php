<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%pasos}}".
 *
 * @property string $ID
 * @property string $NOMBRE
 * @property string $ORDEN
 * @property string $ESTATUS
 *
 * @property SegFlete[] $segFletes
 */
class Pasos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%pasos}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ORDEN'], 'integer'],
            [['ESTATUS'], 'string'],
            [['NOMBRE'], 'string', 'max' => 100],
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
            'ORDEN' => 'Orden',
            'ESTATUS' => 'Estatus',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSegFletes()
    {
        return $this->hasMany(SegFlete::className(), ['PASOS_ID' => 'ID']);
    }

    /**
     * @inheritdoc
     * @return PasosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PasosQuery(get_called_class());
    }
}
