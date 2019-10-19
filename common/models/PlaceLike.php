<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "place_likes".
 *
 * @property int $id
 * @property int $place_id
 * @property int $user_id
 * @property string $ip
 * @property int $created_at
 * @property int $updated_at
 */
class PlaceLike extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'place_likes';
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
            [['place_id', 'ip'], 'required'],
            [['place_id', 'user_id'], 'integer'],
            [['ip'], 'ip']
        ];
    }

    /**
     * Relations
     */
    public function getPlace()
    {
        return $this->hasOne(Place::className(), ['id' => 'place_id']);
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'place_id' => 'Заведение',
            'user_id' => 'Пользователь',
            'ip' => 'Ip',
            'created_at' => 'Дата добавления',
            'updated_at' => 'Дата обновления',
        ];
    }

    /**
     * @param $placeId
     * @return bool
     */
    public static function create($placeId) {
        $like = new self();
        $like->place_id = $placeId;
        $like->ip = Yii::$app->request->userIP;
        $like->user_id = Yii::$app->user->id;
        return $like->save();
    }
}
