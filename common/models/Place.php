<?php

namespace common\models;

use himiklab\thumbnail\EasyThumbnailImage;
use himiklab\thumbnail\FileNotFoundException;
use Yii;
use yii\base\InvalidConfigException;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\web\UploadedFile;

// Расчет расстояния
// https://stackoverflow.com/a/5548877/2756911
// SELECT id, latitude, longitude, SQRT(
//     POW(69.1 * (latitude - 59.837906), 2) +
//     POW(69.1 * (30.509141 - longitude) * COS(latitude / 57.3), 2)) AS distance
// FROM `places` HAVING distance < 25 ORDER BY distance

/**
 * This is the model class for table "places".
 *
 * @property int $id
 * @property string $name
 * @property string $alias
 * @property int $user_id
 * @property int $city_id
 * @property int $district_id
 * @property int $network_id
 * @property string $latitude
 * @property string $longitude
 * @property string $address
 * @property string $phone
 * @property string $website
 * @property string $introtext
 * @property string $description
 * @property string $opening_hours
 * @property string $rating
 * @property int $total_views
 * @property int $total_likes
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 *
 * @property User $user
 * @property City $city
 * @property District $district
 * @property PlaceNetwork $network
 * @property PlaceImage $image
 * @property PlaceImage[] $images
 * @property PlaceReview[] $reviews
 * @property PlaceComfort[] $placeComforts
 * @property Comfort[] $comforts
 * @property PlaceMetro[] $placeMetro
 * @property MetroStation[] $metro
 * @property PlaceSimilar[] $placeSimilar
 * @property Place[] $similar
 * @property PlaceOpeningHour[] $openingHours
 * @property string $defaultCoordinates
 * @property string $statusName
 * @property array $statusArr
 * @property string $mainImage
 * @property PlaceReview[] $activeReviews
 * @property string $link
 * @property PlaceLike|null $currentLike
 * @property PlaceLike[] $likes
 * @property PlaceView|null $currentView
 * @property PlaceView[] $views
 * @property Place[] $closest
 */
class Place extends \yii\db\ActiveRecord
{
	public $images_field;
    public $comforts_field;
    public $similar_field;
    public $metro_field;
    public $coordinates;

	const STATUS_DELETED    = 0;
	const STATUS_BLOCKED    = 5;
	const STATUS_CLOSE      = -1;
	const STATUS_ACTIVE     = 10;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'places';
    }

	public function behaviors()
	{
		return [
			TimestampBehavior::className(),
		];
	}

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'city_id', 'address'], 'required'],
            [['user_id', 'city_id', 'district_id', 'network_id', 'total_views', 'total_likes', 'status'], 'integer'],
            [['introtext', 'description'], 'string'],
            [['rating', 'latitude', 'longitude'], 'number'],
			[['alias'], 'unique'],
			[['images_field', 'comforts_field', 'metro_field', 'similar_field', 'coordinates'], 'safe'],
            [['name', 'address', 'phone', 'website', 'opening_hours'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'alias' => 'Алиас',
            'user_id' => 'Владелец',
            'city_id' => 'Город',
            'district_id' => 'Район',
            'network_id' => 'Сеть',
            'coordinates' => 'Координаты',
            'latitude' => 'Широта',
            'longitude' => 'Долгота',
            'address' => 'Адрес',
            'phone' => 'Телефон',
            'website' => 'Web-сайт',
            'introtext' => 'Аннотация',
            'description' => 'Описание',
            'opening_hours' => 'Часы работы',
            'rating' => 'Рейтинг',
            'images_field' => 'Изображения',
            'comforts_field' => 'Удобства',
            'metro_field' => 'Станции метро',
            'similar_field' => 'Похожие заведения',
            'total_views' => 'Кол-во просмотров',
            'total_likes' => 'Кол-во лайков',
			'status' => 'Статус',
			'created_at' => 'Дата добавления',
			'updated_at' => 'Дата обновления',
        ];
    }

    /**
	 * Relations
	 */
	public function getUser()
	{
		return $this->hasOne(User::className(), ['id' => 'user_id']);
	}

	public function getCity()
	{
		return $this->hasOne(City::className(), ['id' => 'city_id']);
	}

    public function getDistrict()
    {
        return $this->hasOne(District::className(), ['id' => 'district_id']);
    }

	public function getNetwork()
	{
		return $this->hasOne(PlaceNetwork::className(), ['id' => 'network_id']);
	}

	public function getImage()
    {
        return $this->hasOne(PlaceImage::className(), ['place_id' => 'id'])->orderBy(['position' => SORT_ASC]);
    }

    public function getImages()
    {
        return $this->hasMany(PlaceImage::className(), ['place_id' => 'id'])->orderBy(['position' => SORT_ASC]);
    }

    public function getReviews()
    {
        return $this->hasMany(PlaceReview::className(), ['place_id' => 'id']);
    }

    public function getActiveReviews()
    {
        return $this->hasMany(PlaceReview::className(), ['place_id' => 'id'])->where(['status' => PlaceReview::STATUS_ACTIVE]);
    }

    public function getPlaceComforts()
    {
        return $this->hasMany(PlaceComfort::className(), ['place_id' => 'id']);
    }

    public function getComforts()
    {
        return $this->hasMany(Comfort::className(), ['id' => 'comfort_id'])->via('placeComforts');
    }

    public function getPlaceMetro()
    {
        return $this->hasMany(PlaceMetro::className(), ['place_id' => 'id']);
    }

    public function getMetro()
    {
        return $this->hasMany(MetroStation::className(), ['id' => 'metro_id'])->via('placeMetro');
    }

    public function getPlaceSimilar()
    {
        return $this->hasMany(PlaceSimilar::className(), ['place_id' => 'id']);
    }

    public function getSimilar()
    {
        return $this->hasMany(Place::className(), ['id' => 'similar_id'])->via('placeSimilar');
    }

    public function getCurrentLike()
    {
        return $this->hasOne(PlaceLike::className(), ['place_id' => 'id'])
            ->andWhere(['ip' => Yii::$app->request->userIP])
            ->orFilterWhere(['user_id' => Yii::$app->user->id]);
    }

    public function getLikes()
    {
        return $this->hasMany(PlaceLike::className(), ['place_id' => 'id']);
    }

    public function getCurrentView()
    {
        return $this->hasOne(PlaceView::className(), ['place_id' => 'id'])
            ->andWhere(['ip' => Yii::$app->request->userIP])
            ->orFilterWhere(['user_id' => Yii::$app->user->id]);
    }

    public function getViews()
    {
        return $this->hasMany(PlaceView::className(), ['place_id' => 'id']);
    }

    public function getOpeningHours()
    {
        return $this->hasMany(PlaceOpeningHour::className(), ['place_id' => 'id']);
    }

    public function getDefaultCoordinates()
    {
        if ($this->longitude and $this->latitude) return implode(', ', [$this->latitude, $this->longitude]);
        if ($this->city) return $this->city->coordinates;
    }

    /**
     * @param int $limit
     * @return array|\yii\db\ActiveRecord[]
     */
    public function getClosest($limit = 3) {
        $query = self::find();
        $query->select(['*', '111.045 * DEGREES(ACOS(COS(RADIANS('.$this->latitude.'))
         * COS(RADIANS(latitude))
         * COS(RADIANS(longitude) - RADIANS('.$this->longitude.'))
         + SIN(RADIANS('.$this->latitude.'))
         * SIN(RADIANS(latitude))))
         AS distance_in_km']);
        $query->limit = $limit;
        $query->where(['!=', 'id', $this->id]);
        $query->andWhere(['!=', 'status', self::STATUS_ACTIVE]);
        $query->orderBy('distance_in_km ASC');
        return $query->all();
    }

    /**
     * @return string
     */
    public function getLink() {
        return Url::to([$this->city->alias.'/'.$this->alias]);
    }

    /**
     * @param int $width
     * @param int $height
     * @return string
     * @throws FileNotFoundException
     * @throws InvalidConfigException
     */
    public function getMainImage($width = 272, $height = 250)
    {
        if ($this->image) {
            return EasyThumbnailImage::thumbnailFileUrl(Yii::getAlias('@frontend_web').$this->image->path, 272, 250);
        } else {
            return '/design/uploads/place-1.jpg';
        }
    }

	/**
	 * Statuses
	 */
	public function getStatusName() {
		switch ($this->status) {
			case self::STATUS_DELETED:
				return 'Удалено';
				break;
			case self::STATUS_BLOCKED:
				return 'Заблокировано';
				break;
            case self::STATUS_CLOSE:
                return 'Закрыто';
                break;
			case self::STATUS_ACTIVE:
				return 'Активно';
				break;
			default:
				return '-';
				break;
		}
	}

	public function getStatusArr() {
		return [
            self::STATUS_ACTIVE => 'Активно',
			self::STATUS_CLOSE => 'Закрыто',
			self::STATUS_BLOCKED => 'Заблокировано',
		];
	}

	public function uploadImages()
	{
		$images_dir = Yii::getAlias('@frontend_web').'/files/places/'.$this->id;
        if (!file_exists($images_dir)) mkdir($images_dir, 0777, true);
        $images = UploadedFile::getInstances($this, 'images_field');
        foreach ($images as $key => $image) {
            $image_path = '/files/places/'.$this->id.'/'.$key.'.'.$image->extension;
            if ($image->saveAs(Yii::getAlias('@frontend_web').$image_path)) {
                $place_image = new PlaceImage();
                $place_image->place_id = $this->id;
                $place_image->path = $image_path;
                $place_image->position = $key;
                $place_image->save();
            }
        }
		return true;
	}

    public function saveComforts()
    {
        if (is_array($this->comforts_field)) {
            PlaceComfort::deleteAll(['place_id' => $this->id]);
            foreach ($this->comforts_field as $comfort_id) {
                $place_comfort = new PlaceComfort();
                $place_comfort->place_id = $this->id;
                $place_comfort->comfort_id = $comfort_id;
                $place_comfort->save();
            }
        }
        return true;
    }

    public function saveMetro()
    {
        if (is_array($this->metro_field)) {
            PlaceMetro::deleteAll(['place_id' => $this->id]);
            foreach ($this->metro_field as $metro_id) {
                $place_metro = new PlaceMetro();
                $place_metro->place_id = $this->id;
                $place_metro->metro_id = $metro_id;
                $place_metro->save();
            }
        }
        return true;
    }

    // public function saveComforts()
    // {
    //     if (is_array($this->comforts_field)) {
    //         $old_comforts = ArrayHelper::getColumn($this->getPlaceComforts()->all(), 'comfort_id');
    //         $new_comforts = $this->comforts_field;


    //         PlaceComfort::deleteAll(['place_id' => $this->id]);
    //         foreach ($this->comforts_field as $comfort_id) {
    //             $place_comfort = new PlaceComfort();
    //             $place_comfort->place_id = $this->id;
    //             $place_comfort->comfort_id = $comfort_id;
    //             $place_comfort->save();
    //         }

    //         foreach ($this->placeComforts as $old_place_comfort) {
    //             if (!in_array($old_place_comfort->comfort_id, $this->comforts_field)) {
    //                 $old_place_comfort->delete();
    //             }
    //         }

    //         foreach ($this->comforts_field as $new_place_comfort) {
    //             if (!in_array($new_place_comfort, $this->comforts_field)) {
    //                 $placeComforts->delete();
    //             }
    //         }

    //         было: отопление, вода
    //         стало: отопление, wi-fi
    //     }
    //     return true;
    // }

    /**
     * @return bool
     */
    public function saveSimilar()
    {
        if (is_array($this->similar_field)) {
            PlaceSimilar::deleteAll(['place_id' => $this->id]);
            foreach ($this->similar_field as $similar_id) {
                $place_similar = new PlaceSimilar();
                $place_similar->place_id = $this->id;
                $place_similar->similar_id = $similar_id;
                $place_similar->save();
            }
        }
        return true;
    }

    /**
     * @return array
     */
    public function getMetroNames() {
        return ArrayHelper::map($this->getMetro()->all(), 'id', 'name');
    }

    /**
     * @return bool
     */
    public function like() {
        if (!$this->currentLike) {
            return PlaceLike::create($this->id);
        }
        return false;
    }

    /**
     * @return bool|false|int
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function dislike() {
        if ($this->currentLike) {
            return $this->currentLike->delete();
        }
        return false;
    }

    /**
     * @return bool
     */
    public function view() {
        if (!$this->currentView) {
            return PlaceView::create($this->id);
        }
        return false;
    }
}
