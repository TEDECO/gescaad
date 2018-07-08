<?php
namespace common\models;

use Yii;

/**
 * This is the model class for table "competency".
 *
 * @property int $com_id autoincremental automatic index
 * @property string $com_name competency short description
 * @property string $com_description competency long description
 * @property string $com_code standard competency codification
 *          
 * @property VideoGoals[] $videoGoals
 * @property VideoRequirements[] $videoRequirements
 */
class Competency extends \yii\db\ActiveRecord
{

    /**
     *
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'competency';
    }

    /**
     *
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [
                [
                    'com_name'
                ],
                'string',
                'max' => 128
            ],
            [
                [
                    'com_description'
                ],
                'string',
                'max' => 512
            ],
            [
                [
                    'com_code'
                ],
                'string',
                'max' => 45
            ]
        ];
    }

    /**
     *
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'com_id' => Yii::t('app', 'Competency ID'),
            'com_name' => Yii::t('app', 'Competency name'),
            'com_description' => Yii::t('app', 'Competency description'),
            'com_code' => Yii::t('app', 'Competency code')
        ];
    }

    /**
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVideoGoals()
    {
        return $this->hasMany(VideoGoals::className(), [
            'competency_com_id' => 'com_id'
        ]);
    }

    /**
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVideoRequirements()
    {
        return $this->hasMany(VideoRequirements::className(), [
            'competency_com_id' => 'com_id'
        ]);
    }

    /**
     *
     * {@inheritdoc}
     * @return CompetencyQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CompetencyQuery(get_called_class());
    }
}
