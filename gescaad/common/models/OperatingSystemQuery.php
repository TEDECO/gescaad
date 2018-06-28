<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[OperatingSystem]].
 *
 * @see OperatingSystem
 */
class OperatingSystemQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return OperatingSystem[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return OperatingSystem|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
