<?php

namespace backend\controllers;

use Yii;
use common\models\User;
use backend\models\UsersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use yii\web\UploadedFile;

/**
 * UsersController implements the CRUD actions for User model.
 */
class UsersController extends Controller
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
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UsersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
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
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();
        $model->scenario = 'create';

        if ($model->load(Yii::$app->request->post())) {
            $model->password = $model->password_field;
            $model->setPassword($model->password_field);
            $model->generateAuthKey();
            if ($model->validate() and $model->save()) {
                if ($image = UploadedFile::getInstance($model, 'avatar_field')) {
                    $image_path = '/files/avatar_'.time().'.'. $image->extension;
                    $image->saveAs(Yii::getAlias('@frontend_web').$image_path);
                    $model->avatar = $image_path;
                }
                $auth = Yii::$app->authManager;
                $userRole = $auth->getRole($model->role);
                $auth->assign($userRole, $model->id);
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $old_role = $model->role;

        if ($model->load(Yii::$app->request->post())) {
            if ($model->password_field) {
                $model->password = $model->password_field;
                $model->setPassword($model->password_field);
                $model->generateAuthKey();
            }
            if ($model->validate() and $model->save()) {
                if ($image = UploadedFile::getInstance($model, 'avatar_field')) {
                    $image_path = '/files/avatar_'.time().'.'. $image->extension;
                    $image->saveAs(Yii::getAlias('@frontend_web').$image_path);
                    $model->avatar = $image_path;
                }
                if ($old_role != $model->role) {
                    $auth = Yii::$app->authManager;
                    $auth->revokeAll($model->id);
                    $userRole = $auth->getRole($model->role);
                    $auth->assign($userRole, $model->id);
                }
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an image of User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDeleteImage($id)
    {
        $model = $this->findModel($id);
        if ($model->avatar and file_exists(Yii::getAlias('@frontend_web').$model->avatar)) {
            unlink(Yii::getAlias('@frontend_web').$model->avatar);
            $model->avatar = '';
            $model->save(false);
        }
        return $this->redirect(Yii::$app->request->referrer);
    }

    /**
     * Deletes an existing User model.
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
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
