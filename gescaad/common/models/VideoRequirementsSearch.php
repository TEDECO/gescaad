<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\VideoRequirements;

/**
 * VideoRequirementsSearch represents the model behind the search form of `common\models\VideoRequirements`.
 */
class VideoRequirementsSearch extends VideoRequirements
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['vir_id', 'video_vid_id', 'competency_com_id'], 'integer'],
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
        $query = VideoRequirements::find();

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
            'vir_id' => $this->vir_id,
            'video_vid_id' => $this->video_vid_id,
            'competency_com_id' => $this->competency_com_id,
        ]);

        return $dataProvider;
    }
}
