<?php

namespace app\controllers;

use Yii;
use app\models\User;
use app\models\BillingAddress;
use app\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\Sell;
use app\models\DeliveryAddress;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
{
    public function behaviors()
    {
        return [
        'access' => [
           'class' => AccessControl::className(),
           'only' => ['index', 'update','findmodel','consultsell','viewsell','history','address','updatea','createa'],
           'rules' => [

               [
                   'actions' => ['index', 'update','findmodel','consultsell','viewsell','history','address','createa','updatea'],
                   'allow' => true,
                   'roles' => ['@'],
                   // 'matchCallback' => function ($rule, $action) {
                   //     return User::isUserAdmin(Yii::$app->user->identity->username);
                   // }
               ],
           ],
       ],
    
        ];
    }

    /**
     * Lists all User models.
     * @return mixed
     */
       protected function Consultsell($transaction){

        $xml=simplexml_load_file("https://www3.optar.ec/webmpi/qvpos?RucEstab=1790241483001&NoTransaccion=$transaction");
        return $xml;
            
    }
    public function actionIndex()
    {
        $id=Yii::$app->user->identity->id;
        $model = $this->findModel($id);
             if ($model->load(Yii::$app->request->post()) && $model->save()) {
                Yii::$app->getSession()->setFlash('success','Felicidades tus datos han sido guardados con éxito.');
                return $this->goHome();
        } 

        return $this->render('index', [
            'model' => $model,
        ]);
    }

    public function actionCreatea($type){

        $model = New BillingAddress;
        $model->user_id=Yii::$app->user->identity->id;
        $model->creation_date=date("Y-m-d H:i:s");
        $model->update_date=date("Y-m-d H:i:s");
        if($type=="D"){
        $model = New DeliveryAddress;
        $model->user_id=Yii::$app->user->identity->id;
        $model->creation_date=date("Y-m-d H:i:s");
        $model->update_date=date("Y-m-d H:i:s");
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
                Yii::$app->getSession()->setFlash('success','Felicidades tus datos han sido guardados con éxito.');
                return $this->goHome();
        } else {
            return $this->render('createa', [
                'model' => $model,
            ]);
        }
    }
    public function actionUpdatea($id,$type){
         

         if($type=="D"){
        $model =DeliveryAddress::findOne($id);
        $model->update_date=date("Y-m-d H:i:s");
        $model->user_id=Yii::$app->user->identity->id;
        }else{
        $model=BillingAddress::findOne($id);
        $model->update_date=date("Y-m-d H:i:s");
        $model->user_id=Yii::$app->user->identity->id;  
        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
                Yii::$app->getSession()->setFlash('success','Felicidades tus datos han sido guardados con éxito.');
                return $this->goHome();
        } else {
            return $this->render('updatea', [
                'model' => $model,
            ]);
        }
    }

    public function actionViewsell($id){
        $model= Sell::findOne($id);
        $xml=$this->Consultsell($model->transactionid);
           return $this->render('sell', [
            'model' => $model, 'xml' => $xml
        ]);
    }
    public function actionHistory()
    {
        $id=Yii::$app->user->identity->id;
        $model = $this->findModel($id);
        return $this->render('history', [
            'model' => $model,
        ]);
    }

    public function actionAddress(){
            $id=Yii::$app->user->identity->id;
            $billing= BillingAddress::find()->where(['user_id'=>$id])->all();
            $delivery= DeliveryAddress::find()->where(['user_id'=>$id])->all();
              return $this->render('address', [
            'billing' => $billing,
            'delivery' => $delivery
        ]);
    }
    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     */

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */

    /**
     * Updates an existing User model.
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
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
