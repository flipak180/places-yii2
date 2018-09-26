<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "place_metro".
 *
 * @property int $id
 * @property int $place_id
 * @property int $metro_id
 * @property int $created_at
 * @property int $updated_at
 */
class PlaceMetro extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'place_metro';
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
            [['place_id', 'metro_id'], 'required'],
            [['place_id', 'metro_id'], 'integer'],
        ];
    }

    /**
     * Relations
     */
    public function getPlace()
    {
        return $this->hasOne(Place::className(), ['id' => 'place_id']);
    }

    public function getMetro()
    {
        return $this->hasOne(MetroStation::className(), ['id' => 'metro_id']);
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'place_id' => 'Заведение',
            'metro_id' => 'Станция метро',
            'created_at' => 'Дата добавления',
            'updated_at' => 'Дата обновления',
        ];
    }
}
