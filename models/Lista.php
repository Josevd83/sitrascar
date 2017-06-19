<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%lista}}".
 *
 * @property string $ID
 * @property string $DISTRIBUCION_ID
 * @property string $FECHA_CREACION
 * @property string $ESTATUS_LISTA
 *
 * @property Flete[] $fletes
 * @property Distribucion $dISTRIBUCION
 */
class Lista extends \yii\db\ActiveRecord
{
    public $empresa;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%lista}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DISTRIBUCION_ID','FECHA_CREACION'], 'required'],
            [['DISTRIBUCION_ID', 'ESTATUS_LISTA'], 'integer'],
            //[['FECHA_CREACION'], 'safe'],
            [['DISTRIBUCION_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Distribucion::className(), 'targetAttribute' => ['DISTRIBUCION_ID' => 'ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'DISTRIBUCION_ID' => 'Distribucion',
            'FECHA_CREACION' => 'Fecha  Creacion',
            'ESTATUS_LISTA' => 'Estatus  Lista',
            'empresa' => 'Empresa',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFletes()
    {
        return $this->hasMany(Flete::className(), ['LISTA_ID' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDISTRIBUCION()
    {
        return $this->hasOne(Distribucion::className(), ['ID' => 'DISTRIBUCION_ID']);
    }

    /**
     * @inheritdoc
     * @return ListaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ListaQuery(get_called_class());
    }

    public function getChoferesDisponibles()
    {
        //$choferes = Chofer::find()->order(['PRIMER_APELLIDO', 'PRIMER_NOMBRE'])->asArray()->all();
        $choferes = Chofer::find()->asArray()->all();
        $items = ArrayHelper::map($choferes, 'ID', 'CEDULA');
        return $items;
    }
}
