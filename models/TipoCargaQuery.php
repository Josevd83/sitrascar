<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[TipoCarga]].
 *
 * @see TipoCarga
 */
class TipoCargaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return TipoCarga[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return TipoCarga|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
