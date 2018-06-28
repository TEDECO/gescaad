<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "videoSWRequirements".
 *
 * @property int $vis_id
 * @property int $video_vid_id
 * @property int $software_sof_id
 *
 * @property Software $softwareSof
 * @property Video $videoVid
 */
class VideoSWRequirements extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'videoSWRequirements';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['video_vid_id', 'software_sof_id'], 'required'],
            [['video_vid_id', 'software_sof_id'], 'integer'],
            [['software_sof_id'], 'exist', 'skipOnError' => true, 'targetClass' => Software::className(), 'targetAttribute' => ['software_sof_id' => 'sof_id']],
            [['video_vid_id'], 'exist', 'skipOnError' => true, 'targetClass' => Video::className(), 'targetAttribute' => ['video_vid_id' => 'vid_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'vis_id' => Yii::t('app', 'Vis ID'),
            'video_vid_id' => Yii::t('app', 'Video Vid ID'),
            'software_sof_id' => Yii::t('app', 'Software Sof ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSoftwareSof()
    {
        return $this->hasOne(Software::className(), ['sof_id' => 'software_sof_id']);
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
     * @return VideoSWRequirementsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new VideoSWRequirementsQuery(get_called_class());
    }
}
