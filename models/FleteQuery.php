<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Flete]].
 *
 * @see Flete
 */
class FleteQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Flete[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Flete|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
