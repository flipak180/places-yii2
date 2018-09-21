<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "place_review_scores".
 *
 * @property int $id
 * @property int $review_id
 * @property int $feature
 * @property string $score
 * @property int $created_at
 * @property int $updated_at
 */
class PlaceReviewScore extends \yii\db\ActiveRecord
{
    const FEATURE_PRICE     = 1;
    const FEATURE_LOCATION  = 2;
    const FEATURE_SERVICE   = 3;
    const FEATURE_ASSORT    = 4;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'place_review_scores';
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
            [['review_id', 'feature'], 'required'],
            [['review_id', 'feature'], 'integer'],
            [['score'], 'number'],
        ];
    }

    /**
     * Relations
     */
    public function getReview()
    {
        return $this->hasOne(PlaceReview::className(), ['id' => 'review_id']);
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'review_id' => 'Отзыв',
            'feature' => 'Особенность',
            'score' => 'Оценка',
            'created_at' => 'Дата добавления',
            'updated_at' => 'Дата обновления',
        ];
    }

    /**
     * Features
     */
    public function getFeatureName() {
        switch ($this->feature) {
            case self::FEATURE_PRICE:
                return 'Цена/Качество';
                break;
            case self::FEATURE_LOCATION:
                return 'Местоположение';
                break;
            case self::FEATURE_SERVICE:
                return 'Обслуживание';
                break;
            case self::FEATURE_ASSORT:
                return 'Ассортимент';
                break;
            default:
                return '-';
                break;
        }
    }

    public function getFeatureArr() {
        return [
            self::FEATURE_PRICE => 'Цена/Качество',
            self::FEATURE_LOCATION => 'Местоположение',
            self::FEATURE_SERVICE => 'Обслуживание',
            self::FEATURE_ASSORT => 'Ассортимент',
        ];
    }
}
