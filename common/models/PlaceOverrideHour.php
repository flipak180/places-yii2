<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "place_override_hours".
 *
 * @property int $id
 * @property int $place_id
 * @property string $start_date
 * @property string $end_date
 * @property int $weekday
 * @property string $open_hour
 * @property string $close_hour
 * @property int $closed
 * @property int $created_at
 * @property int $updated_at
 */
class PlaceOverrideHour extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'place_override_hours';
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
            [['place_id', 'start_date', 'end_date', 'weekday', 'open_hour', 'close_hour', 'closed'], 'required'],
            [['place_id', 'weekday', 'closed'], 'integer'],
            [['start_date', 'end_date', 'open_hour', 'close_hour'], 'safe'],
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
            'start_date' => 'Начало периода',
            'end_date' => 'Конец периода',
            'weekday' => 'День недели',
            'open_hour' => 'Открытие',
            'close_hour' => 'Закрытие',
            'closed' => 'Закрыт',
            'created_at' => 'Дата добавления',
            'updated_at' => 'Дата обновления',
        ];
    }
}
