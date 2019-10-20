<?php
namespace frontend\models\forms;

use Yii;
use yii\base\Model;

/**
 * Search form in header
 */
class HeaderSearchForm extends Model
{
    public $city;

    public function __construct($config = [])
    {
        $this->city = Yii::$app->city->current->id;
        parent::__construct($config);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['city'], 'required'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'city' => 'Город',
        ];
    }
}
