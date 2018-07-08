<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "competency".
 *
 * @property int $com_id autoincremental automatic index
 * @property string $com_name competency short description
 * @property string $com_description competency long description
 * @property string $com_code standard competency codification
 *
 * @property HasCompetency[] $hasCompetencies
 */
class Competency extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'competency';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['com_name'], 'string', 'max' => 128],
            [['com_description'], 'string', 'max' => 512],
            [['com_code'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'com_id' => Yii::t('app', 'Com ID'),
            'com_name' => Yii::t('app', 'Com Name'),
            'com_description' => Yii::t('app', 'Com Description'),
            'com_code' => Yii::t('app', 'Com Code'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHasCompetencies()
    {
        return $this->hasMany(HasCompetency::className(), ['competency_com_id' => 'com_id']);
    }

    /**
     * {@inheritdoc}
     * @return CompetencyQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CompetencyQuery(get_called_class());
    }
    
    /**
     * Returns array of current competency options.
     *
     * @return array (com_id,com_name)
     */
    public function getList()
    {
        return ArrayHelper::map(Competency::find()->all(), 'com_id', 'com_name');
    }
    
    /**
     * @return string
     */
    public function getName()
    {
        return $this->com_name;
    }
}
