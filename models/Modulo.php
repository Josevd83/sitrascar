<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%modulo}}".
 *
 * @property string $ID
 * @property string $NOMBRE
 * @property string $URL
 * @property string $ESTATUS
 *
 * @property Auditoria[] $auditorias
 * @property UsuarioModulo[] $usuarioModulos
 */
class Modulo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%modulo}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ESTATUS'], 'string'],
            [['NOMBRE'], 'string', 'max' => 30],
            [['URL'], 'string', 'max' => 100],
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
            'URL' => 'Url',
            'ESTATUS' => 'Estatus',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuditorias()
    {
        return $this->hasMany(Auditoria::className(), ['MODULO_ID' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioModulos()
    {
        return $this->hasMany(UsuarioModulo::className(), ['MODULO_ID' => 'ID']);
    }

    /**
     * @inheritdoc
     * @return ModuloQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ModuloQuery(get_called_class());
    }
}
