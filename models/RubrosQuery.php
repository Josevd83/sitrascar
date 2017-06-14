<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Rubros]].
 *
 * @see Rubros
 */
class RubrosQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Rubros[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Rubros|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
