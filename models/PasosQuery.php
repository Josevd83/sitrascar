<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Pasos]].
 *
 * @see Pasos
 */
class PasosQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Pasos[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Pasos|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
