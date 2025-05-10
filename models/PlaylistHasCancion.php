<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "playlist_has_cancion".
 *
 * @property int $playlist_idplaylist
 * @property int $cancion_idcancion
 *
 * @property Cancion $cancionIdcancion
 * @property Playlist $playlistIdplaylist
 */
class PlaylistHasCancion extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'playlist_has_cancion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['playlist_idplaylist', 'cancion_idcancion'], 'required'],
            [['playlist_idplaylist', 'cancion_idcancion'], 'integer'],
            [['playlist_idplaylist', 'cancion_idcancion'], 'unique', 'targetAttribute' => ['playlist_idplaylist', 'cancion_idcancion']],
            [['cancion_idcancion'], 'exist', 'skipOnError' => true, 'targetClass' => Cancion::class, 'targetAttribute' => ['cancion_idcancion' => 'idcancion']],
            [['playlist_idplaylist'], 'exist', 'skipOnError' => true, 'targetClass' => Playlist::class, 'targetAttribute' => ['playlist_idplaylist' => 'idplaylist']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'playlist_idplaylist' => Yii::t('app', 'Playlist Idplaylist'),
            'cancion_idcancion' => Yii::t('app', 'Cancion Idcancion'),
        ];
    }

    /**
     * Gets query for [[CancionIdcancion]].
     *
     * @return \yii\db\ActiveQuery|CancionQuery
     */
    public function getCancionIdcancion()
    {
        return $this->hasOne(Cancion::class, ['idcancion' => 'cancion_idcancion']);
    }

    /**
     * Gets query for [[PlaylistIdplaylist]].
     *
     * @return \yii\db\ActiveQuery|PlaylistQuery
     */
    public function getPlaylistIdplaylist()
    {
        return $this->hasOne(Playlist::class, ['idplaylist' => 'playlist_idplaylist']);
    }

    /**
     * {@inheritdoc}
     * @return PlaylistHasCancionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PlaylistHasCancionQuery(get_called_class());
    }

}
