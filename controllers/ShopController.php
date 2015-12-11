<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\extensions\PlugInClientRecive;
use app\extensions\PlugInClientSend;
use app\extensions\RSAEncryption;
use app\models\Product;
use yii\helpers\Url;
use yz\shoppingcart\ShoppingCart;
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

	public function actionVpossend(){
		if(isset($_POST["Subtotal"])){
			$plugin = new PlugInClientSend();
		/*Datos Establecimiento*/
			$filePubKC = Yii::getAlias('@app')."/PUBLICACIFRADO_pruebas.pem"; 
			$filePriKC = Yii::getAlias('@app')."PRIVADACIFRADO_pruebas.pem"; 
			$filePubKF = Yii::getAlias('@app')."/PUBLICAFIRMA_pruebas.pem";
	 		$filePriKF = Yii::getAlias('@app')."/PRIVADAFIRMA_pruebas.pem";
	 		$filePubCI =Yii::getAlias('@app')."/PUBLICA_CIFRADO_INTERDIN.pem";
			$vector = "JbEFFDiOkRc=";
			$AdquirerID = "1790241483001";
			$MerchantID = "1790241483001";
			$LocalID = "GN01";
			$moneda = "840";
			$URL_Tecnico = Url::to("@web/shop/vpossend",true);
			$ambiente = "pruebas";
			$random_key=Yii::$app->getSecurity()->generateRandomKey();
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
			$e = $plugin->setReferencia1($_POST["txtReferencia1"]); 
			if($e!= "")
			echo "Error: $e";
			$e = $plugin->setReferencia2($_POST["txtReferencia2"]);
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
	public function actionVposrecive(){
		$vector = "JbEFFDiOkRc=";
		$xmlGenerateKey = $_POST["XMLGENERATEKEY"];
		$filePubFI =Yii::getAlias('@app')."/PUBLICA_FIRMA_INTERDIN.pem";
		$filePriKC = Yii::getAlias('@app')."PRIVADACIFRADO_pruebas.pem"; 
		$pluginr = new PlugInClientRecive();
		$pluginr->setIV($vector);
		$pluginr->setSignPublicKey("file://" . $filePubFI); 
		$pluginr->setCipherPrivateKey("file://" . $filePriKC); $error = $pluginr->setXMLGENERATEKEY($xmlGenerateKey);
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
		return $this->render('vposrecive',['puginr'=>$pluginr]);
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
		    if ($model) {
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
