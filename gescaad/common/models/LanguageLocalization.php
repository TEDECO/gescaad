<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "languageLocalization".
 *
 * @property int $lan_id autoincremental automatic index
 * @property string $lan_name language name
 * @property int $lan_naturalReaderCompatible natural reader compatibility .- has automatic text speech capabilities (software/libraries) or must we record the specific audio tracks?
 *
 * @property Video[] $videos
 */
class LanguageLocalization extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'languageLocalization';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lan_naturalReaderCompatible'], 'integer'],
            [['lan_name'], 'string', 'max' => 128],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'lan_id' => Yii::t('app', 'Language ID'),
            'lan_name' => Yii::t('app', 'Language name'),
            'lan_naturalReaderCompatible' => Yii::t('app', 'Natural reader compatible'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVideos()
    {
        return $this->hasMany(Video::className(), ['languageLocalization_lan_id' => 'lan_id']);
    }

    /**
     * {@inheritdoc}
     * @return LanguageLocalizationQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new LanguageLocalizationQuery(get_called_class());
    }
    
    /**
     * Returns array of current language localization options.
     *
     * @return array (lan_id,lan_name)
     */
    public function getList()
    {
        return ArrayHelper::map(LanguageLocalization::find()->all(), 'lan_id', 'lan_name');
    }
}
