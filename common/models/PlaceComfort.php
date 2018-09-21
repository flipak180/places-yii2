<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "place_comforts".
 *
 * @property int $id
 * @property int $place_id
 * @property int $comfort_id
 * @property int $created_at
 * @property int $updated_at
 */
class PlaceComfort extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'place_comforts';
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
            [['place_id', 'comfort_id'], 'required'],
            [['place_id', 'comfort_id'], 'integer'],
        ];
    }

    /**
     * Relations
     */
    public function getPlace()
    {
        return $this->hasOne(Place::className(), ['id' => 'place_id']);
    }

    public function getComfort()
    {
        return $this->hasOne(Comfort::className(), ['id' => 'comfort_id']);
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'place_id' => 'Заведение',
            'comfort_id' => 'Удобство',
            'created_at' => 'Дата добавления',
            'updated_at' => 'Дата обновления',
        ];
    }
}
