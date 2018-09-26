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
 * @property int $hour
 * @property int $created_at
 * @property int $updated_at
 */
class PlaceOpeningHour extends \yii\db\ActiveRecord
{
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
            [['place_id', 'weekday', 'hour'], 'required'],
            [['place_id', 'weekday', 'hour'], 'integer'],
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
            'hour' => 'Час',
            'created_at' => 'Дата добавления',
            'updated_at' => 'Дата обновления',
        ];
    }
}
