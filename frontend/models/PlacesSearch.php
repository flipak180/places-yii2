<?php

namespace frontend\models;

use common\models\Place;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

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
            [['id', 'user_id', 'city_id', 'district_id', 'network_id', 'total_views', 'total_likes', 'status', 'created_at', 'updated_at'], 'integer'],
            [['name', 'alias', 'address', 'phone', 'website', 'introtext', 'description'], 'safe'],
            [['rating', 'latitude', 'longitude'], 'number'],
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
        $query = Place::find()->where(['in', 'status', [self::STATUS_ACTIVE, self::STATUS_CLOSE]]);

        if (Yii::$app->places->city) {
            $query->andWhere(['city_id' => Yii::$app->places->city->id]);
        }

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
//                'attributes' => [
//                    //'real_position' => ['label' => '<span>По умолчанию</span>', 'default' => SORT_ASC],
//                    'rate' => ['label' => '<span>Рейтинг</span>', 'default' => SORT_DESC],
//                    'recommendations' => ['label' => '<span>Рекомендации</span>', 'default' => SORT_DESC],
//                    'name' => ['label' => '<span>Название</span>'],
//                    'position' => ['label' => '<span class="hidden">Название</span>'],
//                    'status' => ['label' => '<span class="hidden">Статус</span>'],
//                ],
                'defaultOrder' => ['id' => SORT_ASC],
//                'defaultOrder' => [
//                    'position' => SORT_ASC,
//                    'rate' => SORT_DESC,
//                    'recommendations' => SORT_DESC,
//                    'status' => SORT_DESC
//                ],
                'route' => Yii::$app->request->pathInfo,
            ],
            'pagination' => [
                'pageSize' => 21,
            ],
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
            'district_id' => $this->district_id,
            'network_id' => $this->network_id,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'rating' => $this->rating,
            'total_views' => $this->total_views,
            'total_likes' => $this->total_likes,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'alias', $this->alias])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'website', $this->website])
            ->andFilterWhere(['like', 'introtext', $this->introtext])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
