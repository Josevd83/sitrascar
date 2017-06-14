<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Centrales]].
 *
 * @see Centrales
 */
class CentralesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Centrales[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Centrales|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
