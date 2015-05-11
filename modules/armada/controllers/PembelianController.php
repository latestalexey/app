<?php

namespace app\modules\armada\controllers;

use Yii;
use app\modules\armada\models\Pembelian;
use app\modules\armada\models\PembelianSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use dosamigos\tableexport\ButtonTableExport;
use dosamigos\tableexport\TableExportAction;

/**
 * PembelianController implements the CRUD actions for Pembelian model.
 */
class PembelianController extends Controller {

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
     * Lists all Pembelian models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new PembelianSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pembelian model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    public function actions() {
        return [

            'download' => [
                'class' => TableExportAction::className()
            ]
        ];
    }

    /**
     * Creates a new Pembelian model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Pembelian();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    public function actionExportToFile() {
                //echo 'test';
                header('Content-type: text/csv');
                header('Content-Disposition: attachment; filename="report-customers-' . date('YmdHi') .'.csv"');

                $model=new Customer('search');
                $model->unsetAttributes();  // clear any default values
                
                if(Yii::app()->user->getState('exportModel'))
                      $model=Yii::app()->user->getState('exportModel');

                $dataProvider = $model->search(false);
                
                // csv header
                echo    Customer::model()->getAttributeLabel("Id").",". 
                                Customer::model()->getAttributeLabel("Country_Id").",". 
                                Customer::model()->getAttributeLabel("Gender_Id").",".
                                Customer::model()->getAttributeLabel("First_Name").",".
                                Customer::model()->getAttributeLabel("Last_Name").
                                " \r\n";
                // csv data
                foreach ($dataProvider->getData() as $data) {
                        echo "$data->Id, $data->Country_Id, $data->Gender_Id, $data->First_Name, $data->Last_Name \r\n";
                }
                
                exit; 
        }
        
    /**
     * Updates an existing Pembelian model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Pembelian model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Pembelian model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pembelian the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Pembelian::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
