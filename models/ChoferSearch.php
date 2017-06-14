<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Chofer;

/**
 * ChoferSearch represents the model behind the search form about `app\models\Chofer`.
 */
class ChoferSearch extends Chofer
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'TELEFONO_1', 'TELEFONO_2'], 'integer'],
            [['CEDULA', 'PRIMER_NOMBRE', 'SEGUNDO_NOMBRE', 'PRIMER_APELLIDO', 'SEGUNDO_APELLIDO', 'RIF', 'DIRECCION', 'CORREO', 'FE_VENCE_CER', 'FE_VENCE_LIC', 'IMG_CEDULA', 'IMG_LICENCIA', 'IMG_CERTIFICADO', 'ESTATUS'], 'safe'],
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
        $query = Chofer::find();

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
            'TELEFONO_1' => $this->TELEFONO_1,
            'TELEFONO_2' => $this->TELEFONO_2,
            'FE_VENCE_CER' => $this->FE_VENCE_CER,
            'FE_VENCE_LIC' => $this->FE_VENCE_LIC,
        ]);

        $query->andFilterWhere(['like', 'CEDULA', $this->CEDULA])
            ->andFilterWhere(['like', 'PRIMER_NOMBRE', $this->PRIMER_NOMBRE])
            ->andFilterWhere(['like', 'SEGUNDO_NOMBRE', $this->SEGUNDO_NOMBRE])
            ->andFilterWhere(['like', 'PRIMER_APELLIDO', $this->PRIMER_APELLIDO])
            ->andFilterWhere(['like', 'SEGUNDO_APELLIDO', $this->SEGUNDO_APELLIDO])
            ->andFilterWhere(['like', 'RIF', $this->RIF])
            ->andFilterWhere(['like', 'DIRECCION', $this->DIRECCION])
            ->andFilterWhere(['like', 'CORREO', $this->CORREO])
            ->andFilterWhere(['like', 'IMG_CEDULA', $this->IMG_CEDULA])
            ->andFilterWhere(['like', 'IMG_LICENCIA', $this->IMG_LICENCIA])
            ->andFilterWhere(['like', 'IMG_CERTIFICADO', $this->IMG_CERTIFICADO])
            ->andFilterWhere(['like', 'ESTATUS', $this->ESTATUS]);

        return $dataProvider;
    }
}
