<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Lista;

/**
 * ListaSearch represents the model behind the search form about `app\models\Lista`.
 */
class ListaSearch extends Lista
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'FECHA_CREACION', 'ESTATUS_LISTA'], 'integer'],
            [['DISTRIBUCION_ID'], 'safe'],
            //[['ID', 'DISTRIBUCION_ID', 'FECHA_CREACION', 'ESTATUS_LISTA'], 'integer'],
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
        $query = Lista::find();

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
        $query->joinWith('dISTRIBUCION');

        // grid filtering conditions
        $query->andFilterWhere([
            'LISTA.ID' => $this->ID,
           // 'DISTRIBUCION_ID' => $this->DISTRIBUCION_ID,
            'FECHA_CREACION' => $this->FECHA_CREACION,
            'ESTATUS_LISTA' => $this->ESTATUS_LISTA,
        ]);

        $query->andFilterWhere(['like', 'dISTRIBUCION.DESCRIPCION', $this->DISTRIBUCION_ID]);

        return $dataProvider;
    }
}
