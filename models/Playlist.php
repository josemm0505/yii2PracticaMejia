<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "playlist".
 *
 * @property int $idplaylist
 * @property string $nombre
 * @property int $usuario_idusuario
 * @property string $createAt
 * @property string $updateAt
 *
 * @property Cancion[] $cancionIdcancions
 * @property PlaylistHasCancion[] $playlistHasCancions
 * @property Usuario $usuarioIdusuario
 */
class Playlist extends \yii\db\ActiveRecord
{

    public $canciones = [];


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
            [['createAt', 'updateAt'], 'safe'],
            [['nombre'], 'string', 'max' => 45],
            [['canciones'],'each', 'rule' => ['integer']],
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
            'usuario_idusuario' => Yii::t('app', 'Usuario Idusuario'),
            'canciones' => Yii::t('app', 'Canciones')
        ];
    }

    public function afterSave($insert, $changedAttributes){
        parent::afterSave($insert, $changedAttributes);
    
        if(is_array($this->canciones)){
            foreach($this->canciones as $cancionesId){
                $playlistHasCancions = new PlaylistHasCancion();
                $playlistHasCancions->playlist_idplaylist = $this->idplaylist;
                $playlistHasCancions->cancion_idcancion = $cancionesId;
                $playlistHasCancions->save();
            }
        }
    }
    
    public function beforeDelete(){
        if(!parent::beforeDelete()){
            return false;
        }
    
        PlaylistHasCancion::deleteAll(['playlist_idplaylist' => $this->idplaylist]);
    
        return true;
    }


    /**
     * Gets query for [[CancionIdcancions]].
     *
     * @return \yii\db\ActiveQuery|CancionQuery
     */
    public function getCancionIdcancions()
    {
        return $this->hasMany(Cancion::class, ['idcancion' => 'cancion_idcancion'])->viaTable('playlist_has_cancion', ['playlist_idplaylist' => 'idplaylist']);
    }

    /**
     * Gets query for [[PlaylistHasCancions]].
     *
     * @return \yii\db\ActiveQuery|PlaylistHasCancionQuery
     */
    public function getPlaylistHasCancions()
    {
        return $this->hasMany(PlaylistHasCancion::class, ['playlist_idplaylist' => 'idplaylist']);
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
