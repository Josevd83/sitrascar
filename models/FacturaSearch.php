<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Factura;

/**
 * FacturaSearch represents the model behind the search form about `app\models\Factura`.
 */
class FacturaSearch extends Factura
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'CUENTAS_ID', 'PAGOS_ID', 'MONTO_TOTAL', 'TOTAL_ANTICIPOS', 'TOTAL_DESCUENTOS', 'NETO_COBRAR', 'ESTATUS_FAC'], 'integer'],
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
        $query = Factura::find();

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
            'CUENTAS_ID' => $this->CUENTAS_ID,
            'PAGOS_ID' => $this->PAGOS_ID,
            'MONTO_TOTAL' => $this->MONTO_TOTAL,
            'TOTAL_ANTICIPOS' => $this->TOTAL_ANTICIPOS,
            'TOTAL_DESCUENTOS' => $this->TOTAL_DESCUENTOS,
            'NETO_COBRAR' => $this->NETO_COBRAR,
            'ESTATUS_FAC' => $this->ESTATUS_FAC,
        ]);

        return $dataProvider;
    }
}
