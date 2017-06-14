<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%rubros}}".
 *
 * @property string $ID
 * @property string $NOMBRE
 *
 * @property Carga[] $cargas
 */
class Rubros extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%rubros}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCargas()
    {
        return $this->hasMany(Carga::className(), ['RUBROS_ID' => 'ID']);
    }

    /**
     * @inheritdoc
     * @return RubrosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RubrosQuery(get_called_class());
    }
}
