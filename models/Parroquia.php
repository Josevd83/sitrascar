<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%parroquia}}".
 *
 * @property string $ID
 * @property string $MUNICIPIO_ID
 * @property string $NOMBRE
 *
 * @property Centrales[] $centrales
 * @property Municipio $mUNICIPIO
 */
class Parroquia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%parroquia}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['MUNICIPIO_ID'], 'required'],
            [['MUNICIPIO_ID'], 'integer'],
            [['NOMBRE'], 'string', 'max' => 100],
            [['MUNICIPIO_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Municipio::className(), 'targetAttribute' => ['MUNICIPIO_ID' => 'ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'MUNICIPIO_ID' => 'Municipio  ID',
            'NOMBRE' => 'Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCentrales()
    {
        return $this->hasMany(Centrales::className(), ['PARROQUIA_ID' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMUNICIPIO()
    {
        return $this->hasOne(Municipio::className(), ['ID' => 'MUNICIPIO_ID']);
    }

    /**
     * @inheritdoc
     * @return ParroquiaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ParroquiaQuery(get_called_class());
    }
}
