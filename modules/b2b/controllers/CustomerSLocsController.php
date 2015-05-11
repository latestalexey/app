<?php

namespace app\modules\b2b\controllers;

use Yii;
use app\modules\b2b\models\CustomerSLocs;
use app\modules\b2b\models\CustomerSLocsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CustomerSLocsController implements the CRUD actions for CustomerSLocs model.
 */
class CustomerSLocsController extends Controller {

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
     * Lists all CustomerSLocs models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new CustomerSLocsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CustomerSLocs model.
     * @param string $CustId
     * @param string $SLoc
     * @return mixed
     */
    public function actionView($CustId, $SLoc) {
        return $this->render('view', [
                    'model' => $this->findModel($CustId, $SLoc),
        ]);
    }

    /**
     * Creates a new CustomerSLocs model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed

      public function actionCreate()
      {
      $model = new CustomerSLocs();
      $model->IsActive='1';
      if ($model->load(Yii::$app->request->post()) && $model->save()) {
      return $this->redirect(['view', 'CustId' => $model->CustId, 'SLoc' => $model->SLoc]);
      } else {
      return $this->render('create', [
      'model' => $model,
      ]);
      }
      }
     */
    public function actionCreate() {
        $model = new CustomerSLocs();

        if ($model->load(Yii::$app->request->post())) {
            try {
               
                $command = Yii::$app->db->createCommand("spSetCustomerSLocs  @custId =:custId, @Sloc =:Sloc, @isActive =:isActive ");
                $command->bindParam(":Sloc", $Sloc);
                $command->bindParam(":custId", $CustId);
                $command->bindParam(":isActive", $IsActive);
                $command->execute();
                $model->save();
            } catch (Exception $e) {
                Log::trace("Error : " . $e);
                throw new Exception("Error : " . $e);
            }
            return $this->redirect(['view', 'CustId' => $model->CustId, 'SLoc' => $model->SLoc]);
        }
        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing CustomerSLocs model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $CustId
     * @param string $SLoc
     * @return mixed

      public function actionUpdate($CustId, $SLoc) {
      $model = $this->findModel($CustId, $SLoc);

      if ($model->load(Yii::$app->request->post()) && $model->save()) {
      return $this->redirect(['view', 'CustId' => $model->CustId, 'SLoc' => $model->SLoc]);
      } else {
      return $this->render('update', [
      'model' => $model,
      ]);
      }
      }
     */
    public function actionUpdate($CustId, $SLoc) {
        $model = $this->findModel($CustId, $SLoc);
        if ($model->load(Yii::$app->request->post())) {
            try {

                $command = Yii::$app->db->createCommand("spSetCustomerSLocs  @custId =:custId, @Sloc =:Sloc, @isActive =:isActive ");
                $command->bindParam(":Sloc", $Sloc);
                $command->bindParam(":custId", $custId);
                $command->bindParam(":isActive", $isActive);
                $command->execute();
                $model->save();
            } catch (Exception $e) {
                Log::trace("Error : " . $e);
                throw new Exception("Error : " . $e);
            }
            return $this->redirect(['view', 'CustId' => $model->CustId, 'SLoc' => $model->SLoc]);
        }
        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing CustomerSLocs model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $CustId
     * @param string $SLoc
     * @return mixed
     */
    public function actionDelete($CustId, $SLoc) {
        $this->findModel($CustId, $SLoc)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the CustomerSLocs model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $CustId
     * @param string $SLoc
     * @return CustomerSLocs the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($CustId, $SLoc) {
        if (($model = CustomerSLocs::findOne(['CustId' => $CustId, 'SLoc' => $SLoc])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
