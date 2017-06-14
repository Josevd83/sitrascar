<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Parroquia]].
 *
 * @see Parroquia
 */
class ParroquiaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Parroquia[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Parroquia|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
