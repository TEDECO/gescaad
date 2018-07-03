<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Video;

/**
 * VideoSearch represents the model behind the search form of `common\models\Video`.
 */
class VideoSearch extends Video
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['vid_id', 'languageLocalization_lan_id', 'vid_duration'], 'integer'],
            [['vid_name', 'vid_file', 'vid_url'], 'safe'],
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
        $query = Video::find();

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
            'vid_id' => $this->vid_id,
            'languageLocalization_lan_id' => $this->languageLocalization_lan_id,
            'vid_duration' => $this->vid_duration,
        ]);

        $query->andFilterWhere(['like', 'vid_name', $this->vid_name])
            ->andFilterWhere(['like', 'vid_file', $this->vid_file])
            ->andFilterWhere(['like', 'vid_url', $this->vid_url]);

        return $dataProvider;
    }
}
