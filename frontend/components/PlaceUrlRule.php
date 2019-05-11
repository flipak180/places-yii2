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
        if ($route === 'car/index') {
            if (isset($params['manufacturer'], $params['model'])) {
                return $params['manufacturer'] . '/' . $params['model'];
            } elseif (isset($params['manufacturer'])) {
                return $params['manufacturer'];
            }
        }
        return false; // this rule does not apply
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