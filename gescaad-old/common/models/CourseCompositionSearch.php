<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\CourseComposition;

/**
 * CourseCompositionSearch represents the model behind the search form of `common\models\CourseComposition`.
 */
class CourseCompositionSearch extends CourseComposition
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cco_id', 'course_cou_id', 'video_vid_id', 'cco_order'], 'integer'],
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
        $query = CourseComposition::find();

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
            'cco_id' => $this->cco_id,
            'course_cou_id' => $this->course_cou_id,
            'video_vid_id' => $this->video_vid_id,
            'cco_order' => $this->cco_order,
        ]);

        return $dataProvider;
    }
}
