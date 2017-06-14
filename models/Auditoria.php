<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%auditoria}}".
 *
 * @property string $ID
 * @property string $MODULO_ID
 * @property string $USUARIO_ID
 * @property string $FECHA
 * @property string $TABLA
 * @property string $ID_REGISTRO
 * @property string $CAMPO
 * @property string $DATO_ANTERIOR
 * @property string $DATO_NUEVO
 *
 * @property Usuario $uSUARIO
 * @property Modulo $mODULO
 */
class Auditoria extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%auditoria}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['MODULO_ID', 'USUARIO_ID'], 'required'],
            [['MODULO_ID', 'USUARIO_ID', 'ID_REGISTRO'], 'integer'],
            [['FECHA'], 'safe'],
            [['TABLA', 'CAMPO'], 'string', 'max' => 30],
            [['DATO_ANTERIOR', 'DATO_NUEVO'], 'string', 'max' => 200],
            [['USUARIO_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['USUARIO_ID' => 'ID']],
            [['MODULO_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Modulo::className(), 'targetAttribute' => ['MODULO_ID' => 'ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'MODULO_ID' => 'Modulo  ID',
            'USUARIO_ID' => 'Usuario  ID',
            'FECHA' => 'Fecha',
            'TABLA' => 'Tabla',
            'ID_REGISTRO' => 'Id  Registro',
            'CAMPO' => 'Campo',
            'DATO_ANTERIOR' => 'Dato  Anterior',
            'DATO_NUEVO' => 'Dato  Nuevo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUSUARIO()
    {
        return $this->hasOne(Usuario::className(), ['ID' => 'USUARIO_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMODULO()
    {
        return $this->hasOne(Modulo::className(), ['ID' => 'MODULO_ID']);
    }

    /**
     * @inheritdoc
     * @return AuditoriaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AuditoriaQuery(get_called_class());
    }
}
