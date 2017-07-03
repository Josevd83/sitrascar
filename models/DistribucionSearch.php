<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Distribucion;

/**
 * DistribucionSearch represents the model behind the search form about `app\models\Distribucion`.
 */
class DistribucionSearch extends Distribucion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'CARGA_ID', 'CANTIDAD', 'CANT_FLETES', 'DIAS_VENCE_PI', 'CODIGO_SICA', 'CANT_DESPACHADA', 'ESTATUS_DIS'], 'integer'],
            [['FE_ASIGNACION', 'PERMISO_INSAI', 'FE_EMISION_PI', 'FE_VENCE_PI', 'OBSERVACIONES', 'FE_REGISTRO', 'CENTRALES_ID','DESCRIPCION'], 'safe'],
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
        $query = Distribucion::find();

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
        $query->joinWith('cENTRALES');

        // grid filtering conditions
        $query->andFilterWhere([
            'ID' => $this->ID,
            'CARGA_ID' => $this->CARGA_ID,
            'CANTIDAD' => $this->CANTIDAD,
            'FE_ASIGNACION' => $this->FE_ASIGNACION,
            'CANT_FLETES' => $this->CANT_FLETES,
            'FE_EMISION_PI' => $this->FE_EMISION_PI,
            'DIAS_VENCE_PI' => $this->DIAS_VENCE_PI,
            'FE_VENCE_PI' => $this->FE_VENCE_PI,
            'CODIGO_SICA' => $this->CODIGO_SICA,
            'CANT_DESPACHADA' => $this->CANT_DESPACHADA,
            'FE_REGISTRO' => $this->FE_REGISTRO,
            'ESTATUS_DIS' => $this->ESTATUS_DIS,
        ]);

        $query->andFilterWhere(['like', 'PERMISO_INSAI', $this->PERMISO_INSAI])
            ->andFilterWhere(['like', 'OBSERVACIONES', $this->OBSERVACIONES])
            ->andFilterWhere(['like', 'DESCRIPCION', $this->DESCRIPCION])
            ->andFilterWhere(['like', 'cENTRALES.NOMBRE', $this->CENTRALES_ID]);
            

        return $dataProvider;
    }
}
