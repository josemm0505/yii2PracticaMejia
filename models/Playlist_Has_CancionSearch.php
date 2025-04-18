<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Playlist_Has_Cancion;

/**
 * Playlist_Has_CancionSearch represents the model behind the search form of `app\models\Playlist_Has_Cancion`.
 */
class Playlist_Has_CancionSearch extends Playlist_Has_Cancion
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['playlist_idplaylist', 'playlist_usuario_idusuario', 'cancion_idcancion', 'cancion_album_idalbum', 'cancion_album_artista_idartista', 'cancion_genero_idgenero'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     * @param string|null $formName Form name to be used into `->load()` method.
     *
     * @return ActiveDataProvider
     */
    public function search($params, $formName = null)
    {
        $query = Playlist_Has_Cancion::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params, $formName);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'playlist_idplaylist' => $this->playlist_idplaylist,
            'playlist_usuario_idusuario' => $this->playlist_usuario_idusuario,
            'cancion_idcancion' => $this->cancion_idcancion,
            'cancion_album_idalbum' => $this->cancion_album_idalbum,
            'cancion_album_artista_idartista' => $this->cancion_album_artista_idartista,
            'cancion_genero_idgenero' => $this->cancion_genero_idgenero,
        ]);

        return $dataProvider;
    }
}
