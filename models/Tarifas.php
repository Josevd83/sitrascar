<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%tarifas}}".
 *
 * @property string $ID
 * @property string $CONCEPTOS_ID
 * @property string $CENTRALES_ID
 *
 * @property Centrales $cENTRALES
 * @property Conceptos $cONCEPTOS
 */
class Tarifas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%tarifas}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CONCEPTOS_ID', 'CENTRALES_ID'], 'required'],
            [['CONCEPTOS_ID', 'CENTRALES_ID'], 'integer'],
            [['CENTRALES_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Centrales::className(), 'targetAttribute' => ['CENTRALES_ID' => 'ID']],
            [['CONCEPTOS_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Conceptos::className(), 'targetAttribute' => ['CONCEPTOS_ID' => 'ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'CONCEPTOS_ID' => 'Conceptos  ID',
            'CENTRALES_ID' => 'Centrales  ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCENTRALES()
    {
        return $this->hasOne(Centrales::className(), ['ID' => 'CENTRALES_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCONCEPTOS()
    {
        return $this->hasOne(Conceptos::className(), ['ID' => 'CONCEPTOS_ID']);
    }

    /**
     * @inheritdoc
     * @return TarifasQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TarifasQuery(get_called_class());
    }
}
