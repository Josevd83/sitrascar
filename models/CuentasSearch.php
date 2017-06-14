<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Cuentas;

/**
 * CuentasSearch represents the model behind the search form about `app\models\Cuentas`.
 */
class CuentasSearch extends Cuentas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'NRO_CUENTA'], 'integer'],
            [['BANCO', 'TIPO', 'CEDULA_RIF', 'TITULAR', 'ESTATUS', 'EMPRESA_ID'], 'safe'],
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
        $query = Cuentas::find();

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
        $query->joinWith('eMPRESA');
        
        // grid filtering conditions
        $query->andFilterWhere([
            'ID' => $this->ID,
            'NRO_CUENTA' => $this->NRO_CUENTA,
        ]);

        $query->andFilterWhere(['like', 'BANCO', $this->BANCO])
            ->andFilterWhere(['like', 'TIPO', $this->TIPO])
            ->andFilterWhere(['like', 'CEDULA_RIF', $this->CEDULA_RIF])
            ->andFilterWhere(['like', 'TITULAR', $this->TITULAR])
            ->andFilterWhere(['like', 'ESTATUS', $this->ESTATUS])
            ->andFilterWhere(['like', 'eMPRESA.NOMBRE', $this->EMPRESA_ID]);

        return $dataProvider;
    }
}
