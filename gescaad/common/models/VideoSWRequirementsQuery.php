<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[VideoSWRequirements]].
 *
 * @see VideoSWRequirements
 */
class VideoSWRequirementsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return VideoSWRequirements[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return VideoSWRequirements|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
