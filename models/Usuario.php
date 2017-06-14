<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%usuario}}".
 *
 * @property string $ID
 * @property string $USUARIO
 * @property string $CLAVE
 * @property string $PRIMER_NOMBRE
 * @property string $SEGUNDO_NOMBRE
 * @property string $PRIMER_APELLIDO
 * @property string $SEGUNDO_APELLIDO
 * @property string $CEDULA
 * @property string $CORREO
 * @property string $TELEFONO
 * @property string $ESTATUS
 *
 * @property Auditoria[] $auditorias
 * @property UsuarioModulo[] $usuarioModulos
 */
class Usuario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%usuario}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['USUARIO', 'CLAVE'], 'required'],
            [['TELEFONO'], 'integer'],
            [['ESTATUS'], 'string'],
            [['USUARIO', 'CEDULA'], 'string', 'max' => 10],
            [['CLAVE'], 'string', 'max' => 50],
            [['PRIMER_NOMBRE', 'SEGUNDO_NOMBRE', 'PRIMER_APELLIDO', 'SEGUNDO_APELLIDO'], 'string', 'max' => 100],
            [['CORREO'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'USUARIO' => 'Usuario',
            'CLAVE' => 'Clave',
            'PRIMER_NOMBRE' => 'Primer  Nombre',
            'SEGUNDO_NOMBRE' => 'Segundo  Nombre',
            'PRIMER_APELLIDO' => 'Primer  Apellido',
            'SEGUNDO_APELLIDO' => 'Segundo  Apellido',
            'CEDULA' => 'Cedula',
            'CORREO' => 'Correo',
            'TELEFONO' => 'Telefono',
            'ESTATUS' => 'Estatus',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuditorias()
    {
        return $this->hasMany(Auditoria::className(), ['USUARIO_ID' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioModulos()
    {
        return $this->hasMany(UsuarioModulo::className(), ['USUARIO_ID' => 'ID']);
    }

    /**
     * @inheritdoc
     * @return UsuarioQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UsuarioQuery(get_called_class());
    }
}
