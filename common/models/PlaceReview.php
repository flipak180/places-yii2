<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "place_reviews".
 *
 * @property int $id
 * @property int $place_id
 * @property int $user_id
 * @property string $name
 * @property string $text
 * @property string $rating
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 */
class PlaceReview extends \yii\db\ActiveRecord
{
    public $features;
    
    const STATUS_BLOCKED    = 0;
    const STATUS_INACTIVE   = 5;
    const STATUS_ACTIVE     = 10;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'place_reviews';
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
            [['name', 'place_id', 'user_id'], 'required'],
            [['place_id', 'user_id', 'status'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['text'], 'string'],
            [['features'], 'safe'],
            [['rating'], 'number'],
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

    public function getScores()
    {
        return $this->hasMany(PlaceReviewScore::className(), ['review_id' => 'id']);
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
            'name' => 'Название',
            'text' => 'Текст',
            'rating' => 'Общий рейтинг',
            'status' => 'Статус',
            'created_at' => 'Дата добавления',
            'updated_at' => 'Дата обновления',
        ];
    }

    /**
     * Statuses
     */
    public function getStatusName() {
        switch ($this->status) {
            case self::STATUS_BLOCKED:
                return 'Отклонен';
                break;
            case self::STATUS_INACTIVE:
                return 'Неактивен';
                break;
            case self::STATUS_ACTIVE:
                return 'Активен';
                break;
            default:
                return '-';
                break;
        }
    }

    public function getStatusArr() {
        return [
            self::STATUS_ACTIVE => 'Активен',
            self::STATUS_INACTIVE => 'Неактивен',
        ];
    }

    public function saveScores()
    {
        // $total_score = 0;
        // $total_features = 0;
        if (is_array($this->features)) {
            PlaceReviewScore::deleteAll(['review_id' => $this->id]);
            foreach ($this->features as $feature => $score) {
                $place_review_score = new PlaceReviewScore();
                $place_review_score->review_id = $this->id;
                $place_review_score->feature = $feature;
                $place_review_score->score = $score;
                $place_review_score->save();
                // if ($place_review_score->save()) {
                //     $total_score += $score;
                //     $total_features += 1;
                // }
            }
            // $this->rating = round($total_score / $total_features, 2);
            // $this->save(false);
        }
        return true;
    }
}
