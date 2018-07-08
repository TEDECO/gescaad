<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[VideoRequirements]].
 *
 * @see VideoRequirements
 */
class VideoRequirementsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return VideoRequirements[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return VideoRequirements|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
