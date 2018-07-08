<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "operatingSystem".
 *
 * @property int $ope_id
 * @property string $ope_name operating system name
 *
 * @property IsCompatible[] $isCompatibles
 */
class OperatingSystem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'operatingSystem';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ope_name'], 'string', 'max' => 128],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ope_id' => Yii::t('app', 'Perating System ID'),
            'ope_name' => Yii::t('app', 'Operating System Name'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIsCompatibles()
    {
        return $this->hasMany(IsCompatible::className(), ['operatingSystem_ope_id' => 'ope_id']);
    }

    /**
     * {@inheritdoc}
     * @return OperatingSystemQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OperatingSystemQuery(get_called_class());
    }
}
