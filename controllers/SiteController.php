<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ForgotForm;
use app\models\ContactForm;
use app\models\ResetForm;
use app\models\Product;
use app\models\Line;
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
    public function actionTest(){
        $posts = Yii::$app->db3->createCommand('SELECT * FROM post')
            ->queryAll();
    }
    public function actionIndex()
    {

       $product=Product::findOne(6); 
       $line=Line::findOne(3);
       return $this->render('index',['product'=>$product,'line'=>$line]);
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
   public function actionForgot()
   {

          
          if (!\Yii::$app->user->isGuest) {
        return $this->goHome();
    }
       $model = new ForgotForm();
           if ($model->load(Yii::$app->request->post()) && $model->find()) {
            $user=$model->find();
            $user->generatePasswordResetToken();
            if($user->save()){
              $email=  Yii::$app->mailer->compose('reset', [
            'names' => $user->names,
            'url' => Yii::$app->urlManager->createAbsoluteUrl(['site/reset','token'=>$user->password_reset_token])
            ])->setFrom('info@chaide.com')
            ->setTo($user->username)
            ->setSubject($user->names." "."Resetea tu cuenta en chaide")
            ->send();
                    if($email){
                        Yii::$app->getSession()->setFlash('success','No te olvides de revisar en la bandeja de spam.');
                    }
                    else{
                        Yii::$app->getSession()->setFlash('warning','Un error ha ocurrido por favor contactate con soporte técnico.');
                    }
                    return $this->goHome();
            }else{
              Yii::$app->getSession()->setFlash('warning','Un error ha ocurrido por favor contactate con soporte técnico.');  
              return $this->goHome();
            }
           
    }
        return $this->render('forgot', [
            'model' => $model,
            ]);

}
public function actionReset($token){
    $user= User::findByPasswordResetToken($token);
     $model= New ResetForm;
    if ($model->load(Yii::$app->request->post())) {
        if($user){
            $user->removePasswordResetToken();
            $user->password=md5($model->password);
            $user->save();
         Yii::$app->getSession()->setFlash('success','Su password ha sido cambiado con éxito.');
           return $this->goHome(); 

        }else{   
           Yii::$app->getSession()->setFlash('warning','El token de seguridad es inválido o ya ha expirado.');
           return $this->goHome(); 
        }
    }
     return $this->render('reset', [
        'model' => $model,
        ]);

}

    public function actionRegister(){
      $model = new User();
      $model->scenario="create";
      $model->type="CLIENT";
      $model->creation_date=date("Y-m-d H:i:s");
      if ($model->load(Yii::$app->request->post()) && $model->save()) {
      $email=  Yii::$app->mailer->compose('confirm', [
    'model' => $model,
    'url' => Yii::$app->urlManager->createAbsoluteUrl(['site/confirm','id'=>$model->id,'key'=>$model->auth_key])
    ])->setFrom('info@chaide.com')
    ->setTo($model->username)
    ->setSubject($model->names." "."Confirma tu cuenta en chaide")
    ->send();
        if($email){
            Yii::$app->getSession()->setFlash('success','No te olvides de revisar en la bandeja de spam.');
        }
        else{
            Yii::$app->getSession()->setFlash('warning','Un error ha ocurrido por favor contactate con soporte técnico.');
        }
        return $this->redirect(['congrats', 'id' => $model->id]);

    } else {
        return $this->render('register', [
            'model' => $model,
            ]);
    }
    }
    public function actionConfirm($id, $key)
    {
        $user = User::find()->where([
        'id'=>$id,
        'auth_key'=>$key,
        'status'=>'INACTIVE',
        ])->one();
        if(!empty($user)){
        
        $user->status='ACTIVE';
        $user->save();
        Yii::$app->getSession()->setFlash('success','Felicidades tu cuenta ya está activa.');
        }
        else{
        Yii::$app->getSession()->setFlash('warning','Error, tu cuenta no pudo ser activada');
        }
        return $this->goHome();
    }
    public function actionCongrats($id){
        $model=User::findOne($id);
       return $this->render('congrats', [
            'model' => $model,
            ]); 
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
    public function actionFaqs(){
       return $this->render('faqs'); 
    }
}
