<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "place_views".
 *
 * @property int $id
 * @property int $place_id
 * @property int $user_id
 * @property string $ip
 * @property int $created_at
 * @property int $updated_at
 */
class PlaceView extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'place_views';
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
     * @return \yii\db\ActiveQuery
     */
    public function getPlace()
    {
        return $this->hasOne(Place::className(), ['id' => 'place_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
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
        $model = new self();
        $model->place_id = $placeId;
        $model->ip = Yii::$app->request->userIP;
        $model->user_id = Yii::$app->user->id;
        return $model->save();
    }
}
