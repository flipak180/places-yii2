<?php

namespace frontend\models;

use common\models\MetroStation;
use common\models\Place;
use common\models\PlaceComfort;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\db\Expression;

/**
 * PlacesSearch represents the model behind the search form of `common\models\Place`.
 */
class PlacesSearch extends Place
{
    public $metro_id;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'city_id', 'district_id', 'network_id', 'total_views', 'total_likes', 'status', 'created_at', 'updated_at', 'metro_id'], 'integer'],
            [['name', 'alias', 'address', 'phone', 'website', 'introtext', 'description', 'comforts_field', 'metro_field'], 'safe'],
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
     * @param null $city_id
     * @return ActiveDataProvider
     */
    public function search($params, $city_id = null)
    {
        $query = Place::find()->with(['city', 'image', 'images', 'likes'])
            ->where(['in', 'status', [self::STATUS_ACTIVE, self::STATUS_CLOSE]]);

        if ($city_id) {
            $query->andWhere(['city_id' => $city_id]);
        } elseif (Yii::$app->cityDetector->city) {
            $query->andWhere(['city_id' => Yii::$app->cityDetector->city->id]);
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

        // Фильтр по удобствам
        if ($this->comforts_field and is_array($this->comforts_field)) {
            $sub_query = PlaceComfort::find();
            $sub_query->select('place_id');
            $sub_query->where(['in', 'comfort_id', $this->comforts_field]);
            $sub_query->groupBy(['place_id']);
            $sub_query->having('count(distinct `comfort_id`) >= '.count($this->comforts_field));
            $query->join('INNER JOIN', '('.$sub_query->createCommand()->getRawSql().') pc', 'places.id = pc.place_id');
        }

        // Фильтр по метро
        if ($this->metro_id and $station = MetroStation::findOne($this->metro_id)) {
            $query->addSelect([new Expression("((ACOS(SIN({$station->latitude} * PI() / 180) * SIN(`places`.latitude * PI() / 180) + 
                COS({$station->latitude} * PI() / 180) * COS(`places`.latitude * PI() / 180) * COS(({$station->longitude} - `places`.longitude) * 
                PI() / 180)) * 180 / PI()) * 60 * 1.1515) AS distance")]);
            $query->having("distance <= '1'");
            $query->orderBy("distance");
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

    /**
     * @param $total
     * @return string
     */
    public function getSummaryText($total) {
        return Yii::t('app', 'Найдено: {n, plural, =1{# кальянная} one{# кальянная} few{# кальянные} many{# кальянных} other{# кальянных}}', ['n' => $total]);
    }
}
