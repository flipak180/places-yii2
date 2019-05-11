<?php

namespace backend\controllers;

use backend\models\PlacesSearch;
use backend\models\ReviewsSearch;
use common\models\Place;
use common\models\PlaceImage;
use common\models\PlaceOpeningHour;
use dastanaron\translit\Translit;
use himiklab\thumbnail\EasyThumbnailImage;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\imagine\Image;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

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
			'access' => [
				'class' => AccessControl::className(),
				'rules' => [
					[
						'allow' => true,
						'roles' => ['admin', 'manager'],
					],
				]
			],
        ];
    }

    /**
     * Lists all Place models.
     * @return mixed
     */
    public function actionIndex()
    {
        // $place = Place::findOne(32);
        // $elastic_place = new ElasticPlace();
        // $elastic_place->attributes = [
        //     'id' => $place->id,
        //     'name' => $place->name,
        //     'address' => $place->address,
        //     'description' => $place->description,
        // ];
        // $elastic_place->primaryKey = $place->id;
        // $elastic_place->save();

        //$result = ElasticPlace::find()->query(['match' => ['id' => 32]])->all();
        //Yii::info(print_r($result, 1));

        $searchModel = new PlacesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionImport()
    {
        $translit = new Translit();
        $places = json_decode(file_get_contents('places.txt'), 1);
        // foreach ($places as $place) {
        //     $new_place = new Place();
        //     $new_place->id            = $place['id'];
        //     $new_place->name          = $place['name'];
        //     $new_place->alias         = $translit->translit($place['name'], false, 'ru-en');
        //     $new_place->user_id       = $place['user_id'];
        //     $new_place->city_id       = $place['city_id'];
        //     $new_place->district_id   = $place['district_id'];
        //     $new_place->network_id    = $place['chain_id'];
        //     // $new_place->coordinates   = $place['name'];
        //     $new_place->latitude      = $place['latitude'];
        //     $new_place->longitude     = $place['longitude'];
        //     $new_place->address       = $place['address'] ? $place['address'] : '-';
        //     $new_place->phone         = $place['phone'];
        //     $new_place->website       = $place['website'];
        //     $new_place->introtext     = $place['introtext'];
        //     $new_place->description   = $place['content'];
        //     $new_place->opening_hours = $place['opening_hours'];
        //     $new_place->rating        = $place['rate'];
        //     // $new_place->images_field  = $place['name'];
        //     // $new_place->comforts_field = $place['name'];
        //     // $new_place->metro_field   = $place['name'];
        //     // $new_place->similar_field = $place['name'];
        //     $new_place->total_views   = $place['views'];
        //     $new_place->total_likes   = $place['recommendations'];
        //     $new_place->status        = $place['status'];
        //     $new_place->created_at    = $place['created_at'];
        //     $new_place->updated_at    = $place['updated_at'];
        //     if (!$new_place->save()) {
        //         Yii::info(print_r($new_place->errors, 1));
        //     } else {
        //         for ($i = 2; $i < 100; $i++) { 
        //             $new_place->alias = $new_place->alias.$i;
        //             if ($new_place->save()) break;
        //         }
        //     }
        // }
        return count($places);
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
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionViewReviews($id)
    {
        $model = $this->findModel($id);
        $searchModel = new ReviewsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('view-reviews', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);
    }

    /**
     * @param $id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException
     */
    public function actionOpeningHours($id)
    {
        $model = $this->findModel($id);

        $opening_hours = Yii::$app->request->post('shedule-hour', []);
        if (count($opening_hours)) {
            PlaceOpeningHour::deleteAll(['place_id' => $id]);
            foreach ($opening_hours as $weekday => $opening_weeks) {
                foreach ($opening_weeks as $hour => $opening_week) {
                    $place_opening_hour = new PlaceOpeningHour();
                    $place_opening_hour->place_id = $id;
                    $place_opening_hour->weekday = $weekday;
                    $place_opening_hour->hour = $hour;
                    $place_opening_hour->save();
                }
            }
            return $this->redirect(Yii::$app->request->referrer);
        }

        return $this->render('opening-hours', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new Place model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Place();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->uploadImages();
            $model->saveComforts();
            $model->saveSimilar();
            $model->saveMetro();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Place model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->comforts_field = ArrayHelper::getColumn($model->getPlaceComforts()->all(), 'comfort_id');
        $model->similar_field = ArrayHelper::getColumn($model->getPlaceSimilar()->all(), 'similar_id');
        $model->metro_field = ArrayHelper::getColumn($model->getPlaceMetro()->all(), 'metro_id');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->uploadImages();
            $model->saveComforts();
            $model->saveSimilar();
            $model->saveMetro();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an image of Product model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param $id
     * @return mixed
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionDeleteImage($id)
    {
        if ($image = PlaceImage::findOne(['id' => $id]) and file_exists(Yii::getAlias('@frontend_web').$image->path)) {
            unlink(Yii::getAlias('@frontend_web').$image->path);
            return $image->delete();
        }
        return;
    }

    /**
     * @param $order
     * @return bool
     */
    public function actionSortImages($order)
    {
        foreach (explode(';', $order) as $key => $image_id) {
            $image = PlaceImage::findOne(['id' => $image_id]);
            $image->position = $key;
            $image->save();
        }
        return true;
    }

    /**
     * @param $id
     * @param int $angle
     * @return string|void
     * @throws \himiklab\thumbnail\FileNotFoundException
     * @throws \yii\base\InvalidConfigException
     */
    public function actionRotateImage($id, $angle = 0)
    {
        if ($image_obj = PlaceImage::findOne($id)) {
            $image = Image::getImagine()->open(Yii::getAlias('@frontend_web').$image_obj->path);
            $image->rotate($angle)->save(Yii::getAlias('@frontend_web').$image_obj->path);
            return EasyThumbnailImage::thumbnailFileUrl(Yii::getAlias('@frontend_web').$image_obj->path, 160, 160, EasyThumbnailImage::THUMBNAIL_OUTBOUND);
        }
        return;
    }

    /**
     * Deletes an existing Place model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
		$model = $this->findModel($id);
		$model->status = Place::STATUS_DELETED;
		$model->save(false);
		return $this->redirect(['index']);
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
