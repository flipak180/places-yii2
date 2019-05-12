<?php

namespace app\components;

use common\models\City;
use common\models\Place;
use yii\base\BaseObject;
use yii\web\UrlRuleInterface;

class PlaceUrlRule extends BaseObject implements UrlRuleInterface
{
    public function createUrl($manager, $route, $params)
    {
        if ($route === 'places/view') {
            if (isset($params['id']) and $place = Place::findOne($params['id'])) {
                return $place->city->alias . '/' . $place->alias;
            }
        }
        if ($route === 'places/index') {
            if (isset($params['city']) and $city = City::findOne($params['city'])) {
                return $city->alias;
            }
        }
        return false;
    }

    public function parseRequest($manager, $request)
    {
        $pathParts = explode('/', $request->getPathInfo());
        if (isset($pathParts[0]) and $city = City::findOne(['alias' => $pathParts[0]])) {
            if (isset($pathParts[1]) and $place = Place::findOne(['alias' => $pathParts[1]])) {
                return ['places/view', ['id' => $place->id]];
            }
            return ['places/index', ['city_id' => $city->id]];
        }
        return false;
    }
}