<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Empresachofer;

/**
 * EmpresachoferSearch represents the model behind the search form about `app\models\Empresachofer`.
 */
class EmpresachoferSearch extends Empresachofer
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'VEHICULO_ID', 'EMPRESA_ID', 'CHOFER_ID'], 'integer'],
            [['BLOQUEADO'], 'safe'],
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
        $query = Empresachofer::find();

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
            'VEHICULO_ID' => $this->VEHICULO_ID,
            'EMPRESA_ID' => $this->EMPRESA_ID,
            'CHOFER_ID' => $this->CHOFER_ID,
        ]);

        $query->andFilterWhere(['like', 'BLOQUEADO', $this->BLOQUEADO]);

        return $dataProvider;
    }
}
