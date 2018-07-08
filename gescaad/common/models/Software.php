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
 * @property HasRequirement[] $hasRequirements
 * @property IsCompatible[] $isCompatibles
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
            'sof_id' => Yii::t('app', 'Software ID'),
            'sof_name' => Yii::t('app', 'Software name'),
            'sof_release' => Yii::t('app', 'Software release'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHasRequirements()
    {
        return $this->hasMany(HasRequirement::className(), ['software_sof_id' => 'sof_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIsCompatibles()
    {
        return $this->hasMany(IsCompatible::className(), ['software_sof_id' => 'sof_id']);
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
