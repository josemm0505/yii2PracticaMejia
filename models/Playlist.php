<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "playlist".
 *
 * @property int $idplaylist
 * @property string $nombre
 * @property int $usuario_idusuario
 *
 * @property Cancion[] $cancionIdcancions
 * @property PlaylistHasCancion[] $playlistHasCancions
 * @property Usuario $usuarioIdusuario
 */
class Playlist extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'playlist';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'usuario_idusuario'], 'required'],
            [['usuario_idusuario'], 'integer'],
            [['nombre'], 'string', 'max' => 45],
            [['usuario_idusuario'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::class, 'targetAttribute' => ['usuario_idusuario' => 'idusuario']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idplaylist' => Yii::t('app', 'Idplaylist'),
            'nombre' => Yii::t('app', 'Nombre'),
            'usuario_idusuario' => Yii::t('app', 'Usuario'),
        ];
    }

    /**
     * Gets query for [[CancionIdcancions]].
     *
     * @return \yii\db\ActiveQuery|CancionQuery
     */
    public function getCancionIdcancions()
    {
        return $this->hasMany(Cancion::class, ['idcancion' => 'cancion_idcancion', 'album_idalbum' => 'cancion_album_idalbum', 'album_artista_idartista' => 'cancion_album_artista_idartista', 'genero_idgenero' => 'cancion_genero_idgenero'])->viaTable('playlist_has_cancion', ['playlist_idplaylist' => 'idplaylist', 'playlist_usuario_idusuario' => 'usuario_idusuario']);
    }

    /**
     * Gets query for [[PlaylistHasCancions]].
     *
     * @return \yii\db\ActiveQuery|PlaylistHasCancionQuery
     */
    public function getPlaylistHasCancions()
    {
        return $this->hasMany(PlaylistHasCancion::class, ['playlist_idplaylist' => 'idplaylist', 'playlist_usuario_idusuario' => 'usuario_idusuario']);
    }

    /**
     * Gets query for [[UsuarioIdusuario]].
     *
     * @return \yii\db\ActiveQuery|UsuarioQuery
     */
    public function getUsuarioIdusuario()
    {
        return $this->hasOne(Usuario::class, ['idusuario' => 'usuario_idusuario']);
    }

    /**
     * {@inheritdoc}
     * @return PlaylistQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PlaylistQuery(get_called_class());
    }

}
