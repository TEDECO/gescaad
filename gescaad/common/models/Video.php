<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "video".
 *
 * @property int $vid_id autoincremental automatic index
 * @property string $vid_name video general description .- main theme
 * @property int $languageLocalization_lan_id localized language
 * @property int $vid_duration total video length measured in seconds
 * @property string $vid_file Video file name
 * @property string $vid_url Video url
 *
 * @property CourseComposition[] $courseCompositions
 * @property LanguageLocalization $languageLocalizationLan
 * @property VideoGoals[] $videoGoals
 * @property VideoRequirements[] $videoRequirements
 * @property VideoSWRequirements[] $videoSWRequirements
 */
class Video extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'video';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['languageLocalization_lan_id'], 'required'],
            [['languageLocalization_lan_id', 'vid_duration'], 'integer'],
            [['vid_name'], 'string', 'max' => 128],
            [['vid_file'], 'string', 'max' => 45],
            [['vid_url'], 'string', 'max' => 256],
            [['languageLocalization_lan_id'], 'exist', 'skipOnError' => true, 'targetClass' => LanguageLocalization::className(), 'targetAttribute' => ['languageLocalization_lan_id' => 'lan_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'vid_id' => Yii::t('app', 'Vid ID'),
            'vid_name' => Yii::t('app', 'Vid Name'),
            'languageLocalization_lan_id' => Yii::t('app', 'Language Localization Lan ID'),
            'vid_duration' => Yii::t('app', 'Vid Duration'),
            'vid_file' => Yii::t('app', 'Vid File'),
            'vid_url' => Yii::t('app', 'Vid Url'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourseCompositions()
    {
        return $this->hasMany(CourseComposition::className(), ['video_vid_id' => 'vid_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLanguageLocalizationLan()
    {
        return $this->hasOne(LanguageLocalization::className(), ['lan_id' => 'languageLocalization_lan_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVideoGoals()
    {
        return $this->hasMany(VideoGoals::className(), ['video_vid_id' => 'vid_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVideoRequirements()
    {
        return $this->hasMany(VideoRequirements::className(), ['video_vid_id' => 'vid_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVideoSWRequirements()
    {
        return $this->hasMany(VideoSWRequirements::className(), ['video_vid_id' => 'vid_id']);
    }

    /**
     * {@inheritdoc}
     * @return VideoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new VideoQuery(get_called_class());
    }
}
