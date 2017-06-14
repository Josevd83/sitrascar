<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Vehiculo;

/**
 * VehiculoSearch represents the model behind the search form about `app\models\Vehiculo`.
 */
class VehiculoSearch extends Vehiculo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'EMPRESA_ID', 'CAPACIDAD', 'SROP', 'NRO_PRC'], 'integer'],
            [['PLACA_CHUTO', 'MARCA', 'MODELO', 'SERIAL', 'PLACA_REMOLQUE', 'COLOR', 'FE_VENCE_PRC', 'IMG_CARNET', 'ESTATUS'], 'safe'],
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
        $query = Vehiculo::find();

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

        // grid filtering conditions
        $query->andFilterWhere([
            'ID' => $this->ID,
            'EMPRESA_ID' => $this->EMPRESA_ID,
            'CAPACIDAD' => $this->CAPACIDAD,
            'SROP' => $this->SROP,
            'NRO_PRC' => $this->NRO_PRC,
            'FE_VENCE_PRC' => $this->FE_VENCE_PRC,
        ]);

        $query->andFilterWhere(['like', 'PLACA_CHUTO', $this->PLACA_CHUTO])
            ->andFilterWhere(['like', 'MARCA', $this->MARCA])
            ->andFilterWhere(['like', 'MODELO', $this->MODELO])
            ->andFilterWhere(['like', 'SERIAL', $this->SERIAL])
            ->andFilterWhere(['like', 'PLACA_REMOLQUE', $this->PLACA_REMOLQUE])
            ->andFilterWhere(['like', 'COLOR', $this->COLOR])
            ->andFilterWhere(['like', 'IMG_CARNET', $this->IMG_CARNET])
            ->andFilterWhere(['like', 'ESTATUS', $this->ESTATUS]);

        return $dataProvider;
    }
}
