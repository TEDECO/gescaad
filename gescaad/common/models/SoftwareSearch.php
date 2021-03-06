<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Software;

/**
 * SoftwareSearch represents the model behind the search form of `common\models\Software`.
 */
class SoftwareSearch extends Software
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sof_id'], 'integer'],
            [['sof_name', 'sof_release'], 'safe'],
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
        $query = Software::find();

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
            'sof_id' => $this->sof_id,
        ]);

        $query->andFilterWhere(['like', 'sof_name', $this->sof_name])
            ->andFilterWhere(['like', 'sof_release', $this->sof_release]);

        return $dataProvider;
    }
}
