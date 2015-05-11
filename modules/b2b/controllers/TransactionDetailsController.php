<?php

namespace app\modules\b2b\controllers;

use Yii;
use app\modules\b2b\models\TransactionDetails;
use app\modules\b2b\models\TransactionDetailsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TransactionDetailsController implements the CRUD actions for TransactionDetails model.
 */
class TransactionDetailsController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all TransactionDetails models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TransactionDetailsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TransactionDetails model.
     * @param string $ProdId
     * @param string $TransactionNumber
     * @return mixed
     */
    public function actionView($ProdId, $TransactionNumber)
    {
        return $this->render('view', [
            'model' => $this->findModel($ProdId, $TransactionNumber),
        ]);
    }

    /**
     * Creates a new TransactionDetails model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TransactionDetails();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ProdId' => $model->ProdId, 'TransactionNumber' => $model->TransactionNumber]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing TransactionDetails model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $ProdId
     * @param string $TransactionNumber
     * @return mixed
     */
    public function actionUpdate($ProdId, $TransactionNumber)
    {
        $model = $this->findModel($ProdId, $TransactionNumber);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ProdId' => $model->ProdId, 'TransactionNumber' => $model->TransactionNumber]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing TransactionDetails model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $ProdId
     * @param string $TransactionNumber
     * @return mixed
     */
    public function actionDelete($ProdId, $TransactionNumber)
    {
        $this->findModel($ProdId, $TransactionNumber)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TransactionDetails model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $ProdId
     * @param string $TransactionNumber
     * @return TransactionDetails the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($ProdId, $TransactionNumber)
    {
        if (($model = TransactionDetails::findOne(['ProdId' => $ProdId, 'TransactionNumber' => $TransactionNumber])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
