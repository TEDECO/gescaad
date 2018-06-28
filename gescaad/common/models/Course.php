<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "course".
 *
 * @property int $cou_id autoincremental automatic index
 * @property string $cou_name course general description .- main theme
 * @property int $cou_totalDuration automatically calculated total length of course .- dependent of courseComposition elements .- optional, only for optimization purposes (could be calculated in real time)
 *
 * @property CourseComposition[] $courseCompositions
 */
class Course extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'course';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cou_totalDuration'], 'integer'],
            [['cou_name'], 'string', 'max' => 128],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'cou_id' => Yii::t('app', 'Cou ID'),
            'cou_name' => Yii::t('app', 'Cou Name'),
            'cou_totalDuration' => Yii::t('app', 'Cou Total Duration'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourseCompositions()
    {
        return $this->hasMany(CourseComposition::className(), ['course_cou_id' => 'cou_id']);
    }

    /**
     * {@inheritdoc}
     * @return CourseQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CourseQuery(get_called_class());
    }
}
