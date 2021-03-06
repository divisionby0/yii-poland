<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

use backend\models\client\ClientNationality;
use backend\models\client\ClientNationalitySearch;

use common\helpers\PermissionHelpers;

/**
 * ClientNationalityController implements the CRUD actions for ClientNationality model.
 */
class ClientNationalityController extends Controller
{

    public $index_label = 'Национальность клиента';

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
     * Lists all ClientNationality models.
     * @return mixed
     */
    public function actionIndex()
    {
        PermissionHelpers::checkPermission('Супервизор', 'user/index');

        $searchModel = new ClientNationalitySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'index_label' => $this->index_label,
        ]);
    }

    /**
     * Displays a single ClientNationality model.
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
     * Creates a new ClientNationality model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        PermissionHelpers::checkPermission('Супервизор', 'user/index');

        $model = new ClientNationality();

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
     * Updates an existing ClientNationality model.
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
     * Deletes an existing ClientNationality model.
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
     * Finds the ClientNationality model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ClientNationality the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ClientNationality::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
