<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Segflete;

/**
 * SegfleteSearch represents the model behind the search form about `app\models\Segflete`.
 */
class SegfleteSearch extends Segflete
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'PASOS_ID', 'FLETE_ID', 'PESO'], 'integer'],
            [['FECHA', 'OBSERVACIONES'], 'safe'],
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
        $query = Segflete::find();

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
            'PASOS_ID' => $this->PASOS_ID,
            'FLETE_ID' => $this->FLETE_ID,
            'FECHA' => $this->FECHA,
            'PESO' => $this->PESO,
        ]);

        $query->andFilterWhere(['like', 'OBSERVACIONES', $this->OBSERVACIONES]);

        return $dataProvider;
    }
}
