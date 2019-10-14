<?php

namespace common\models;

use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "cities".
 *
 * @property int $id
 * @property string $name
 * @property string $alias
 * @property string $padezh_rodit
 * @property string $padezh_predl
 * @property int $time_shift
 * @property string $seo_text
 * @property string $latitude
 * @property string $longitude
 * @property int $created_at
 * @property int $updated_at
 */
class City extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cities';
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
            [['name', 'alias'], 'required'],
            [['time_shift'], 'integer'],
            [['seo_text'], 'string'],
            [['latitude', 'longitude'], 'number'],
            [['name', 'alias', 'padezh_rodit', 'padezh_predl'], 'string', 'max' => 255],
        ];
    }

    /**
     * Relations
     */
    public function getCoordinates()
    {
        return implode(',', [$this->longitude, $this->latitude]);
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
            'padezh_rodit' => 'Чего?',
            'padezh_predl' => 'О чем?',
            'time_shift' => 'Разница во времени',
            'seo_text' => 'SEO-текст',
            'latitude' => 'Широта',
            'longitude' => 'Долгота',
            'created_at' => 'Дата добавления',
            'updated_at' => 'Дата обновления',
        ];
    }

    public function geocodeAll() {
        foreach (self::find()->all() as $city) {
            $xml = simplexml_load_file('https://geocode-maps.yandex.ru/1.x/?geocode='.$city->name);
            if ($coords_str = $xml->GeoObjectCollection->featureMember[0]->GeoObject->Point->pos) {
                $coords_arr = explode(' ', $coords_str);
                $city->latitude = $coords_arr[0];
                $city->longitude = $coords_arr[1];
                $city->save(false);
            }
        }
    }

    /**
     * @return array
     */
    public static function getList() {
        return ArrayHelper::map(self::find()->all(), 'id', 'name');
    }
}
