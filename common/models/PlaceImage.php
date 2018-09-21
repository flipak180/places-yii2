<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "place_images".
 *
 * @property int $id
 * @property int $place_id
 * @property string $path
 * @property int $position
 * @property int $created_at
 * @property int $updated_at
 */
class PlaceImage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'place_images';
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
            [['place_id', 'path'], 'required'],
            [['place_id', 'position'], 'integer'],
            [['path'], 'string', 'max' => 255],
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
            'path' => 'Путь',
            'position' => 'Позиция',
            'created_at' => 'Дата добавления',
            'updated_at' => 'Дата обновления',
        ];
    }
}
