<?php

namespace backend\controllers;

use Yii;
use common\models\Place;
use common\models\PlaceImage;
use common\models\PlaceOpeningHour;
use backend\models\PlacesSearch;
use backend\models\ReviewsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use yii\web\UploadedFile;
use yii\imagine\Image;
use himiklab\thumbnail\EasyThumbnailImage;
use yii\helpers\ArrayHelper;

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
        $searchModel = new PlacesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
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
     * @param integer $image_id
     * @return mixed
     */
    public function actionDeleteImage($id)
    {
        if ($image = PlaceImage::findOne(['id' => $id]) and file_exists(Yii::getAlias('@frontend_web').$image->path)) {
            unlink(Yii::getAlias('@frontend_web').$image->path);
            return $image->delete();
        }
        return;
    }

    public function actionSortImages($order)
    {
        foreach (explode(';', $order) as $key => $image_id) {
            $image = PlaceImage::findOne(['id' => $image_id]);
            $image->position = $key;
            $image->save();
        }
        return true;
    }

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
		$model->status = User::STATUS_DELETED;
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
