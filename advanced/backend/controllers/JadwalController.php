<?php

namespace backend\controllers;

use Yii;
use backend\models\Jadwal;
use backend\models\JadwalSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Expression;
use yii\web\UploadedFile;

/**
 * JadwalController implements the CRUD actions for Jadwal model.
 */
class JadwalController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Jadwal models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new JadwalSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Jadwal model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Jadwal model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Jadwal();

        if ($model->load(Yii::$app->request->post())) {
            $model->file = UploadedFile::getInstance($model,'file');
            $uploadExists = 0;

            if($model->file){
                $imagepath = 'upload/files/';
                $model->U_PESERTA= $imagepath .rand(10,100).'-'.str_replace('','-',$model->file->name);
                
                $bulkInsertArray = array();
                $random_date = Yii::$app->formatter->asDatetime(date("dmyyhis"), "php:dmYHis");
                $random = $random_date.rand(10, 100);
                $userId = \Yii::$app->user->identity->id;
                $now = new Expression('NOW()');
                
                $uploadExists = 1; 
            }

            if($uploadExists){
                $model->file->saveAs($model->U_PESERTA);

                $handle = fopen($model->U_PESERTA,'r');
                if($handle){
                    $model->jadwal=$random;
                    if($model->save()){
                        #var_dump($model->errors);

                        while(($line=fgetcsv($handle, 1000,",")) != FALSE){
                             $bulkInsertArray[]=[
                                 'pes_id' => $model,
                                 'r_id' => $model,
                                 'pes_nama' => $model,
                                 'pes_alamat' => $model,
                                 'pes_email' => $model,
                                 'pes_jurusan' => $model,
                                 'pes_username' => $model,
                                 'pes_password' => $model,

                             ];
                        }
                    }
                    fclose($handle);

                    $tableName = 'peserta';
                    $columnNameArray = ['pes_id','r_id', 'pes_nama', 'pes_alamat', 'pes_email', 'pes_jurusan', 'pes_username', 'pes_password'];
                    Yii::$app->db->createCommand()->jadwalInsert($tableName, $columnNameArray, $bulkInsertArray)->execute();
                    #print_r($bulkInsertArray);
                }

            }

            return $this->redirect(['view', 'id' => $model->U_ID]);
        } 
        else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Jadwal model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->U_ID]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Jadwal model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Jadwal model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Jadwal the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Jadwal::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
