<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[HasCompetency]].
 *
 * @see HasCompetency
 */
class HasCompetencyQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return HasCompetency[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return HasCompetency|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
