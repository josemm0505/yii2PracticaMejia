<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "album".
 *
 * @property int $idalbum
 * @property string $titulo
 * @property string $fecha_lanzamiento
 * @property string $portadaAlbum
 * @property int $artista_idartista
 *
 * @property Artista $artistaIdartista
 * @property Cancion[] $cancions
 */
class Album extends \yii\db\ActiveRecord
{
    public $imageFile;


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
            [['portadaAlbum'], 'string', 'max' => 500],
            [['artista_idartista'], 'exist', 'skipOnError' => true, 'targetClass' => Artista::class, 'targetAttribute' => ['artista_idartista' => 'idartista']],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg, webp']
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
            'portadaAlbum' => Yii::t('app', 'Portada Album'),
            'artista_idartista' => Yii::t('app', 'Artista'),
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            if ($this->imageFile instanceof UploadedFile) {
                $filename = $this->idalbum . '_' . preg_replace('/\s+/', '_', $this->titulo) . '_' . date('Ymd_His') . '.' . $this->imageFile->extension;
                $path = Yii::getAlias('@webroot/portadas/') . $filename;
    
                if ($this->imageFile->saveAs($path)) {
                    if ($this->portadaAlbum && $this->portadaAlbum != $filename) {
                        $this->deletePortada();
                    }
    
                    $this->portadaAlbum = $filename;
                    return $this->save(false); // Guardamos la nueva ruta de imagen
                }
            }
        }
        return false;
    }
    
    
        public function deletePortada(){
            $path = Yii::getAlias('@webroot/portadas/') . $this -> portadaAlbum;
            if(file_exists($path)){
                unlink($path);
            }
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
