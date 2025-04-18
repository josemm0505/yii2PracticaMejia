<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cancion".
 *
 * @property int $idcancion
 * @property string $titulo
 * @property string $duracion
 * @property int $album_idalbum
 * @property int $album_artista_idartista
 * @property int $genero_idgenero
 *
 * @property Album $albumIdalbum
 * @property Genero $generoIdgenero
 * @property PlaylistHasCancion[] $playlistHasCancions
 * @property Playlist[] $playlistIdplaylists
 */
class Cancion extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cancion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['titulo', 'duracion', 'album_idalbum', 'album_artista_idartista', 'genero_idgenero'], 'required'],
            [['album_idalbum', 'album_artista_idartista', 'genero_idgenero'], 'integer'],
            [['titulo', 'duracion'], 'string', 'max' => 45],
            [['album_idalbum', 'album_artista_idartista'], 'exist', 'skipOnError' => true, 'targetClass' => Album::class, 'targetAttribute' => ['album_idalbum' => 'idalbum', 'album_artista_idartista' => 'artista_idartista']],
            [['genero_idgenero'], 'exist', 'skipOnError' => true, 'targetClass' => Genero::class, 'targetAttribute' => ['genero_idgenero' => 'idgenero']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idcancion' => Yii::t('app', 'Idcancion'),
            'titulo' => Yii::t('app', 'Titulo'),
            'duracion' => Yii::t('app', 'Duracion'),
            'album_idalbum' => Yii::t('app', 'Album Idalbum'),
            'album_artista_idartista' => Yii::t('app', 'Album Artista Idartista'),
            'genero_idgenero' => Yii::t('app', 'Genero Idgenero'),
        ];
    }

    /**
     * Gets query for [[AlbumIdalbum]].
     *
     * @return \yii\db\ActiveQuery|AlbumQuery
     */
    public function getAlbumIdalbum()
    {
        return $this->hasOne(Album::class, ['idalbum' => 'album_idalbum', 'artista_idartista' => 'album_artista_idartista']);
    }

    /**
     * Gets query for [[GeneroIdgenero]].
     *
     * @return \yii\db\ActiveQuery|GeneroQuery
     */
    public function getGeneroIdgenero()
    {
        return $this->hasOne(Genero::class, ['idgenero' => 'genero_idgenero']);
    }

    /**
     * Gets query for [[PlaylistHasCancions]].
     *
     * @return \yii\db\ActiveQuery|PlaylistHasCancionQuery
     */
    public function getPlaylistHasCancions()
    {
        return $this->hasMany(PlaylistHasCancion::class, ['cancion_idcancion' => 'idcancion', 'cancion_album_idalbum' => 'album_idalbum', 'cancion_album_artista_idartista' => 'album_artista_idartista', 'cancion_genero_idgenero' => 'genero_idgenero']);
    }

    /**
     * Gets query for [[PlaylistIdplaylists]].
     *
     * @return \yii\db\ActiveQuery|PlaylistQuery
     */
    public function getPlaylistIdplaylists()
    {
        return $this->hasMany(Playlist::class, ['idplaylist' => 'playlist_idplaylist', 'usuario_idusuario' => 'playlist_usuario_idusuario'])->viaTable('playlist_has_cancion', ['cancion_idcancion' => 'idcancion', 'cancion_album_idalbum' => 'album_idalbum', 'cancion_album_artista_idartista' => 'album_artista_idartista', 'cancion_genero_idgenero' => 'genero_idgenero']);
    }

    /**
     * {@inheritdoc}
     * @return CancionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CancionQuery(get_called_class());
    }

}
