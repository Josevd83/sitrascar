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
            [['CORREO', 'IMG_CEDULA', 'IMG_LICENCIA', 'IMG_CERTIFICADO'], 'string', 'max' => 100],
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
            'DIRECCION' => 'Direccion',
            'CORREO' => 'Correo',
            'TELEFONO_1' => 'Telefono 1',
            'TELEFONO_2' => 'Telefono 2',
            'FE_VENCE_CER' => 'Fe  Vence  Cer',
            'FE_VENCE_LIC' => 'Fe  Vence  Lic',
            'IMG_CEDULA' => 'Img  Cedula',
            'IMG_LICENCIA' => 'Img  Licencia',
            'IMG_CERTIFICADO' => 'Img  Certificado',
            'ESTATUS' => 'Estatus',
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
    class FormUpload extends model{
  
    public $IMG_CEDULA;
     
    public function rules()
    {
        return [
            ['IMG_CEDULA', 'IMG_CEDULA',                 
   'skipOnEmpty' => false,
   'uploadRequired' => 'No has seleccionado ningún archivo', //Error
   'maxSize' => 1024*1024*5, //1 MB
   'tooBig' => 'El tamaño máximo permitido es 1MB', //Error
   'minSize' => 10, //10 Bytes
   'tooSmall' => 'El tamaño mínimo permitido son 10 BYTES', //Error
   'extensions' => 'pdf, txt, doc',
   'wrongExtension' => 'El archivo {file} no contiene una extensión permitida {extensions}', //Error
   'maxFiles' => 4,
   'tooMany' => 'El máximo de archivos permitidos son {limit}', //Error
   ],
        ]; 
    } 
 
 public function attributeLabels()
 {
  return [
   'file' => 'Seleccionar archivos:',
  ];
 }
}

