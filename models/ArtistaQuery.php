<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Artista]].
 *
 * @see Artista
 */
class ArtistaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Artista[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Artista|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
