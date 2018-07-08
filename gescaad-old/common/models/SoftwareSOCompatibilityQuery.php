<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[SoftwareSOCompatibility]].
 *
 * @see SoftwareSOCompatibility
 */
class SoftwareSOCompatibilityQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return SoftwareSOCompatibility[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return SoftwareSOCompatibility|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
