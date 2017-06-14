<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%puerto}}".
 *
 * @property string $ID
 * @property string $ESTADO_ID
 * @property string $NOMBRE
 * @property string $ESTATUS
 *
 * @property Carga[] $cargas
 * @property Estado $eSTADO
 */
class Puerto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%puerto}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ESTADO_ID'], 'required'],
            [['ESTADO_ID', 'ESTATUS'], 'integer'],
            [['NOMBRE'], 'string', 'max' => 150],
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
            'ESTATUS' => 'Estatus',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCargas()
    {
        return $this->hasMany(Carga::className(), ['PUERTO_ID' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getESTADO()
    {
        return $this->hasOne(Estado::className(), ['ID' => 'ESTADO_ID']);
    }

    /**
     * @inheritdoc
     * @return PuertoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PuertoQuery(get_called_class());
    }
}
