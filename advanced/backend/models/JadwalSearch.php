<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Jadwal;

/**
 * JadwalSearch represents the model behind the search form of `backend\models\Jadwal`.
 */
class JadwalSearch extends Jadwal
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['U_ID', 'A_ID'], 'integer'],
            [['U_TANGGAL', 'U_DIBUAT'], 'safe'],
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
        $query = Jadwal::find();

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
            'U_ID' => $this->U_ID,
            'A_ID' => $this->A_ID,
            'U_TANGGAL' => $this->U_TANGGAL,
            'U_DIBUAT' => $this->U_DIBUAT,
        ]);

        return $dataProvider;
    }
}
