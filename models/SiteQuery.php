<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Site]].
 *
 * @see Site
 */
class SiteQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Site[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Site|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}