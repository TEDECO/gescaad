<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Competency]].
 *
 * @see Competency
 */
class CompetencyQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Competency[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Competency|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
