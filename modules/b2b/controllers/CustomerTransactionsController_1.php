<?php

namespace app\modules\b2b\controllers;

use Yii;
use app\modules\b2b\models\CustomerTransactions;
use app\modules\b2b\models\CustomerTransactionsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\User;
use yii\base\Model;
use yii\db\mssql\PDO;

/**
 * CustomerTransactionsController implements the CRUD actions for CustomerTransactions model.
 */
class CustomerTransactionsController extends Controller
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
     * Lists all CustomerTransactions models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CustomerTransactionsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CustomerTransactions model.
     * @param string $ProdId
     * @param string $TransactionNumber
     * @return mixed
     */
    public function actionView($TransactionNumber)
    {
        return $this->render('view', [
            'model' => $this->findModel($TransactionNumber),
        ]);
    }

   
    /**
     * Creates a new CustomerTransactions model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CustomerTransactions();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'TransactionNumber' => $model->TransactionNumber]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing CustomerTransactions model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $ProdId
     * @param string $TransactionNumber
     * @return mixed
     */
    public function actionUpdate($TransactionNumber)
    {
        $model = $this->findModel($TransactionNumber);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'TransactionNumber' => $model->TransactionNumber]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing CustomerTransactions model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $ProdId
     * @param string $TransactionNumber
     * @return mixed
     */
    public function actionDelete($TransactionNumber)
    {
        $this->findModel($TransactionNumber)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the CustomerTransactions model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $ProdId
     * @param string $TransactionNumber
     * @return CustomerTransactions the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($TransactionNumber)
    {
        if (($model = CustomerTransactions::findOne(['TransactionNumber' => $TransactionNumber])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
