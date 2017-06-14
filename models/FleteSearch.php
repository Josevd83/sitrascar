<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Flete;

/**
 * FleteSearch represents the model behind the search form about `app\models\Flete`.
 */
class FleteSearch extends Flete
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'EMPRESA_CHOFER_ID', 'VEHICULO_ID', 'LISTA_ID', 'GUIA_SADA', 'DIAS_VENCE_GS', 'ORDEN_PESO_CARGA', 'ORDEN_CARGA_CVA', 'ORDEN_CARGA_TQ', 'PESO_CARGA', 'PESO_DESCARGA', 'GUIA_RECEPCION', 'ESTATUS_FLETE'], 'integer'],
            [['FE_EMISION_GS', 'FE_VENCE_GS', 'FE_EMISION_OPC', 'FE_EMISION_OCCVA', 'FE_EMISION_OCTQ', 'OBSERVACIONES'], 'safe'],
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
        $query = Flete::find();

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
            'EMPRESA_CHOFER_ID' => $this->EMPRESA_CHOFER_ID,
            'VEHICULO_ID' => $this->VEHICULO_ID,
            'LISTA_ID' => $this->LISTA_ID,
            'GUIA_SADA' => $this->GUIA_SADA,
            'FE_EMISION_GS' => $this->FE_EMISION_GS,
            'DIAS_VENCE_GS' => $this->DIAS_VENCE_GS,
            'FE_VENCE_GS' => $this->FE_VENCE_GS,
            'ORDEN_PESO_CARGA' => $this->ORDEN_PESO_CARGA,
            'FE_EMISION_OPC' => $this->FE_EMISION_OPC,
            'ORDEN_CARGA_CVA' => $this->ORDEN_CARGA_CVA,
            'FE_EMISION_OCCVA' => $this->FE_EMISION_OCCVA,
            'ORDEN_CARGA_TQ' => $this->ORDEN_CARGA_TQ,
            'FE_EMISION_OCTQ' => $this->FE_EMISION_OCTQ,
            'PESO_CARGA' => $this->PESO_CARGA,
            'PESO_DESCARGA' => $this->PESO_DESCARGA,
            'GUIA_RECEPCION' => $this->GUIA_RECEPCION,
            'ESTATUS_FLETE' => $this->ESTATUS_FLETE,
        ]);

        $query->andFilterWhere(['like', 'OBSERVACIONES', $this->OBSERVACIONES]);

        return $dataProvider;
    }
}
