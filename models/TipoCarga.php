<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipo_carga".
 *
 * @property string $ID
 * @property string $NOMBRE
 *
 * @property Carga[] $cargas
 */
class TipoCarga extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipo_carga';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NOMBRE'], 'string', 'max' => 50],
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
        return $this->hasMany(Carga::className(), ['TIPO_CARGA_ID' => 'ID']);
    }

    /**
     * @inheritdoc
     * @return TipoCargaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TipoCargaQuery(get_called_class());
    }
}
