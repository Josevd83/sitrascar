<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Centrales;

/**
 * CentralesSearch represents the model behind the search form about `app\models\Centrales`.
 */
class CentralesSearch extends Centrales
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'PARROQUIA_ID', 'MUNICIPIO_ID', 'TELEFONO_1', 'TELEFONO_2'], 'integer'],
            [['NOMBRE', 'RIF', 'DIRECCION', 'ESTATUS', 'ESTADO_ID'], 'safe'],
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
        $query = Centrales::find();

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
        $query->joinWith('eSTADO');
        
        // grid filtering conditions
        $query->andFilterWhere([
            'ID' => $this->ID,
            'PARROQUIA_ID' => $this->PARROQUIA_ID,
            'MUNICIPIO_ID' => $this->MUNICIPIO_ID,
            'TELEFONO_1' => $this->TELEFONO_1,
            'TELEFONO_2' => $this->TELEFONO_2,
        ]);

        $query->andFilterWhere(['like', 'NOMBRE', $this->NOMBRE])
            ->andFilterWhere(['like', 'RIF', $this->RIF])
            ->andFilterWhere(['like', 'DIRECCION', $this->DIRECCION])
            ->andFilterWhere(['like', 'ESTATUS', $this->ESTATUS])
            ->andFilterWhere(['like', 'eSTADO.NOMBRE', $this->ESTADO_ID]);

        return $dataProvider;
    }
}
