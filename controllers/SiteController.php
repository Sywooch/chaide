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
    public function actionTest($urlid){
        

        switch ($urlid) {
        case 0:
            $url='http://WEBSERVICE:chaide*123@sapservprd.industria.chaide.com:1080/sap/bc/srt/wsdl/bndg_E0A334B5CF2A6FF1810A00215A4C209C/wsdl11/allinone/standard/document?sap-client=300';//EN URL ORIGINAL REEMPLAZAR POLICY CON STANDAR
       
        break;
        case 1:
           $url='http://WEBSERVICE:chaide*123@sapservprd.industria.chaide.com:1080/sap/bc/srt/wsdl/bndg_E0A0D052E5A0B8F1810A00215A4C209C/wsdl11/allinone/standard/document?sap-client=300';//EN URL ORIGINAL REEMPLAZAR POLICY CON STANDAR
     
        break;
        case 2:
            $url= 'http://WEBSERVICE:chaide*123@sapservprd.industria.chaide.com:1080/sap/bc/srt/wsdl/bndg_E0A0D0AD3576A1F1810A00215A4C209C/wsdl11/allinone/standard/document?sap-client=300';//EN URL ORIGINAL REEMPLAZAR POLICY CON STANDAR
        break;
            case 3:
            $url= 'http://WEBSERVICE:chaide*123@sapservprd.industria.chaide.com:1080/sap/bc/srt/wsdl/bndg_E3EDA2FD29B7C0F1810A00215A4C209C/wsdl11/allinone/standard/document?sap-client=300';//EN URL ORIGINAL REEMPLAZAR POLICY CON STANDAR
    break;
}

                 


        $client = new \mongosoft\soapclient\Client([
        'url' => $url,
         'options' => [
            'cache_wsdl' => WSDL_CACHE_NONE,
            'user' => 'WEBSERVICE',//Usuario SAP
            'password' => 'chaide*123',
            'soap' => SOAP_1_1,
            'KTOKD' => 'YB01',
            'KTOKD_dest' => '0002',
            'BUKRS' => '1000',
            'VKORG' => '1000',
            'VTWEG' => '03',
            'SPART' => '00',
            'TITLE_P' => 'SENOR',
            'SPRAS' => 'S',
            'LAND1' => 'EC',
            'TATYP' => 'MWST',
            'KDKG1' => '04',
            'mandante' => '100',
            'clase_pedido' => 'ZTA1',
            'tipo_posicion' => 'TAN',
            'organizacion_venta' => '1000',
            'canal' => '03',
            'sector' => '00',
        ],
        ]);
        $ws=array(   
            'user' => 'WEBSERVICE',//Usuario SAP
            'password' => 'chaide*123',
            'soap' => SOAP_1_1,           
            'KTOKD' => 'YB01',
            'KTOKD_dest' => '0002',
            'BUKRS' => '1000',
            'VKORG' => '1000',
            'VTWEG' => '03',
            'SPART' => '00',
            'TITLE_P' => 'SENOR',
            'SPRAS' => 'S',
            'LAND1' => 'EC',
            'TATYP' => 'MWST',
            'KDKG1' => '04',
            'mandante' => '100',
            'clase_pedido' => 'ZTA1',
            'tipo_posicion' => 'TAN',
            'organizacion_venta' => '1000',
            'canal' => '03',
            'sector' => '00'
            
            );
print_r($client->auth($ws));
        print_r($client->Zsdb2cCreaclie($ws));
    


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
    public function actionKeys(){
        $model= User::find()->where(['status'=>'INACTIVE'])->all();
        foreach($model as $k => $user){
            $user->auth_key=Yii::$app->security->generateRandomString();
            $user->status='ACTIVE';
            $user->phone='022222222';
            $user->cellphone='0999999999';
            if($user->save()){
              echo $k;  
          }else{
            print_r($user->getErrors());
          }
            
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
