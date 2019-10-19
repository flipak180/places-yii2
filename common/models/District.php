<?php

namespace common\models;

use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "districts".
 *
 * @property int $id
 * @property string $name
 * @property int $city_id
 * @property string $seo_text
 * @property int $created_at
 * @property int $updated_at
 */
class District extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'districts';
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
            [['name', 'city_id'], 'required'],
            [['city_id'], 'integer'],
            [['seo_text'], 'string'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(City::className(), ['id' => 'city_id']);
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'city_id' => 'Город',
            'seo_text' => 'SEO-текст',
            'created_at' => 'Дата добавления',
            'updated_at' => 'Дата обновления',
        ];
    }

    /**
     * @param null $cityId
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getList($cityId = null) {
        $query = self::find();
        if ($cityId) {
            $query->where(['city_id' => $cityId]);
        }
        return $query->orderby(['name' => SORT_ASC])->all();
    }
}
