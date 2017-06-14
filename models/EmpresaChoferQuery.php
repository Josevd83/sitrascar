<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[EmpresaChofer]].
 *
 * @see EmpresaChofer
 */
class EmpresaChoferQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return EmpresaChofer[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return EmpresaChofer|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
