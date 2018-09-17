<?php

namespace common\models;

use Yii;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "places".
 *
 * @property int $id
 * @property string $name
 * @property string $alias
 * @property int $user_id
 * @property int $city_id
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
			//TODO а надо ли? может на лету генерить в поле проще?
			[
				'class' => SluggableBehavior::className(),
				'attribute' => 'name',
				'slugAttribute' => 'alias',
				'ensureUnique' => true,
			],
		];
	}

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'user_id', 'city_id', 'coordinates', 'address'], 'required'],
            [['user_id', 'city_id', 'total_views', 'total_likes', 'status'], 'integer'],
            [['introtext', 'description'], 'string'],
            [['rating'], 'number'],
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
            'coordinates' => 'Координаты',
            'address' => 'Адрес',
            'phone' => 'Телефон',
            'website' => 'Web-сайт',
            'introtext' => 'Аннотация',
            'description' => 'Описание',
            'rating' => 'Рейтинг',
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
}
