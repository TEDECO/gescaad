<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "hasVideo".
 *
 * @property int $hvi_id autoincremental automatic index
 * @property string $hvi_order order of defined video component in course definition
 * @property int $video_vid_id
 * @property int $course_cou_id
 *
 * @property Course $courseCou
 * @property Video $videoVid
 */
class HasVideo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hasVideo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['hvi_order', 'video_vid_id', 'course_cou_id'], 'integer'],
            [['video_vid_id', 'course_cou_id'], 'required'],
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
            'hvi_id' => Yii::t('app', 'Hvi ID'),
            'hvi_order' => Yii::t('app', 'Hvi Order'),
            'video_vid_id' => Yii::t('app', 'Video Vid ID'),
            'course_cou_id' => Yii::t('app', 'Course Cou ID'),
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
     * @return HasVideoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new HasVideoQuery(get_called_class());
    }
}
