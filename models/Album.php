<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "album".
 *
 * @property int $idalbum
 * @property string $titulo
 * @property string $fecha_lanzamiento
 * @property int $artista_idartista
 *
 * @property Artista $artistaIdartista
 * @property Cancion[] $cancions
 */
class Album extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'album';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['titulo', 'fecha_lanzamiento', 'artista_idartista'], 'required'],
            [['fecha_lanzamiento'], 'safe'],
            [['artista_idartista'], 'integer'],
            [['titulo'], 'string', 'max' => 45],
            [['artista_idartista'], 'exist', 'skipOnError' => true, 'targetClass' => Artista::class, 'targetAttribute' => ['artista_idartista' => 'idartista']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idalbum' => Yii::t('app', 'Idalbum'),
            'titulo' => Yii::t('app', 'Titulo'),
            'fecha_lanzamiento' => Yii::t('app', 'Fecha Lanzamiento'),
            'artista_idartista' => Yii::t('app', 'Artista Idartista'),
        ];
    }

    /**
     * Gets query for [[ArtistaIdartista]].
     *
     * @return \yii\db\ActiveQuery|ArtistaQuery
     */
    public function getArtistaIdartista()
    {
        return $this->hasOne(Artista::class, ['idartista' => 'artista_idartista']);
    }

    /**
     * Gets query for [[Cancions]].
     *
     * @return \yii\db\ActiveQuery|CancionQuery
     */
    public function getCancions()
    {
        return $this->hasMany(Cancion::class, ['album_idalbum' => 'idalbum', 'album_artista_idartista' => 'artista_idartista']);
    }

    /**
     * {@inheritdoc}
     * @return AlbumQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AlbumQuery(get_called_class());
    }

}
