<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Cancion;

/**
 * CancionSearch represents the model behind the search form of `app\models\Cancion`.
 */
class CancionSearch extends Cancion
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idcancion', 'album_idalbum', 'album_artista_idartista', 'genero_idgenero'], 'integer'],
            [['titulo', 'duracion'], 'safe'],
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
        $query = Cancion::find();

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
            'idcancion' => $this->idcancion,
            'album_idalbum' => $this->album_idalbum,
            'album_artista_idartista' => $this->album_artista_idartista,
            'genero_idgenero' => $this->genero_idgenero,
        ]);

        $query->andFilterWhere(['like', 'titulo', $this->titulo])
            ->andFilterWhere(['like', 'duracion', $this->duracion]);

        return $dataProvider;
    }
}
