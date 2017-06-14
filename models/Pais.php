<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%pais}}".
 *
 * @property string $ID
 * @property string $NOMBRE
 *
 * @property Carga[] $cargas
 */
class Pais extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%pais}}';
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
        return $this->hasMany(Carga::className(), ['PAIS_ID' => 'ID']);
    }

    /**
     * @inheritdoc
     * @return PaisQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PaisQuery(get_called_class());
    }
}
