<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "software".
 *
 * @property int $sof_id autoincremental automatic index
 * @property string $sof_name short software name
 * @property string $sof_release software release
 *
 * @property SoftwareSOCompatibility[] $softwareSOCompatibilities
 * @property VideoSWRequirements[] $videoSWRequirements
 */
class Software extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'software';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sof_name'], 'string', 'max' => 128],
            [['sof_release'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'sof_id' => Yii::t('app', 'Sof ID'),
            'sof_name' => Yii::t('app', 'Sof Name'),
            'sof_release' => Yii::t('app', 'Sof Release'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSoftwareSOCompatibilities()
    {
        return $this->hasMany(SoftwareSOCompatibility::className(), ['software_sof_id' => 'sof_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVideoSWRequirements()
    {
        return $this->hasMany(VideoSWRequirements::className(), ['software_sof_id' => 'sof_id']);
    }

    /**
     * {@inheritdoc}
     * @return SoftwareQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SoftwareQuery(get_called_class());
    }
}
