<?php

namespace app\controllers;

use Yii;
use app\models\Locale;
use app\models\LocaleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\City;
use yii\helpers\BaseJson;

/**
 * LocaleController implements the CRUD actions for Locale model.
 */
class LocaleController extends Controller
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
     * Lists all Locale models.
     * @return mixed
     */
    public function actionIndex()
    {
        // $searchModel = new LocaleSearch();
        // $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
         $this->layout = 'main2';
        $model= City::find()->all();
        return $this->render('index', [
       'model' => $model,
        ]);
    }
    public function actionConsult()
    {
        // $searchModel = new LocaleSearch();
        // $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $model= $this->findModel($_POST['id']);
            echo BaseJson::encode($model);
    }
    public function actionLocales(){
         $model= City::findOne($_POST['id']);
         $aux=array();
         foreach($model->locales as $k => $locale){
            $aux[$k]['id'] = $locale->id;
            $aux[$k]['address']=$locale->address;
         }

            echo json_encode($aux);
    }
    /**
     * Displays a single Locale model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Locale model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Locale();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Locale model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
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
     * Deletes an existing Locale model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Locale model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Locale the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Locale::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
