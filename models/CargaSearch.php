<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Carga;

/**
 * CargaSearch represents the model behind the search form about `app\models\Carga`.
 */
class CargaSearch extends Carga
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'TIPO_CARGA_ID', 'PUERTO_ID', 'BL', 'MUELLE', 'ESTATUS_CARGA'], 'integer'],
            [['FECHA_ATRAQUE', 'COD_VIAJE', 'FECHA_REGISTRO', 'OBSERVACIONES', 'RUBROS_ID', 'PAIS_ID', 'BUQUE_ID', 'DESCRIPCION'], 'safe'],
            [['PESO', 'PESO_ASIGNADO', 'PESO_DISTRIBUIDO'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Carga::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        $query->joinWith('rUBROS');
        $query->joinWith('pAIS');
        $query->joinWith('bUQUE');
        
        // grid filtering conditions
        $query->andFilterWhere([
            'ID' => $this->ID,
            'TIPO_CARGA_ID' => $this->TIPO_CARGA_ID,
            'PUERTO_ID' => $this->PUERTO_ID,
            'FECHA_ATRAQUE' => $this->FECHA_ATRAQUE,
            'BL' => $this->BL,
            'MUELLE' => $this->MUELLE,
            'PESO' => $this->PESO,
            'PESO_ASIGNADO' => $this->PESO_ASIGNADO,
            'ESTATUS_CARGA' => $this->ESTATUS_CARGA,
            'PESO_DISTRIBUIDO' => $this->PESO_DISTRIBUIDO,
            'FECHA_REGISTRO' => $this->FECHA_REGISTRO,
        ]);

        $query->andFilterWhere(['like', 'COD_VIAJE', $this->COD_VIAJE])
            ->andFilterWhere(['like', 'DESCRIPCION', $this->DESCRIPCION])
            ->andFilterWhere(['like', 'OBSERVACIONES', $this->OBSERVACIONES])
            ->andFilterWhere(['like', 'rUBROS.NOMBRE', $this->RUBROS_ID])
            ->andFilterWhere(['like', 'pAIS.NOMBRE', $this->PAIS_ID])
            ->andFilterWhere(['like', 'bUQUE.NOMBRE', $this->BUQUE_ID]);
        

        return $dataProvider;
    }
}
