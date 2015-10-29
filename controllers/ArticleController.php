<?php

namespace app\controllers;

use Yii;
use app\models\Article;
use app\models\ArticleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ArticleController implements the CRUD actions for Article model.
 */
class ArticleController extends Controller
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
     * Lists all Article models.
     * @return mixed
     */
    public function actionIndex()
    {
        
        $principal= Article::find()->where(['important'=>'YES','status'=>'ACTIVE','type'=>'NEWS'])->one();
        $vida=Article::find()->where(['important'=>'NO','status'=>'ACTIVE','type'=>'NEWS','category'=>'VIDA'])->limit(2)->all();
        $materiales=Article::find()->where(['important'=>'NO','status'=>'ACTIVE','type'=>'NEWS','category'=>'MATERIALES'])->limit(2)->all();
        $telas=Article::find()->where(['important'=>'NO','status'=>'ACTIVE','type'=>'NEWS','category'=>'TELA'])->limit(2)->all();
        $estructura=Article::find()->where(['important'=>'NO','status'=>'ACTIVE','type'=>'NEWS','category'=>'ESTRUCTURA'])->limit(2)->all();
        return $this->render('index', [
            'principal' => $principal,
            'vida' => $vida,
            'materiales' => $materiales,
            'telas' => $telas,
            'estructura' => $estructura
     
        ]);
    }

    /**
     * Displays a single Article model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $this->layout = 'main2';
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Article model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */





    /**
     * Finds the Article model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Article the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Article::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
