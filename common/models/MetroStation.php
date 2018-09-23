<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "metro_stations".
 *
 * @property int $id
 * @property string $name
 * @property int $city_id
 * @property int $district_id
 * @property string $longitude
 * @property string $latitude
 * @property int $created_at
 * @property int $updated_at
 */
class MetroStation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'metro_stations';
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
            [['name', 'city_id'], 'required'],
            [['city_id', 'district_id'], 'integer'],
            [['longitude', 'latitude'], 'number'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * Relations
     */
    public function getCity()
    {
        return $this->hasOne(City::className(), ['id' => 'city_id']);
    }

    public function getDistrict()
    {
        return $this->hasOne(District::className(), ['id' => 'district_id']);
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'city_id' => 'Город',
            'district_id' => 'Район',
            'longitude' => 'Долгота',
            'latitude' => 'Широта',
            'created_at' => 'Дата добавления',
            'updated_at' => 'Дата обновления',
        ];
    }
}
