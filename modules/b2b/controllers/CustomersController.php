<?php

namespace app\modules\b2b\controllers;

use Yii;
use app\modules\b2b\models\Customers;
use app\modules\b2b\models\CustomersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CustomersController implements the CRUD actions for Customers model.
 */
class CustomersController extends Controller {

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
     * Lists all Customers models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new CustomersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Customers model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Customers model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed

      public function actionCreate()
      {
      $model = new Customers();
      $model->CustPassword='e4343wer4khifeh';
      if ($model->load(Yii::$app->request->post()) && $model->save()) {
      return $this->redirect(['view', 'id' => $model->CustId]);
      } else {
      return $this->render('create', [
      'model' => $model,
      ]);
      }
      }
     * 
     * @return mixed
     * @throws Exception
     */
    public function actionCreate() {
        $model = new Customers();
        if ($model->load(Yii::$app->request->post())) {
            try {

                $command = Yii::$app->db->createCommand("spSetCustomer @CustId =:CustId, @CustPassword =:CustPassword, @CustName =:CustName, @Address =:Address, @City =:City, @PhoneNumber =:PhoneNumber, @ContactPerson =:ContactPerson, @MobileNumber =:MobileNumber");
                $command->bindParam(":CustId", $CustId);
                $command->bindParam(":CustPassword", $CustPassword);
                $command->bindParam(":CustName", $CustName);
                $command->bindParam(":Address", $Address);
                $command->bindParam(":City", $City);
                $command->bindParam(":PhoneNumber", $PhoneNumber);
                $command->bindParam(":ContactPerson", $ContactPerson);
                $command->bindParam(":MobileNumber", $MobileNumber);
                $command->execute();
                $model->save();
            } catch (Exception $e) {
                Log::trace("Error : " . $e);
                throw new Exception("Error : " . $e);
            }
            return $this->redirect(['view', 'id' => $model->CustId]);
        }
        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing Customers model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed

      public function actionUpdate($id) {
      $model = $this->findModel($id);

      if ($model->load(Yii::$app->request->post()) && $model->save()) {
      return $this->redirect(['view', 'id' => $model->CustId]);
      } else {
      return $this->render('update', [
      'model' => $model,
      ]);
      }
      }
     * 
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            try {

                $command = Yii::$app->db->createCommand("spSetCustomer @CustId =:CustId, @CustPassword =:CustPassword, @CustName =:CustName, @Address =:Address, @City =:City, @PhoneNumber =:PhoneNumber, @ContactPerson =:ContactPerson, @MobileNumber =:MobileNumber");
                $command->bindParam(":CustId", $CustId);
                $command->bindParam(":CustPassword", $CustPassword);
                $command->bindParam(":CustName", $CustName);
                $command->bindParam(":Address", $Address);
                $command->bindParam(":City", $City);
                $command->bindParam(":PhoneNumber", $PhoneNumber);
                $command->bindParam(":ContactPerson", $ContactPerson);
                $command->bindParam(":MobileNumber", $MobileNumber);
                $command->execute();
                $model->save();
                
            } catch (Exception $e) {
                Log::trace("Error : " . $e);
                throw new Exception("Error : " . $e);
            }
            return $this->redirect(['view', 'id' => $model->CustId]);
        }
        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Customers model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Customers model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Customers the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Customers::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
