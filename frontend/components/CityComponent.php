<?php


namespace frontend\components;

use common\models\City;
use Yii;
use yii\base\Component;

/**
 * This is the model class for table "places".
 *
 * @property City $current
 * @property City[] $all
 * @property City[] $top
 * @property City[] $other
 */
class CityComponent extends Component
{
    public $current;
    public $all;
    public $top;
    public $other;

    /**
     *
     */
    public function init() {
        parent::init();
        $this->getCurrent();
        $this->getAll();
        $this->getList();
    }

    /**
     *
     */
    private function getCurrent() {
        if ($city_id = Yii::$app->session->get('city_id')) {
            $this->current = City::findOne($city_id);
        } else {
            $xml = @simplexml_load_file('http://ipgeobase.ru:7020/geo?ip='.Yii::$app->request->userIP);
            $this->current = isset($xml->ip->city) ? City::findOne(['name' => $xml->ip->city]) : null;
            if (!$this->current) $this->current = City::findOne(21);
            Yii::$app->session->set('city_id', $this->current->id);
        }
    }

    /**
     *
     */
    private function getAll() {
        $this->all = City::find()->orderBy(['position' => SORT_DESC, 'name' => SORT_ASC])->all();
    }

    /**
     *
     */
    private function getList() {
        foreach ($this->all as $city) {
            if (in_array($city->id, [12, 21])) {
                $this->top[] = $city;
            } else {
                $this->other[] = $city;
            }
        }
    }
}
