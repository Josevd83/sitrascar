<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Empresachofer]].
 *
 * @see Empresachofer
 */
class EmpresachoferQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Empresachofer[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Empresachofer|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
