<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\extensions\PlugInClientRecive;
use app\extensions\PlugInClientSend;
use app\extensions\RSAEncryption;
use app\extensions\TripleDESEncryption;
use app\models\Product;
use yii\helpers\Url;
use yz\shoppingcart\ShoppingCart;
use app\models\CarShop;
use app\models\User;
use app\models\Sell;
use app\models\Logs;
use app\models\Detail;
// http://www.chaide.com./test/shop/dreturn
// http://www.chaide.com./test/shop/dcancel
// http://www.chaide.com./test/shop/dpostprocess

class ShopController extends Controller
{

    public function behaviors()
    {
        return [
        'access' => [
           'class' => AccessControl::className(),
           'only' => ['vpossend', 'vposrecive'],
           'rules' => [

               [
                   'actions' => ['vpossend', 'vposrecive'],
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

    public function actionDpostprocess($xmlReq){
		//Yii::app()->request->enableCsrfValidation = false;
    	$lsdata = $xmlReq;
		$d3 = new TripleDESEncryption();
		$llave = "N2dYKcI9ivQEPlHN0/TCBJHp1c7OYtV5"; 
		$iv = "JbEFFDiOkRc=";
		$lsdata = $d3->decrypt($lsdata, $llave, $iv);
		list($datos, $aut, $Cre,$mes,$ttar,$sub,$Iva,$Ice,$Int,$Tot,$tNo,$cD,$tipo) = split('[&]', $lsdata);
		list($p0, $DATOS) = split('[=]', $datos);
		list($p1, $AUT) = split('[=]', $aut);
		list($p3, $CRE) = split('[=]', $Cre);
		list($p4, $MES) = split('[=]', $mes);
	    list($p5, $TTAR) = split('[=]', $ttar);
	    list($p6, $SUB) = split('[=]', $sub); 
	    list($p7, $IVA) = split('[=]', $Iva); 
	    list($p8, $ICE) = split('[=]', $Ice); 
	    list($p9, $INT) = split('[=]', $Int); 
	    list($p10, $TOT) = split('[=]', $Tot); 
	    list($p11, $TNO) = split('[=]', $tNo); 
	    list($p12, $CD) = split('[=]', $cD); 
	    list($p13, $TIPO) = split('[=]', $tipo); 
	    $logs= New Logs();
	    $logs->type="POSTPROCESS";
	    $logs->description="TIPO:".$TIPO."DATOS:".$DATOS."AUT:".$AUT."CRE:".$CRE."MES:".$MES."TTAR:".$TTAR."SUB:".$SUB."IVA:".$IVA."ICE:".$ICE."INT:".$INT."TOTAL:".$TOT."TNO:".$TNO."CD:".$CD;
	    $logs->save();
		if ($TIPO == 'P') {
			//$user= User::findOne($DATOS);
			$sell= Sell::findOne($DATOS);
			$sell->status="COMPLETE";
			$carshop=CarShop::find()->where(['user_id'=>$sell->user_id])->all();
			if($sell->save()){
				foreach($carshop as $item){
					$detail= New Detail();
					$detail->product_id=$item->product_id;
					$detail->quantity=$item->quantity;
					$detail->sell=$sell->id;
					$detail->save();
				}
				$carshop->deleteAll();
				
			    $email=  Yii::$app->mailer->compose('transaction', [
		    	'name' => $sell->user->names,
		    	'aut' => $AUT,
		    	'total' =>$TOT/100
		    	])->setFrom('info@chaide.com')
		    	->setTo($sell->user->username)
		    	->setSubject($sell->user->names." "."tu transacción fue completada con éxito")
		    	->send();
		        if($email){
		   		echo 'ESTADO=OK';
		        }else{
		        echo 'ESTADO=KO';	
		        }
		    }else{
		    	echo 'ESTADO=KO';
		    }
		} else {
		echo 'ESTADO=KO';
    }
}
	public function actionVpossend(){
		if(isset($_POST["Subtotal"])){
			$plugin = new PlugInClientSend();
		/*Datos Establecimiento*/
			// $filePubKC = Yii::getAlias('@app')."/PUBLICA_CIFRADO_ESTABLECIMIENTO.pem"; 
			// $filePriKC = Yii::getAlias('@app')."/PRIVADA_CIFRADO_ESTABLECIMIENTO.pem"; 
			// $filePubKF = Yii::getAlias('@app')."/PUBLICA_FIRMA_ESTABLECIMIENTO.pem";
	    foreach(Yii::$app->cart->positions as $position){
    			$carshop= new CarShop();
				$carshop->user_id=$pluginr->getReferencia1();
          		$carshop->product_id=$position->id;
          		$carshop->quantity=$position->quantity;
          		try {
          			$carshop->save();
          		} catch (Exception $e) {
          			
          		}
        }
        	$sell=New Sell();
        	$sell->user_id=Yii::$app->user->identity->id;
        	$sell->status="INCOMPLETE";
        	$sell->creation_date=date("Y-m-d H:i:s");
        	$sell->save();
	 		$filePriKF = Yii::getAlias('@app')."/PRIVADA_FIRMA_ESTABLECIMIENTO.pem";
	 		$filePubCI =Yii::getAlias('@app')."/PUBLICA_CIFRADO_INTERDIN.pem";
			$vector = "JbEFFDiOkRc=";
			$AdquirerID = "1790241483001";
			$MerchantID = "1790241483001";
			$LocalID = "GN01";
			$moneda = "840";
			$URL_Tecnico = Url::to("@web/shop/vpossend",true);
			$ambiente = "pruebas";
			$number=rand(1111111111,9999999999);
			$random_key=Yii::$app->user->id+$number;
			$e = $plugin->setLocalID($LocalID);
			if($e!= "")
			echo "Error: $e";
			$e = $plugin->setTransacctionID($random_key); 
			if($e!= "")
			echo "Error: $e";
			$e = $plugin->setTransacctionValue($_POST["Subtotal"] * 100); 
			if($e!= "")
			echo "Error: $e";
			$e = $plugin->setTaxValue1($_POST["impuesto1"] * 100);
			if($e!= "")
			echo "Error: $e";
			$e = $plugin->setTaxValue2($_POST["impuesto2"] * 100);
			if($e!= "")
			echo "Error: $e";
			$e = $plugin->setTipValue($_POST["propina"] * 100); 
			if($e!= "")
			echo "Error: $e";
			$e = $plugin->setCurrencyID($moneda); 
			if($e!= "")
			echo "Error: $e";
			$e = $plugin->setReferencia1($sell->primaryKey); 
			if($e!= "")
			echo "Error: $e";
			$e = $plugin->setReferencia2($sell->primaryKey);
			if($e != "")
			echo "Error: $e";
			$e = $plugin->setReferencia3($_POST["txtReferencia3"]); 
			if($e!= "")
			echo "Error: $e";
			$e = $plugin->setReferencia4($_POST["txtReferencia4"]); 
			if($e!= "")
			echo "Error: $e";
			$e = $plugin->setReferencia5($_POST["txtReferencia5"]); 
			if($e!= "")
			echo "Error: $e";
			$e = $plugin->setIV($vector); 
			if($e!= "")
			echo "Error: $e";
			try {
			$plugin->setSignPrivateKey("file://" . $filePriKF);
			 $plugin->setCipherPublicKey("file://" . $filePubCI); 
			 $xmlGenerateKeyI = $plugin->CreateXMLGENERATEKEY();
			$plugin->XMLProcess($URL_Tecnico);
			$xmlRequest = $plugin->getXMLREQUEST();
			$xmlDigitalSign=$plugin->getXMLDIGITALSIGN();
			return $this->render('confirm',['xmlRequest'=>$xmlRequest,'xmlDigitalSign'=>$xmlDigitalSign,'xmlGenerateKeyI'=>$xmlGenerateKeyI,'transactionid'=>$plugin->TransacctionID]);
			}
			catch(Exception $e){
			echo "Error: $e";

			}
		}else{
			return $this->redirect(['viewcart']);
		}

	}

	public function actionDcancel(){
		//Yii::app()->request->enableCsrfValidation = false;
		Yii::$app->getSession()->setFlash('warning','Se canceló la transacción.');
		return $this->redirect(['viewcart']);
	}

	public function actionDreturn(){
		//Yii::app()->request->enableCsrfValidation = false;
		$vector = "JbEFFDiOkRc=";
		$xmlGenerateKey = $_POST["XMLGENERATEKEY"];
		$filePubFI =Yii::getAlias('@app')."/PUBLICA_FIRMA_INTERDIN.pem";
		$filePriKC = Yii::getAlias('@app')."/PRIVADA_CIFRADA_ESTABLECIMIENTO.pem"; 
		$pluginr = new PlugInClientRecive();
		$pluginr->setIV($vector);
		$pluginr->setSignPublicKey("file://" . $filePubFI); 
		$pluginr->setCipherPrivateKey("file://" . $filePriKC);

		$error = $pluginr->setXMLGENERATEKEY($xmlGenerateKey);

		$msg = "";
		if($error != "") {
		$msg = "Error:" . $error;
		return; }
		$cadeEnc = $_POST["XMLRESPONSE"];

		$firmaCorrecta = $pluginr->XMLProcess($cadeEnc, $_POST["XMLDIGITALSIGN"]); 
		if($firmaCorrecta == 0)
		{
		//echo "<b>Los datos han sido alterados.</b><br>";
		return;
		 }
		else {
		if($firmaCorrecta != 1) {
		$msg = "<br><br>Error: $firmaCorrecta";
		return; 
		}
		else
		$msg = "<b>Los datos no han sido alterados.</b><br>";
		}
		$transactionID=$pluginr->getTransacctionID();
		$tax1=$pluginr->getTaxValue1();
		$tax2=$pluginr->getTaxValue2();
		$tip=$pluginr->getTipValue();
		$value=$pluginr->getTransacctionValue();
		$status=$pluginr->getAuthorizationState();
		$auth=$pluginr->getAuthorizationCode();
        Yii::$app->cart->removeAll();
		return $this->render('response',['transactionID'=>$transactionID,'tax1'=>$tax1,'tax2'=>$tax2,'tip'=>$tip,'value'=>$value,'status'=>$status,'auth'=>$auth]);
	}
    public function actionIndex()
    {
        return $this->render('index');
    }
	public function actionAddtocart($id){
		    $cart = Yii::$app->cart;

		    $model = Product::findOne($id);
		    if ($model) {
		        $cart->put($model, 1);
		        //die(print_r($cart));
		        return $this->redirect(['viewcart']);
		    }
	    throw new NotFoundHttpException();
	}
	public function actionRemovefromcart($id){
		    $cart = Yii::$app->cart;
		    $model = Product::findOne($id);
		    if ($model){
		        $cart->remove($model);
		        //die(print_r($cart));
		        return $this->redirect(['viewcart']);
		    }
	    throw new NotFoundHttpException();

	}
	public function actionUpdatefromcart($id,$quantity){
			    $cart = Yii::$app->cart;

		    $model = Product::findOne($id);
		    if ($model) {
		        $cart->update($model,$quantity);
		        //die(print_r($cart));
		        return $this->redirect(['viewcart']);
		    }
	    throw new NotFoundHttpException();

	}
	public function actionViewcart(){
		return $this->render('cart');	
	}

}
