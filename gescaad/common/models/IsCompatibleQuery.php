<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[IsCompatible]].
 *
 * @see IsCompatible
 */
class IsCompatibleQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return IsCompatible[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return IsCompatible|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
