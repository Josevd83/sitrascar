<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Segflete]].
 *
 * @see Segflete
 */
class SegfleteQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Segflete[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Segflete|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
