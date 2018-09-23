<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "place_opening_hours".
 *
 * @property int $id
 * @property int $place_id
 * @property int $weekday
 * @property string $open_hour
 * @property string $close_hour
 * @property int $created_at
 * @property int $updated_at
 */
class PlaceOpeningHour extends \yii\db\ActiveRecord
{
    // https://stackoverflow.com/questions/4464898/best-way-to-store-working-hours-and-query-it-efficiently/4465072
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'place_opening_hours';
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
            [['place_id', 'weekday', 'open_hour', 'close_hour'], 'required'],
            [['place_id', 'weekday'], 'integer'],
            [['open_hour', 'close_hour'], 'safe'],
        ];
    }

    /**
     * Relations
     */
    public function getPlace()
    {
        return $this->hasOne(Place::className(), ['id' => 'place_id']);
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'place_id' => 'Заведение',
            'weekday' => 'День недели',
            'open_hour' => 'Открытие',
            'close_hour' => 'Закрытие',
            'created_at' => 'Дата добавления',
            'updated_at' => 'Дата обновления',
        ];
    }
}
