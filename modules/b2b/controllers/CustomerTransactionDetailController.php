<?php

namespace app\modules\b2b\controllers;

use Yii;
use app\modules\b2b\models\CustomerTransactionDetails;
use app\modules\b2b\models\CustomerTransactionDetailsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CustomerTransactionDetailController implements the CRUD actions for CustomerTransactionDetails model.
 */
class CustomerTransactionDetailController extends Controller
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
     * Lists all CustomerTransactionDetails models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CustomerTransactionDetailsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CustomerTransactionDetails model.
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
     * Creates a new CustomerTransactionDetails model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CustomerTransactionDetails();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ProdId' => $model->ProdId, 'TransactionNumber' => $model->TransactionNumber]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing CustomerTransactionDetails model.
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
     * Deletes an existing CustomerTransactionDetails model.
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
     * Finds the CustomerTransactionDetails model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $ProdId
     * @param string $TransactionNumber
     * @return CustomerTransactionDetails the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($ProdId, $TransactionNumber)
    {
        if (($model = CustomerTransactionDetails::findOne(['ProdId' => $ProdId, 'TransactionNumber' => $TransactionNumber])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
