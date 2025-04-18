<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "playlist_has_cancion".
 *
 * @property int $playlist_idplaylist
 * @property int $playlist_usuario_idusuario
 * @property int $cancion_idcancion
 * @property int $cancion_album_idalbum
 * @property int $cancion_album_artista_idartista
 * @property int $cancion_genero_idgenero
 *
 * @property Cancion $cancionIdcancion
 * @property Playlist $playlistIdplaylist
 */
class Playlist_Has_Cancion extends \yii\db\ActiveRecord
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
            [['playlist_idplaylist', 'playlist_usuario_idusuario', 'cancion_idcancion', 'cancion_album_idalbum', 'cancion_album_artista_idartista', 'cancion_genero_idgenero'], 'required'],
            [['playlist_idplaylist', 'playlist_usuario_idusuario', 'cancion_idcancion', 'cancion_album_idalbum', 'cancion_album_artista_idartista', 'cancion_genero_idgenero'], 'integer'],
            [['playlist_idplaylist', 'playlist_usuario_idusuario', 'cancion_idcancion', 'cancion_album_idalbum', 'cancion_album_artista_idartista', 'cancion_genero_idgenero'], 'unique', 'targetAttribute' => ['playlist_idplaylist', 'playlist_usuario_idusuario', 'cancion_idcancion', 'cancion_album_idalbum', 'cancion_album_artista_idartista', 'cancion_genero_idgenero']],
            [['cancion_idcancion', 'cancion_album_idalbum', 'cancion_album_artista_idartista', 'cancion_genero_idgenero'], 'exist', 'skipOnError' => true, 'targetClass' => Cancion::class, 'targetAttribute' => ['cancion_idcancion' => 'idcancion', 'cancion_album_idalbum' => 'album_idalbum', 'cancion_album_artista_idartista' => 'album_artista_idartista', 'cancion_genero_idgenero' => 'genero_idgenero']],
            [['playlist_idplaylist', 'playlist_usuario_idusuario'], 'exist', 'skipOnError' => true, 'targetClass' => Playlist::class, 'targetAttribute' => ['playlist_idplaylist' => 'idplaylist', 'playlist_usuario_idusuario' => 'usuario_idusuario']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'playlist_idplaylist' => Yii::t('app', 'Playlist Idplaylist'),
            'playlist_usuario_idusuario' => Yii::t('app', 'Playlist Usuario Idusuario'),
            'cancion_idcancion' => Yii::t('app', 'Cancion Idcancion'),
            'cancion_album_idalbum' => Yii::t('app', 'Cancion Album Idalbum'),
            'cancion_album_artista_idartista' => Yii::t('app', 'Cancion Album Artista Idartista'),
            'cancion_genero_idgenero' => Yii::t('app', 'Cancion Genero Idgenero'),
        ];
    }

    /**
     * Gets query for [[CancionIdcancion]].
     *
     * @return \yii\db\ActiveQuery|CancionQuery
     */
    public function getCancionIdcancion()
    {
        return $this->hasOne(Cancion::class, ['idcancion' => 'cancion_idcancion', 'album_idalbum' => 'cancion_album_idalbum', 'album_artista_idartista' => 'cancion_album_artista_idartista', 'genero_idgenero' => 'cancion_genero_idgenero']);
    }

    /**
     * Gets query for [[PlaylistIdplaylist]].
     *
     * @return \yii\db\ActiveQuery|PlaylistQuery
     */
    public function getPlaylistIdplaylist()
    {
        return $this->hasOne(Playlist::class, ['idplaylist' => 'playlist_idplaylist', 'usuario_idusuario' => 'playlist_usuario_idusuario']);
    }

    /**
     * {@inheritdoc}
     * @return Playlist_Has_CancionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new Playlist_Has_CancionQuery(get_called_class());
    }

}
