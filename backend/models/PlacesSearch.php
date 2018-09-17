<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Place;

/**
 * PlacesSearch represents the model behind the search form of `common\models\Place`.
 */
class PlacesSearch extends Place
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'city_id', 'total_views', 'total_likes', 'status', 'created_at', 'updated_at'], 'integer'],
            [['name', 'alias', 'coordinates', 'address', 'phone', 'website', 'introtext', 'description'], 'safe'],
            [['rating'], 'number'],
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
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Place::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'city_id' => $this->city_id,
            'rating' => $this->rating,
            'total_views' => $this->total_views,
            'total_likes' => $this->total_likes,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'alias', $this->alias])
            ->andFilterWhere(['like', 'coordinates', $this->coordinates])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'website', $this->website])
            ->andFilterWhere(['like', 'introtext', $this->introtext])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
