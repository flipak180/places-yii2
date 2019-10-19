<?php

namespace frontend\controllers;

use common\models\Place;
use frontend\models\PlacesSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

/**
 * PlacesController implements the CRUD actions for Place model.
 */
class PlacesController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
			
        ];
    }

    /**
     * Lists all Place models.
     * @param null $city_id
     * @return mixed
     */
    public function actionIndex($city_id = null)
    {
        $searchModel = new PlacesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $city_id);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Lists all Place models for map.
     * @return mixed
     */
    public function actionMap()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        return Place::find()->where(['city_id' => Yii::$app->places->city->id])->select('name, latitude, longitude')->all();
    }

    /**
     * Displays a single Place model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * @param $id
     * @return Response
     */
    public function actionLike($id) {
        if ($place = Place::findOne($id)) {
            $place->like();
        }

        return $this->redirect(Yii::$app->request->referrer);
    }

    /**
     * @param $id
     * @return Response
     */
    public function actionDislike($id) {
        if ($place = Place::findOne($id)) {
            $place->dislike();
        }

        return $this->redirect(Yii::$app->request->referrer);
    }

    /**
     * Finds the Place model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Place the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Place::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
