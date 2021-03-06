<?php

namespace common\models;

use Yii;
use yii\BaseYii;
use yii\helpers\ArrayHelper;

class ModelHasCompetency extends \yii\base\Model
{

    /**
     * Creates and populates a set of models.
     *
     * @param string $modelClass
     * @param array $multipleModels
     * @return array
     */
    public static function createMultiple($modelClass, $multipleModels = [])
    {
        $model = new $modelClass();
        $formName = $model->formName();
        $post = Yii::$app->request->post($formName);
        $models = [];
        
        if (! empty($multipleModels)) {
            $keys = array_keys(ArrayHelper::map($multipleModels, 'hco_id', 'hco_id'));
            $multipleModels = array_combine($keys, $multipleModels);
        }
        
        if ($post && is_array($post)) {
            foreach ($post as $i => $item) {
                if (isset($item['hco_id']) && ! empty($item['hco_id']) && isset($multipleModels[$item['hco_id']])) {
                    $models[] = $multipleModels[$item['hco_id']];
                } else {
                    $models[] = new $modelClass();
                }
            }
        }
        
        unset($model, $formName, $post);
        
        return $models;       
    }
}