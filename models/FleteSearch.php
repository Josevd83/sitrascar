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
            [['ID', 'ESTATUS_FLETE_ID', 'EMPRESA_CHOFER_ID', 'VEHICULO_ID', 'LISTA_ID', 'GUIA_SADA', 'DIAS_VENCE_GS', 'ORDEN_PESO_CARGA', 'ORDEN_CARGA_CVA', 'ORDEN_CARGA_TQ', 'GUIA_RECEP'], 'integer'],
            [['FE_EMISION_GS', 'FE_VENCE_GS', 'FE_EMISION_OPC', 'FE_EMISION_OCCVA', 'FE_EMISION_OCTQ', 'FE_IN_BOL', 'FE_PE_TARA_BOL', 'FE_PE_CAR_BOL', 'FE_OUT_BOL', 'FE_IN_CEN', 'FE_PE_CAR_CEN', 'FE_PE_TARA_CEN', 'OBSERVACIONES'], 'safe'],
            [['PESO_TARA_BOL', 'PESO_CAR_BOL', 'PESO_CAR_CEN', 'PE_TARA_CEN', 'PESO_CARGA', 'PESO_DESCARGA', 'FALTANTE'], 'number'],
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
            'ESTATUS_FLETE_ID' => $this->ESTATUS_FLETE_ID,
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
            'FE_IN_BOL' => $this->FE_IN_BOL,
            'FE_PE_TARA_BOL' => $this->FE_PE_TARA_BOL,
            'PESO_TARA_BOL' => $this->PESO_TARA_BOL,
            'FE_PE_CAR_BOL' => $this->FE_PE_CAR_BOL,
            'PESO_CAR_BOL' => $this->PESO_CAR_BOL,
            'FE_OUT_BOL' => $this->FE_OUT_BOL,
            'FE_IN_CEN' => $this->FE_IN_CEN,
            'FE_PE_CAR_CEN' => $this->FE_PE_CAR_CEN,
            'PESO_CAR_CEN' => $this->PESO_CAR_CEN,
            'FE_PE_TARA_CEN' => $this->FE_PE_TARA_CEN,
            'PE_TARA_CEN' => $this->PE_TARA_CEN,
            'PESO_CARGA' => $this->PESO_CARGA,
            'PESO_DESCARGA' => $this->PESO_DESCARGA,
            'FALTANTE' => $this->FALTANTE,
            'GUIA_RECEP' => $this->GUIA_RECEP,
        ]);

        $query->andFilterWhere(['like', 'OBSERVACIONES', $this->OBSERVACIONES]);

        return $dataProvider;
    }
}
