<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Cancion]].
 *
 * @see Cancion
 */
class CancionQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Cancion[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Cancion|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
