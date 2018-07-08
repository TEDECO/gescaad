<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "hasRequirement".
 *
 * @property int $hre_id
 * @property int $software_sof_id
 * @property int $video_vid_id
 *
 * @property Software $softwareSof
 * @property Video $videoVid
 */
class HasRequirement extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hasRequirement';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['software_sof_id', 'video_vid_id'], 'required'],
            [['software_sof_id', 'video_vid_id'], 'integer'],
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
            'hre_id' => Yii::t('app', 'Hre ID'),
            'software_sof_id' => Yii::t('app', 'Software Sof ID'),
            'video_vid_id' => Yii::t('app', 'Video Vid ID'),
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
     * @return HasRequirementQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new HasRequirementQuery(get_called_class());
    }
}
