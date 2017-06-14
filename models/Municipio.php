<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%municipio}}".
 *
 * @property string $ID
 * @property string $ESTADO_ID
 * @property string $NOMBRE
 *
 * @property Centrales[] $centrales
 * @property Estado $eSTADO
 * @property Parroquia[] $parroquias
 */
class Municipio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%municipio}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ESTADO_ID'], 'required'],
            [['ESTADO_ID'], 'integer'],
            [['NOMBRE'], 'string', 'max' => 100],
            [['ESTADO_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Estado::className(), 'targetAttribute' => ['ESTADO_ID' => 'ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'ESTADO_ID' => 'Estado  ID',
            'NOMBRE' => 'Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCentrales()
    {
        return $this->hasMany(Centrales::className(), ['MUNICIPIO_ID' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getESTADO()
    {
        return $this->hasOne(Estado::className(), ['ID' => 'ESTADO_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParroquias()
    {
        return $this->hasMany(Parroquia::className(), ['MUNICIPIO_ID' => 'ID']);
    }

    /**
     * @inheritdoc
     * @return MunicipioQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MunicipioQuery(get_called_class());
    }
}
