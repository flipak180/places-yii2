<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\web\UploadedFile;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "places".
 *
 * @property int $id
 * @property string $name
 * @property string $alias
 * @property int $user_id
 * @property int $city_id
 * @property int $network_id
 * @property string $coordinates
 * @property string $address
 * @property string $phone
 * @property string $website
 * @property string $introtext
 * @property string $description
 * @property string $rating
 * @property int $total_views
 * @property int $total_likes
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 */
class Place extends \yii\db\ActiveRecord
{
	public $images_field;
    public $comforts_field;

	const STATUS_DELETED    = 0;
	const STATUS_BLOCKED    = 5;
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
            [['name', 'user_id', 'city_id', 'coordinates', 'address'], 'required'],
            [['user_id', 'city_id', 'network_id', 'total_views', 'total_likes', 'status'], 'integer'],
            [['introtext', 'description'], 'string'],
            [['rating'], 'number'],
			[['alias'], 'unique'],
			[['images_field', 'comforts_field'], 'safe'],
            [['name', 'coordinates', 'address', 'phone', 'website'], 'string', 'max' => 255],
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
            'network_id' => 'Сеть',
            'coordinates' => 'Координаты',
            'address' => 'Адрес',
            'phone' => 'Телефон',
            'website' => 'Web-сайт',
            'introtext' => 'Аннотация',
            'description' => 'Описание',
            'rating' => 'Рейтинг',
            'images_field' => 'Изображения',
            'comforts_field' => 'Удобства',
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

    public function getPlaceComforts()
    {
        return $this->hasMany(PlaceComfort::className(), ['place_id' => 'id']);
    }

    public function getComforts()
    {
        return $this->hasMany(Comfort::className(), ['id' => 'comfort_id'])->via('placeComforts');
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
}
