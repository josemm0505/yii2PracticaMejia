<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

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
    public $imageFile;


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
            [['nombre', 'biografia'], 'required'],
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

    public function upload()
    {
        if ($this->validate()) {
            if ($this->imageFile instanceof UploadedFile) {
                $filename = $this->idartista . '_' . preg_replace('/\s+/', '_', $this->nombre) . '_' . date('Ymd_His') . '.' . $this->imageFile->extension;
                $path = Yii::getAlias('@webroot/imgArtistas/') . $filename;
    
                if ($this->imageFile->saveAs($path)) {
                    if ($this->imagenArtista && $this->imagenArtista != $filename) {
                        $this->deleteArtista();
                    }
    
                    $this->imagenArtista = $filename;
                    return $this->save(false); // Guardamos la nueva ruta de imagen
                }
            }
        }
        return false;
    }
    
    
        public function deleteArtista(){
            $path = Yii::getAlias('@webroot/imgArtistas/') . $this -> imagenArtista;
            if(file_exists($path)){
                unlink($path);
            }
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
