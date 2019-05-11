<?php

namespace frontend\components;

use common\models\City;
use Yii;
use yii\base\Component;

/**
 * PlacesComponent is the model behind the contact form.
 */
class PlacesComponent extends Component
{
    public $city;

    public function init() {
        parent::init();

        // Город
        $city_id = Yii::$app->session->get('city_id');
        if ($city_id) {
            $this->city = City::findOne($city_id);
        } else {
            $xml = @simplexml_load_file('http://ipgeobase.ru:7020/geo?ip='.Yii::$app->request->userIP);
            $this->city = isset($xml->ip->city) ? City::findOne(['name' => $xml->ip->city]) : null;
            if (!$this->city) $this->city = City::findOne(21);
            Yii::$app->session->set('city_id', $this->city->id);
        }
    }
}