<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "hasCompetency".
 *
 * @property int $hco_id
 * @property string $hco_type
 * @property int $video_vid_id
 * @property int $competency_com_id
 *
 * @property Competency $competencyCom
 * @property Video $videoVid
 */
class HasCompetency extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hasCompetency';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['hco_type'], 'string'],
            // [['video_vid_id', 'competency_com_id'], 'required'],
            [['competency_com_id'], 'required'],
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
            'hco_id' => Yii::t('app', 'HasCompetency ID'),
            'hco_type' => Yii::t('app', 'Competency type'),
            'video_vid_id' => Yii::t('app', 'Video ID'),
            'competency_com_id' => Yii::t('app', 'Competency ID'),
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
     * @return HasCompetencyQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new HasCompetencyQuery(get_called_class());
    }
    
    /**
     * @return string[]
     */
    public function getCompetencyOptions()
    {
        return [
            'goal' => Yii::t('app', 'Goal'),
            'requirement' => Yii::t('app', 'Requirement'),
        ];
    }
    
    /**
     * Returns array of IDs of an array of competencies.
     *
     * @param [Competency] $objects
     * @return array
     */
    public function getIDArray( $objects ) {
        return ArrayHelper::map($objects, 'hco_id', 'hco_id');
    }
    
    /**
     * Deletes all competencies identified by hco_id.
     * 
     * @param [integer] $array
     */
    public function deleteAllByID( $array ){
        HasCompetency::deleteAll([
            'hco_id' => $array
        ]);
    }
}
