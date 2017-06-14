<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Auditoria]].
 *
 * @see Auditoria
 */
class AuditoriaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Auditoria[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Auditoria|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
