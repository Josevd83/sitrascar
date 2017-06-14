<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Auditoria;

/**
 * AuditoriaSearch represents the model behind the search form about `app\models\Auditoria`.
 */
class AuditoriaSearch extends Auditoria
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'MODULO_ID', 'USUARIO_ID', 'ID_REGISTRO'], 'integer'],
            [['FECHA', 'TABLA', 'CAMPO', 'DATO_ANTERIOR', 'DATO_NUEVO'], 'safe'],
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
        $query = Auditoria::find();

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
            'MODULO_ID' => $this->MODULO_ID,
            'USUARIO_ID' => $this->USUARIO_ID,
            'FECHA' => $this->FECHA,
            'ID_REGISTRO' => $this->ID_REGISTRO,
        ]);

        $query->andFilterWhere(['like', 'TABLA', $this->TABLA])
            ->andFilterWhere(['like', 'CAMPO', $this->CAMPO])
            ->andFilterWhere(['like', 'DATO_ANTERIOR', $this->DATO_ANTERIOR])
            ->andFilterWhere(['like', 'DATO_NUEVO', $this->DATO_NUEVO]);

        return $dataProvider;
    }
}
