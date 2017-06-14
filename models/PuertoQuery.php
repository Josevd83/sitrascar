<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Puerto]].
 *
 * @see Puerto
 */
class PuertoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Puerto[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Puerto|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
