<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Distribucion]].
 *
 * @see Distribucion
 */
class DistribucionQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Distribucion[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Distribucion|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
