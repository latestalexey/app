<?php

namespace app\modules\b2b\controllers;

use Yii;
use app\modules\b2b\models\Slocs;
use app\modules\b2b\models\SlocsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SlocsController implements the CRUD actions for Slocs model.
 */
class SlocsController extends Controller {

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
     * Lists all Slocs models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new SlocsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Slocs model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Slocs model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
//    public function actionCreate() {
//        $model = new Slocs();
//       
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->SLoc]);
//        } else {
//        return $this->render('create', [
//                    'model' => $model,
//        ]);
//        }
//    }

    public function actionCreate() {
        $model = new Slocs();
        if ($model->load(Yii::$app->request->post())) {
            try {

                $command = Yii::$app->db->createCommand("spSetSLoc @Sloc =:Sloc ,@Description =:Description");
                $command->bindParam(":Sloc", $Sloc);
                $command->bindParam(":Description", $Description);
                $command->execute();
                $model->save();
            } catch (Exception $e) {
                Log::trace("Error : " . $e);
                throw new Exception("Error : " . $e);
            }
            return $this->redirect(['view', 'id' => $model->SLoc]);
        }
        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            try {

                $command = Yii::$app->db->createCommand("spSetSLoc @Sloc =:Sloc ,@Description =:Description");
                $command->bindParam(":Sloc", $Sloc);
                $command->bindParam(":Description", $Description);
                $command->execute();
                $model->save();
            } catch (Exception $e) {
                Log::trace("Error : " . $e);
                throw new Exception("Error : " . $e);
            }
            return $this->redirect(['view', 'id' => $model->SLoc]);
        }
        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing Slocs model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
//    public function actionUpdate($Sloc, $RowVer) {
//        $model = $this->findModel($Sloc, $RowVer);
//
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['index']); //, 'Sloc' => $model->SLoc]);
//        } else {
//            return $this->render('update', [
//                        'model' => $model,
//            ]);
//        }
//    }

    /**
     * Deletes an existing Slocs model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($Sloc) {
        $this->findModel($Sloc)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Slocs model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Slocs the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Slocs::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
