<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "softwareSOCompatibility".
 *
 * @property int $swc_id
 * @property int $software_sof_id
 * @property int $operatingSystem_ope_id
 *
 * @property OperatingSystem $operatingSystemOpe
 * @property Software $softwareSof
 */
class SoftwareSOCompatibility extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'softwareSOCompatibility';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['software_sof_id', 'operatingSystem_ope_id'], 'required'],
            [['software_sof_id', 'operatingSystem_ope_id'], 'integer'],
            [['operatingSystem_ope_id'], 'exist', 'skipOnError' => true, 'targetClass' => OperatingSystem::className(), 'targetAttribute' => ['operatingSystem_ope_id' => 'ope_id']],
            [['software_sof_id'], 'exist', 'skipOnError' => true, 'targetClass' => Software::className(), 'targetAttribute' => ['software_sof_id' => 'sof_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'swc_id' => Yii::t('app', 'Swc ID'),
            'software_sof_id' => Yii::t('app', 'Software Sof ID'),
            'operatingSystem_ope_id' => Yii::t('app', 'Operating System Ope ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOperatingSystemOpe()
    {
        return $this->hasOne(OperatingSystem::className(), ['ope_id' => 'operatingSystem_ope_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSoftwareSof()
    {
        return $this->hasOne(Software::className(), ['sof_id' => 'software_sof_id']);
    }

    /**
     * {@inheritdoc}
     * @return SoftwareSOCompatibilityQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SoftwareSOCompatibilityQuery(get_called_class());
    }
}
