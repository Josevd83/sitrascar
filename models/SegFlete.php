<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%seg_flete}}".
 *
 * @property string $ID
 * @property string $PASOS_ID
 * @property string $FLETE_ID
 * @property string $FECHA
 * @property string $PESO
 * @property string $OBSERVACIONES
 *
 * @property Flete $fLETE
 * @property Pasos $pASOS
 */
class SegFlete extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%seg_flete}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PASOS_ID', 'FLETE_ID'], 'required'],
            [['PASOS_ID', 'FLETE_ID', 'PESO'], 'integer'],
            [['FECHA'], 'safe'],
            [['OBSERVACIONES'], 'string'],
            [['FLETE_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Flete::className(), 'targetAttribute' => ['FLETE_ID' => 'ID']],
            [['PASOS_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Pasos::className(), 'targetAttribute' => ['PASOS_ID' => 'ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'PASOS_ID' => 'Pasos  ID',
            'FLETE_ID' => 'Flete  ID',
            'FECHA' => 'Fecha',
            'PESO' => 'Peso',
            'OBSERVACIONES' => 'Observaciones',
        ];
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
    public function getPASOS()
    {
        return $this->hasOne(Pasos::className(), ['ID' => 'PASOS_ID']);
    }

    /**
     * @inheritdoc
     * @return SegFleteQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SegFleteQuery(get_called_class());
    }
}
