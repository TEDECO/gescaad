<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Competency;

/**
 * CompetencySearch represents the model behind the search form of `common\models\Competency`.
 */
class CompetencySearch extends Competency
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['com_id'], 'integer'],
            [['com_name', 'com_description', 'com_code'], 'safe'],
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
        $query = Competency::find();

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
            'com_id' => $this->com_id,
        ]);

        $query->andFilterWhere(['like', 'com_name', $this->com_name])
            ->andFilterWhere(['like', 'com_description', $this->com_description])
            ->andFilterWhere(['like', 'com_code', $this->com_code]);

        return $dataProvider;
    }
}
