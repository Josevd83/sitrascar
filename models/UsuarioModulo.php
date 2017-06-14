<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%usuario_modulo}}".
 *
 * @property string $ID
 * @property string $USUARIO_ID
 * @property string $MODULO_ID
 * @property string $CONSULTA
 * @property string $INSERTA
 * @property string $ACTUALIZA
 *
 * @property Modulo $mODULO
 * @property Usuario $uSUARIO
 */
class UsuarioModulo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%usuario_modulo}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['USUARIO_ID', 'MODULO_ID'], 'required'],
            [['USUARIO_ID', 'MODULO_ID', 'CONSULTA', 'INSERTA', 'ACTUALIZA'], 'integer'],
            [['MODULO_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Modulo::className(), 'targetAttribute' => ['MODULO_ID' => 'ID']],
            [['USUARIO_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['USUARIO_ID' => 'ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'USUARIO_ID' => 'Usuario  ID',
            'MODULO_ID' => 'Modulo  ID',
            'CONSULTA' => 'Consulta',
            'INSERTA' => 'Inserta',
            'ACTUALIZA' => 'Actualiza',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMODULO()
    {
        return $this->hasOne(Modulo::className(), ['ID' => 'MODULO_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUSUARIO()
    {
        return $this->hasOne(Usuario::className(), ['ID' => 'USUARIO_ID']);
    }

    /**
     * @inheritdoc
     * @return UsuarioModuloQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UsuarioModuloQuery(get_called_class());
    }
}
