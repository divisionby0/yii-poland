<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

use backend\models\client\ClientState;
use backend\models\client\ClientStateSearch;

use common\helpers\PermissionHelpers;

/**
 * ClientStateController implements the CRUD actions for ClientState model.
 */
class ClientStateController extends Controller
{

    public $index_label = 'Состояние заявки';

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
     * Lists all ClientState models.
     * @return mixed
     */
    public function actionIndex()
    {
        PermissionHelpers::checkPermission('Супервизор', 'user/index');

        $searchModel = new ClientStateSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'index_label' => $this->index_label,
        ]);
    }

    /**
     * Displays a single ClientState model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        PermissionHelpers::checkPermission('Супервизор', 'user/index');

        return $this->render('view', [
            'model' => $this->findModel($id),
            'index_label' => $this->index_label,
        ]);
    }

    /**
     * Creates a new ClientState model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        PermissionHelpers::checkPermission('Супервизор', 'user/index');

        $model = new ClientState();

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
     * Updates an existing ClientState model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        PermissionHelpers::checkPermission('Супервизор', 'user/index');

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
     * Deletes an existing ClientState model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        PermissionHelpers::checkPermission('Супервизор', 'user/index');

        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ClientState model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ClientState the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ClientState::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
