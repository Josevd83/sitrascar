<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Carga]].
 *
 * @see Carga
 */
class CargaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Carga[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Carga|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
