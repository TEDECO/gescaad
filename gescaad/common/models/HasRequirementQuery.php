<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[HasRequirement]].
 *
 * @see HasRequirement
 */
class HasRequirementQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return HasRequirement[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return HasRequirement|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
