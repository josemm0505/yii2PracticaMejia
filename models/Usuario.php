<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario".
 *
 * @property int $idusuario
 * @property string $nombre
 * @property string $correo
 * @property string $password
 *
 * @property Playlist[] $playlists
 */
class Usuario extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usuario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'correo', 'password'], 'required'],
            [['nombre', 'correo', 'password'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idusuario' => Yii::t('app', 'Idusuario'),
            'nombre' => Yii::t('app', 'Nombre'),
            'correo' => Yii::t('app', 'Correo'),
            'password' => Yii::t('app', 'Password'),
        ];
    }

    /**
     * Gets query for [[Playlists]].
     *
     * @return \yii\db\ActiveQuery|PlaylistQuery
     */
    public function getPlaylists()
    {
        return $this->hasMany(Playlist::class, ['usuario_idusuario' => 'idusuario']);
    }

    /**
     * {@inheritdoc}
     * @return UsuarioQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UsuarioQuery(get_called_class());
    }

}
