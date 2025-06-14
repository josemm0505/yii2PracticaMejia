<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Artista;

/**
 * ArtistaSearch represents the model behind the search form of `app\models\Artista`.
 */
class ArtistaSearch extends Artista
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idartista'], 'integer'],
            [['nombre', 'biografia', 'imagenArtista'], 'safe'],
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
        $query = Artista::find();

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
            'idartista' => $this->idartista,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'biografia', $this->biografia])
            ->andFilterWhere(['like', 'imagenArtista', $this->imagenArtista]);

        return $dataProvider;
    }
}
