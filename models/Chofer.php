<?php

namespace app\models;
use yii\base\model;
use Yii;

/**
 * This is the model class for table "{{%chofer}}".
 *
 * @property string $ID
 * @property string $CEDULA
 * @property string $PRIMER_NOMBRE
 * @property string $SEGUNDO_NOMBRE
 * @property string $PRIMER_APELLIDO
 * @property string $SEGUNDO_APELLIDO
 * @property string $RIF
 * @property string $DIRECCION
 * @property string $CORREO
 * @property string $TELEFONO_1
 * @property string $TELEFONO_2
 * @property string $FE_VENCE_CER
 * @property string $FE_VENCE_LIC
 * @property string $IMG_CEDULA
 * @property string $IMG_LICENCIA
 * @property string $IMG_CERTIFICADO
 * @property string $ESTATUS
 *
 * @property EmpresaChofer[] $empresaChofers
 */
class Chofer extends \yii\db\ActiveRecord
{
    public $file;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%chofer}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CEDULA', 'PRIMER_NOMBRE', 'PRIMER_APELLIDO', 'DIRECCION', 'TELEFONO_1'], 'required'],
            [['TELEFONO_1', 'TELEFONO_2'], 'integer'],
            [['FE_VENCE_CER', 'FE_VENCE_LIC'], 'safe'],
            [['ESTATUS'], 'string'],
            [['CEDULA', 'RIF'], 'string', 'max' => 10],
            [['PRIMER_NOMBRE', 'SEGUNDO_NOMBRE', 'PRIMER_APELLIDO', 'SEGUNDO_APELLIDO'], 'string', 'max' => 30],
            [['DIRECCION'], 'string', 'max' => 250],
            [['CORREO', 'IMG_CEDULA', 'IMG_LICENCIA'], 'string', 'max' => 200],
            [['file'], 'file', 
            'skipOnEmpty' => true,
            //'uploadRequired' => 'No has seleccionado ningún archivo', //Error
            'maxSize' => 1024*1024*1, //1 MB
            'tooBig' => 'El tamaño máximo permitido es 1MB', //Error
            'minSize' => 10, //10 Bytes
            'tooSmall' => 'El tamaño mínimo permitido son 10 BYTES', //Error
            'extensions' => 'jpg, jpeg',
            'wrongExtension' => 'El archivo {file} no contiene una extensión permitida {extensions}', //Error
            'maxFiles' => 4,
            'tooMany' => 'El máximo de archivos permitidos son {limit}', //Error
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'CEDULA' => 'Cedula',
            'PRIMER_NOMBRE' => 'Primer  Nombre',
            'SEGUNDO_NOMBRE' => 'Segundo  Nombre',
            'PRIMER_APELLIDO' => 'Primer  Apellido',
            'SEGUNDO_APELLIDO' => 'Segundo  Apellido',
            'RIF' => 'Rif',
            'DIRECCION' => 'Direccion de Habitacion',
            'CORREO' => 'Correo Electronico',
            'TELEFONO_1' => 'Telefono Principal',
            'TELEFONO_2' => 'Telefono Alternativo',
            'FE_VENCE_CER' => 'Fecha de Vencimiento del Certificado Medico',
            'FE_VENCE_LIC' => 'Fecha de Vencimiento de la Licencia',
            'IMG_CEDULA' => 'Imagen  Cedula',
            'IMG_LICENCIA' => 'Imgagen  Licencia',
            'IMG_CERTIFICADO' => 'Imagen Certificado Medico',
            'ESTATUS' => 'Estatus',
            'file' => 'Seleccionar Imagen Certificado Medico:',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpresaChofers()
    {
        return $this->hasMany(EmpresaChofer::className(), ['CHOFER_ID' => 'ID']);
    }

    /**
     * @inheritdoc
     * @return ChoferQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ChoferQuery(get_called_class());
    }
}

