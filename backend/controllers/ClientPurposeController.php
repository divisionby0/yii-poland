<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

use backend\models\client\ClientPurpose;
use backend\models\client\ClientPurposeSearch;

use common\helpers\PermissionHelpers;

/**
 * ClientPurposeController implements the CRUD actions for ClientPurpose model.
 */
class ClientPurposeController extends Controller
{
    public $index_label = 'Цель визита';

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'view', 'create', 'update', 'delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all ClientPurpose models.
     * @return mixed
     */
    public function actionIndex()
    {

        PermissionHelpers::checkPermission('Супервизор', 'user/index');

        $searchModel = new ClientPurposeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'index_label' => $this->index_label,
        ]);
    }

    /**
     * Displays a single ClientPurpose model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        if (!PermissionHelpers::requireMinimumRole('Супервизор')) {
            return $this->redirect(['user/index']);
        }

        return $this->render('view', [
            'model' => $this->findModel($id),
            'index_label' => $this->index_label,
        ]);
    }

    /**
     * Creates a new ClientPurpose model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (!PermissionHelpers::requireMinimumRole('Супервизор')) {
            return $this->redirect(['user/index']);
        }

        $model = new ClientPurpose();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'index_label' => $this->index_label,
            ]);
        }
    }

    /**
     * Updates an existing ClientPurpose model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        if (!PermissionHelpers::requireMinimumRole('Супервизор')) {
            return $this->redirect(['user/index']);
        }

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'index_label' => $this->index_label,
            ]);
        }
    }

    /**
     * Deletes an existing ClientPurpose model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        if (!PermissionHelpers::requireMinimumRole('Супервизор')) {
            return $this->redirect(['user/index']);
        }

        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ClientPurpose model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ClientPurpose the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ClientPurpose::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
