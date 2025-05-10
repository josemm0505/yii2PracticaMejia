<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario".
 *
 * @property int $idusuario
 * @property string|null $username
 * @property string|null $correo
 * @property string|null $password
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
            [['username', 'correo', 'password'], 'default', 'value' => null],
            [['username'], 'string', 'max' => 255],
            [['correo', 'password'], 'string', 'max' => 150],
            [['username'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idusuario' => Yii::t('app', 'Idusuario'),
            'username' => Yii::t('app', 'Username'),
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
