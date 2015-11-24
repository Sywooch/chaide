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
use yz\shoppingcart\ShoppingCart;

class ShopController extends Controller
{
    


	public function actionVpossend(){
		$plugin = new PlugInClientSend();
		/*Datos Establecimiento*/
			$filePubKC = Yii::getAlias('@app')."/PUBLICACIFRADO.pem"; 
			$filePriKC = Yii::getAlias('@app')."PRIVADACIFRADO.pem"; 
			$filePubKF = Yii::getAlias('@app')."/PUBLICAFIRMA.pem";
	 		$filePriKF = Yii::getAlias('@app')."/PRIVADAFIRMA.pem";
			$vector = "mV6VoYVJ54A=";
			$AdquirerID = "1711248995001";
			$MerchantID = "1711248995001";
			$LocalID = "GN01";
			$moneda = "840";
			$URL_Tecnico = "http://10.100.68.55/Tienda/Invoca.php;";
			$ambiente = "webcontent.ec";
			$random_key=Yii::$app->getSecurity()->generateRandomString();
			//die($random_key);
			$e = $plugin->setLocalID($LocalID); 
			if($e!= "")
			echo "Error: $e";
			$e = $plugin->setTransacctionID($random_key); if($e!= "")
			echo "Error: $e";
			$e = $plugin->setTransacctionValue($_POST["Subtotal"] * 100); if($e!= "")
			echo "Error: $e";
			$e = $plugin->setTaxValue1($_POST["impuesto1"] * 100); if($e!= "")
			echo "Error: $e";
			$e = $plugin->setTaxValue2($_POST["impuesto2"] * 100);
			if($e!= "")
			echo "Error: $e";
			$e = $plugin->setTipValue($_POST["propina"] * 100); if($e!= "")
			echo "Error: $e";
			$e = $plugin->setCurrencyID($moneda); if($e!= "")
			echo "Error: $e";
			$e = $plugin->setReferencia1($_POST["txtReferencia1"]); if($e!= "")
			echo "Error: $e";
			$e = $plugin->setReferencia2($_POST["txtReferencia2"]);
			if($e != "")
			echo "Error: $e";
			$e = $plugin->setReferencia3($_POST["txtReferencia3"]); if($e!= "")
			echo "Error: $e";
			$e = $plugin->setReferencia4($_POST["txtReferencia4"]); if($e!= "")
			echo "Error: $e";
			$e = $plugin->setReferencia5($_POST["txtReferencia5"]); if($e!= "")
			echo "Error: $e"; $e = $plugin->setIV($vector);
			if($e!= "")
			try {
			echo "Error: $e";
			$plugin->setSignPrivateKey("file://" . $filePriKF); $plugin->setCipherPublicKey("file://" . realpath("llaves/PUBLICA_CIFRADO_INTERDIN.pem")); $xmlGenerateKeyI = $plugin->CreateXMLGENERATEKEY();
			$plugin->XMLProcess($URL_Tecnico);
			$xmlRequest = $plugin->getXMLREQUEST();
			}
			catch(Exception $e){
			echo "Error: $e";
			}

	}
		public function actionVposRecive(){
		
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
