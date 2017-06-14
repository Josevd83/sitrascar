<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%buque}}".
 *
 * @property string $ID
 * @property string $NOMBRE
 * @property string $ESTATUS
 *
 * @property Carga[] $cargas
 */
class Buque extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%buque}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
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
            'ESTATUS' => 'Estatus',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCargas()
    {
        return $this->hasMany(Carga::className(), ['BUQUE_ID' => 'ID']);
    }

    /**
     * @inheritdoc
     * @return BuqueQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BuqueQuery(get_called_class());
    }
}
