<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Playlist_Has_Cancion]].
 *
 * @see Playlist_Has_Cancion
 */
class Playlist_Has_CancionQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Playlist_Has_Cancion[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Playlist_Has_Cancion|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
