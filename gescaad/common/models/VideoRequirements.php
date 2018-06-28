<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "videoRequirements".
 *
 * @property int $vir_id
 * @property int $video_vid_id
 * @property int $competency_com_id
 *
 * @property Competency $competencyCom
 * @property Video $videoVid
 */
class VideoRequirements extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'videoRequirements';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['video_vid_id', 'competency_com_id'], 'required'],
            [['video_vid_id', 'competency_com_id'], 'integer'],
            [['competency_com_id'], 'exist', 'skipOnError' => true, 'targetClass' => Competency::className(), 'targetAttribute' => ['competency_com_id' => 'com_id']],
            [['video_vid_id'], 'exist', 'skipOnError' => true, 'targetClass' => Video::className(), 'targetAttribute' => ['video_vid_id' => 'vid_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'vir_id' => Yii::t('app', 'Vir ID'),
            'video_vid_id' => Yii::t('app', 'Video Vid ID'),
            'competency_com_id' => Yii::t('app', 'Competency Com ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompetencyCom()
    {
        return $this->hasOne(Competency::className(), ['com_id' => 'competency_com_id']);
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
     * @return VideoRequirementsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new VideoRequirementsQuery(get_called_class());
    }
}
