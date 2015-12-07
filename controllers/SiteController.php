<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Product;
use app\models\User;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
        'access' => [
        'class' => AccessControl::className(),
        'only' => ['logout'],
        'rules' => [
        [
        'actions' => ['logout'],
        'allow' => true,
        'roles' => ['@'],
        ],
        ],
        ],
        'verbs' => [
        'class' => VerbFilter::className(),
        'actions' => [
                   // 'logout' => ['post'],
        ],
        ],
        ];
    }

    public function actions()
    {
        return [
        'error' => [
        'class' => 'yii\web\ErrorAction',
        ],
        'captcha' => [
        'class' => 'yii\captcha\CaptchaAction',
        'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
        ],
        ];
    }

    public function actionIndex()
    {
        
       $product=Product::findOne(6); 
       return $this->render('index',['product'=>$product]);
   }

   public function actionLogin()
   {
    if (!\Yii::$app->user->isGuest) {
        return $this->goHome();
    }

    $model = new LoginForm();
    if ($model->load(Yii::$app->request->post()) && $model->login()) {
        return $this->goBack();
    } else {
        return $this->render('login', [
            'model' => $model,
            ]);
    }
}

    public function actionRegister(){
      $model = new User();
      $model->type="CLIENT";
      $model->creation_date=date("Y-m-d H:i:s");
      if ($model->load(Yii::$app->request->post()) && $model->save()) {

        return $this->redirect(['confirm', 'id' => $model->id]);
        
    } else {
        return $this->render('register', [
            'model' => $model,
            ]);
    }
    }

    public function actionLogout()
    {
    Yii::$app->user->logout();

    return $this->goHome();
    }

    public function actionContact()
    {
    $model = new ContactForm();
    if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
        Yii::$app->session->setFlash('contactFormSubmitted');

        return $this->refresh();
    } else {
        return $this->render('contact', [
            'model' => $model,
            ]);
    }
    }
    public function actionAsesor(){
    $this->layout = 'main2';
    return $this->render('asesor');
    }
    public function actionAbout()
    {
    return $this->render('about');
    }
}
