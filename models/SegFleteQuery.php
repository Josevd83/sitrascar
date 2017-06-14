<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[SegFlete]].
 *
 * @see SegFlete
 */
class SegFleteQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return SegFlete[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return SegFlete|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
