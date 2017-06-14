<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%estado}}".
 *
 * @property string $ID
 * @property string $NOMBRE
 *
 * @property Centrales[] $centrales
 * @property Municipio[] $municipios
 * @property Puerto[] $puertos
 */
class Estado extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%estado}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NOMBRE'], 'string', 'max' => 150],
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
    public function getCentrales()
    {
        return $this->hasMany(Centrales::className(), ['ESTADO_ID' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMunicipios()
    {
        return $this->hasMany(Municipio::className(), ['ESTADO_ID' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPuertos()
    {
        return $this->hasMany(Puerto::className(), ['ESTADO_ID' => 'ID']);
    }

    /**
     * @inheritdoc
     * @return EstadoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EstadoQuery(get_called_class());
    }
}
