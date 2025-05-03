<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "artista".
 *
 * @property int $idartista
 * @property string $nombre
 * @property string $biografia
 * @property string $imagenArtista
 *
 * @property Album[] $albums
 */
class Artista extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'artista';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'biografia', 'imagenArtista'], 'required'],
            [['nombre'], 'string', 'max' => 45],
            [['biografia'], 'string', 'max' => 2000],
            [['imagenArtista'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idartista' => Yii::t('app', 'Idartista'),
            'nombre' => Yii::t('app', 'Nombre'),
            'biografia' => Yii::t('app', 'Biografia'),
            'imagenArtista' => Yii::t('app', 'Imagen Artista'),
        ];
    }

    /**
     * Gets query for [[Albums]].
     *
     * @return \yii\db\ActiveQuery|AlbumQuery
     */
    public function getAlbums()
    {
        return $this->hasMany(Album::class, ['artista_idartista' => 'idartista']);
    }

    /**
     * {@inheritdoc}
     * @return ArtistaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ArtistaQuery(get_called_class());
    }

}
