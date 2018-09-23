<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "cities".
 *
 * @property int $id
 * @property string $name
 * @property string $alias
 * @property string $padezh_rodit
 * @property string $padezh_predl
 * @property int $time_shift
 * @property string $seo_text
 * @property int $created_at
 * @property int $updated_at
 */
class City extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cities';
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
            [['name', 'alias'], 'required'],
            [['time_shift'], 'integer'],
            [['seo_text'], 'string'],
            [['name', 'alias', 'padezh_rodit', 'padezh_predl'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'alias' => 'Алиас',
            'padezh_rodit' => 'Чего?',
            'padezh_predl' => 'О чем?',
            'time_shift' => 'Разница во времени',
            'seo_text' => 'SEO-текст',
            'created_at' => 'Дата добавления',
            'updated_at' => 'Дата обновления',
        ];
    }
}
