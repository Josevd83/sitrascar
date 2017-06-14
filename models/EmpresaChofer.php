<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%empresa_chofer}}".
 *
 * @property string $ID
 * @property string $VEHICULO_ID
 * @property string $EMPRESA_ID
 * @property string $CHOFER_ID
 * @property string $BLOQUEADO
 *
 * @property Chofer $cHOFER
 * @property Empresa $eMPRESA
 * @property Vehiculo $vEHICULO
 * @property Flete[] $fletes
 */
class EmpresaChofer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%empresa_chofer}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['VEHICULO_ID', 'EMPRESA_ID', 'CHOFER_ID'], 'required'],
            [['VEHICULO_ID', 'EMPRESA_ID', 'CHOFER_ID'], 'integer'],
            [['BLOQUEADO'], 'string'],
            [['CHOFER_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Chofer::className(), 'targetAttribute' => ['CHOFER_ID' => 'ID']],
            [['EMPRESA_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Empresa::className(), 'targetAttribute' => ['EMPRESA_ID' => 'ID']],
            [['VEHICULO_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Vehiculo::className(), 'targetAttribute' => ['VEHICULO_ID' => 'ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'VEHICULO_ID' => 'Vehiculo  ID',
            'EMPRESA_ID' => 'Empresa  ID',
            'CHOFER_ID' => 'Chofer  ID',
            'BLOQUEADO' => 'Bloqueado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCHOFER()
    {
        return $this->hasOne(Chofer::className(), ['ID' => 'CHOFER_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEMPRESA()
    {
        return $this->hasOne(Empresa::className(), ['ID' => 'EMPRESA_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVEHICULO()
    {
        return $this->hasOne(Vehiculo::className(), ['ID' => 'VEHICULO_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFletes()
    {
        return $this->hasMany(Flete::className(), ['EMPRESA_CHOFER_ID' => 'ID']);
    }

    /**
     * @inheritdoc
     * @return EmpresaChoferQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EmpresaChoferQuery(get_called_class());
    }
}
