<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "courseComposition".
 *
 * @property int $cco_id autoincremental automatic index
 * @property int $course_cou_id refered course
 * @property int $video_vid_id referred video chapter .- video chapter composing the defined course
 * @property string $cco_order order of defined video component in course definition
 *
 * @property Course $courseCou
 * @property Video $videoVid
 */
class CourseComposition extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'courseComposition';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['course_cou_id', 'video_vid_id'], 'required'],
            [['course_cou_id', 'video_vid_id', 'cco_order'], 'integer'],
            [['course_cou_id'], 'exist', 'skipOnError' => true, 'targetClass' => Course::className(), 'targetAttribute' => ['course_cou_id' => 'cou_id']],
            [['video_vid_id'], 'exist', 'skipOnError' => true, 'targetClass' => Video::className(), 'targetAttribute' => ['video_vid_id' => 'vid_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'cco_id' => Yii::t('app', 'Cco ID'),
            'course_cou_id' => Yii::t('app', 'Course Cou ID'),
            'video_vid_id' => Yii::t('app', 'Video Vid ID'),
            'cco_order' => Yii::t('app', 'Cco Order'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourseCou()
    {
        return $this->hasOne(Course::className(), ['cou_id' => 'course_cou_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVideoVid()
    {
        return $this->hasOne(Video::className(), ['vid_id' => 'video_vid_id']);
    }

    /**
     * {@inheritdoc}
     * @return CourseCompositionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CourseCompositionQuery(get_called_class());
    }
}
