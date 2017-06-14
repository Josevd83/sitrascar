<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Empresa;

/**
 * EmpresaSearch represents the model behind the search form about `app\models\Empresa`.
 */
class EmpresaSearch extends Empresa
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'CERT_SUNACCOP', 'CERT_INPSASEL', 'TELEFONO_1', 'TELEFONO_2'], 'integer'],
            [['RIF', 'NOMBRE', 'DIRECCION', 'CORREO', 'ESTATUS'], 'safe'],
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
        $query = Empresa::find();

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
            'CERT_SUNACCOP' => $this->CERT_SUNACCOP,
            'CERT_INPSASEL' => $this->CERT_INPSASEL,
            'TELEFONO_1' => $this->TELEFONO_1,
            'TELEFONO_2' => $this->TELEFONO_2,
        ]);

        $query->andFilterWhere(['like', 'RIF', $this->RIF])
            ->andFilterWhere(['like', 'NOMBRE', $this->NOMBRE])
            ->andFilterWhere(['like', 'DIRECCION', $this->DIRECCION])
            ->andFilterWhere(['like', 'CORREO', $this->CORREO])
            ->andFilterWhere(['like', 'ESTATUS', $this->ESTATUS]);

        return $dataProvider;
    }
}
