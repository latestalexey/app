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
class CustomerTransactionsController extends Controller {

    public function behaviors() {
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
    public function actionIndex() {
        $searchModel = new CustomerTransactionsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CustomerTransactions model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new CustomerTransactions model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed

      public function actionCreate()
      {
      $model = new CustomerTransactions();

      if ($model->load(Yii::$app->request->post()) && $model->save()) {
      return $this->redirect(['view', 'id' => $model->TransactionNumber]);
      } else {
      return $this->render('create', [
      'model' => $model,
      ]);
      }
      }
     * 
     */
//    public function actionCreate() {
//        $model = new CustomerTransactions();
//        if ($model->load(Yii::$app->request->post())) {
//            $transaction = Yii::$app->db->beginTransaction();
//            try {
//                $model->customerTransactionDetails = Yii::$app->request->post('app\modules\b2b\models\CustomerTransactionDetails', []);
//                if ($model->save()) {
//                    $transaction->commit();
//                    return $this->redirect(['view', 'id' => $model->id]);
//                } else {
//                    $transaction->rollback();
//                }
//            } catch (Exception $e) {
//                $transaction->rollback();
//                throw $e;
//            }
//        }
//        return $this->render('create', ['model' => $model]);
//    }
//    public function actionCreate() {
//        $model = new CustomerTransactions();
//        $model->IsProcessed = 1;
//        $model->IsCancelled = 1;
//       
//      //  $model->TransactionDate = Setup::convert($model->TransactionDate, 'datetime');
//        $model->SLoc = 'BC09';
//        $model->CustId = Yii::$app->user->identity->username;
//
//        if ($model->load(Yii::$app->request->post())) {
//
//            $model->save();
//            return $this->redirect(['view', 'id' => $model->TransactionNumber]);
//        } else {
//            return $this->render('create', [
//                        'model' => $model,
//            ]);
//        }
//    }
    public function actionCreate() {
        $model = new CustomerTransactions();

        if ($model->load(Yii::$app->request->post())) {
            try {

                $insertCust = $model->CustId = Yii::$app->user->identity->username;
                $valueOut = Yii::$app->db->createCommand("declare @TransactionNumber nvarchar(11); exec spSetCustomerTransaction $insertCust, @TransactionNumber OUTPUT; select @TransactionNumber;");
                $valueOut->execute();
                $result = $valueOut;
             //   print_r($valueOut);exit;

//                    $addProduct = $obj->ExecuteQuery("Begin;DECLARE @ProductCode as varchar (100) ;EXEC CREATEPRODUCT'$pname', '$price', @ProductCode OUTPUT, '$merchantId';select @ProductCode;End;");
//    $productCode = $addProduct[0][0];
            } catch (Exception $e) {
                Log::trace("Error : " . $e);
                throw new Exception("Error : " . $e);
            }

            return $this->redirect(['update', 'id' => $model->CustId]);
        }
        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    public function actionBatchUpdate() {
// retrieve items to be updated in a batch mode
// assuming each item is of model class 'Item'
        $items = $this->getItemsToUpdate();
        if (Model::loadMultiple($items, Yii::$app->request->post()) &&
                Model::validateMultiple($items)) {
            $count = 0;
            foreach ($items as $item) {
// populate and save records for each model
                if ($item->save()) {
// do something here after saving
                    $count++;
                }
            }
            Yii::$app->session->setFlash('success', "Processed {$count} records successfully.");
            return $this->redirect(['index']); // redirect to your next desired page
        } else {
            return $this->render('update', [
                        'items' => $items,
            ]);
        }
    }

    /**
     * Updates an existing CustomerTransactions model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->TransactionNumber]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing CustomerTransactions model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the CustomerTransactions model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return CustomerTransactions the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = CustomerTransactions::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
