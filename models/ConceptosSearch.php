<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Conceptos;

/**
 * ConceptosSearch represents the model behind the search form about `app\models\Conceptos`.
 */
class ConceptosSearch extends Conceptos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'NOMBRE', 'SIGNO'], 'integer'],
            [['FORMULA', 'ESTATUS'], 'safe'],
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
        $query = Conceptos::find();

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
            'NOMBRE' => $this->NOMBRE,
            'SIGNO' => $this->SIGNO,
        ]);

        $query->andFilterWhere(['like', 'FORMULA', $this->FORMULA])
            ->andFilterWhere(['like', 'ESTATUS', $this->ESTATUS]);

        return $dataProvider;
    }
}