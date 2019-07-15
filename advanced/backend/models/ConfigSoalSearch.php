<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\ConfigSoal;

/**
 * ConfigSoalSearch represents the model behind the search form of `backend\models\ConfigSoal`.
 */
class ConfigSoalSearch extends ConfigSoal
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['C_ID', 'K_ID', 'S_ID', 'C_JUMLAH'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = ConfigSoal::find();

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
            'C_ID' => $this->C_ID,
            'K_ID' => $this->K_ID,
            'S_ID' => $this->S_ID,
            'C_JUMLAH' => $this->C_JUMLAH,
        ]);

        return $dataProvider;
    }
}
