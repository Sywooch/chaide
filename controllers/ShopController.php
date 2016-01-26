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
use app\extensions\VposPlugin;
use app\models\Product;
use yii\helpers\Url;
use yz\shoppingcart\ShoppingCart;
use app\models\CarShop;
use app\models\User;
use app\models\Sell;
use app\models\Logs;
use app\models\Detail;
use app\models\DinersTransaction;
use app\models\SapCode;
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
           'only' => ['vpossend', 'vposresponse','vpossend2'],
           'rules' => [

               [
                   'actions' => ['vpossend', 'vposresponse' ,'vpossend2'],
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
	    $logs->creation_date=date("Y-m-d H:i:s");
	    $logs->save();
		if ($TIPO == 'P') {
			$sell= Sell::findOne($DATOS);
			$user= User::findOne($sell->user_id);
			$id=$user->id;
			$sell->status="COMPLETE";
			$carshop=CarShop::find()->where(['user_id'=>$sell->user_id])->all();
			if($sell->save()){
				foreach($carshop as $item){
					$detail= New Detail();
					$detail->product_id=$item->product_id;
					$detail->quantity=$item->quantity;
					$detail->sell_id=$DATOS;
					$detail->sap_id=$item->sap_id;
					$detail->save();
				}
				CarShop::deleteAll("user_id = $id");
				$dinerstransaction=new DinersTransaction();
			    $dinerstransaction->fecha=date("Ymd");
		      	$dinerstransaction->hora=date("His");
			    $dinerstransaction->orden=$TNO;
			    $dinerstransaction->marca=$TTAR;
			    $dinerstransaction->subtotal=strval($SUB/100);
			    $dinerstransaction->iva=strval($IVA/100);
			    $dinerstransaction->impuesto="0.00";
			    $dinerstransaction->interes="0.00";
			    $dinerstransaction->total=strval($TOT/100);
			    $dinerstransaction->autorizacion=$AUT;
			    $dinerstransaction->ruc="1790241483001";
			    $dinerstransaction->credito=$CRE;
			    $dinerstransaction->meses=$MES;
			    $dinerstransaction->estado=$TIPO;
			    $dinerstransaction->conciliado="";
			    $dinerstransaction->extra="n/a";
			    $dinerstransaction->save();
			    $email=  Yii::$app->mailer->compose('transaction', [
		    	'name' => $user->names,
		    	'aut' => $sell->transactionid,
		    	'total' =>$TOT/100
		    	])->setFrom('info@chaide.com')
		    	->setTo($user->username)
		    	->setSubject($user->names." "."tu transacción fue completada con éxito")
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
	public function actionVpossend2(){
		if(isset($_POST["Subtotal"]) && isset($_POST["billing"]) && isset($_POST["delivery"])){
			$id=Yii::$app->user->identity->id;
			CarShop::deleteAll("user_id = $id");
		    foreach(Yii::$app->cart->positions as $position){
	    			$carshop= new CarShop();
					$carshop->user_id=Yii::$app->user->identity->id;
	          		$carshop->product_id=$position->product_id;
	          		$carshop->quantity=$position->quantity;
	          		$carshop->sap_id=$position->id;
	          		try {
	          			$carshop->save();
	          		} catch (Exception $e) {
	          			
	          		}
	        }
			$number=rand(1111111111,9999999999);
			$codigoOperacion=Yii::$app->user->identity->id.$number;
	       	$sell=New Sell();
        	$sell->user_id=Yii::$app->user->identity->id;
        	$sell->status="INCOMPLETE";
        	$sell->creation_date=date("Y-m-d H:i:s");
        	$sell->transactionid=$codigoOperacion;
        	$sell->delivery_id=$_POST["delivery"];
        	$sell->billing_id=$_POST["billing"];
        	$sell->save();
            $array_send= array();
            $array_get=array();
            $array_send['acquirerId']='8';
            $array_send['commerceId']='6098';
           $array_send['purchaseAmount']= ($_POST["Subtotal"]+$_POST["impuesto1"])*100;
            $array_send['purchaseCurrencyCode']='840';
            $array_send['purchaseOperationNumber']=$codigoOperacion;
            $array_send['billingAddress']="El bosque";
            $array_send['billingCity']='Quito';
            $array_send['tax_1_name'] = 'Monto IVA';
            $array_send['tax_1_amount'] = $_POST["impuesto1"]*100;
            $array_send['tax_2_name'] = 'Servicio';
            $array_send['tax_2_amount'] = '0';
            $array_send['tax_3_name'] = 'Monto Grava IVA';
            $array_send['tax_3_amount'] = '0';
            $array_send['tax_4_name'] = 'Monto No Grava IVA';
            $array_send['tax_4_amount'] = '0';
            $array_send['tax_5_name'] = 'Monto Fijo';
            $array_send['tax_5_amount'] = $array_send['tax_1_amount']+$array_send['tax_2_amount']+$array_send['tax_3_amount']+$array_send['tax_4_amount'];
            $array_send['billingCountry']='Ecuador';
            $array_send['reserved1']=$sell->primaryKey;
            //$array_send['billingZIP']=$codigoPostalCobranza;
            $array_send['billingPhone']=Yii::$app->user->identity->phone;
            $array_send['billingEMail']=Yii::$app->user->identity->username;
            $array_send['billingFirstName']=Yii::$app->user->identity->names;
            $array_send['billingLastName']=Yii::$app->user->identity->lastnames;
            $array_send['language']='SP'; //En español

$llavePublicaCifrado="-----BEGIN PUBLIC KEY-----\n".
"MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDTJt+hUZiShEKFfs7DShsXCkoq\n".
"TEjv0SFkTM04qHyHFU90Da8Ep1F0gI2SFpCkLmQtsXKOrLrQTF0100dL/gDQlLt0\n".
"Ut8kM/PRLEM5thMPqtPq6G1GTjqmcsPzUUL18+tYwN3xFi4XBog4Hdv0ml1SRkVO\n".
"DRr1jPeilfsiFwiO8wIDAQAB\n".
"-----END PUBLIC KEY-----";
$llavePrivadaFirma="-----BEGIN RSA PRIVATE KEY-----\n".
"MIICXwIBAAKBgQDJ8Digf7DW2DKDK4fr1WjPVuqsY+qi+ujZF5JAZ7sRwgF9IUa2\n".
"1q3Cw3PB7LzHljDa05l8BNYY0cPLtpxGbOQyOjVlKoSzyHbApvIV4aicZ+4iKTgI\n".
"h+LAsNxy2xLXyAcArtSejKsT7aExalLLEekxSl/LEd1ALKQv84t9jXPSsQIDAQAB\n".
"AoGBAMQ4+q1qpql9l0fCSucsjhW7PXmZ9Wu9J/mbX+/ZW/ubatruNMqBvIKebaMo\n".
"qR+/n2Vja6cJBAlF+1296gi80tcIaLgru00nfTCnLJCAkHlJArljivI59G3SOevu\n".
"sxSrYf0PBKNUkl/04FYuko5UusiPBUgKnxnaTFr3xjo7L4/hAkEA9bgr596Ihc41\n".
"2ntTe+EBf9lLLJPxotMfnGre7rJvW3sg+ErY630Tgu4qK19z1kvpgenhg61+TQTy\n".
"mediJ1RLJQJBANJjH6jKbPOdwpICMo7wuNVVC5M6VTeCEhxhT/eatUao1P3iyfVR\n".
"pg0AJroH+cV2fZIzGqfgrKqjT5FzFmJkuZ0CQQDGBEttqkn++rUvgp8+f49Dxors\n".
"O7VI8DbTSNSrK6TN5iYlsbup2rv0kZXuKhghpD9jcGVKRnA4BTq0iGDzLNz5AkEA\n".
"phIAp6hCIHtjXwXFCvgRrrQXEvx00AAoc6aNDRJeDYyvtEkUykTNIm4AI9Cv5KMH\n".
"tCQK4oGDSp7m7BVAkiKYMQJBAPJ1cboF8KZOpe4Do+Qfr/2+6VJfDDy2h1cYQwh9\n".
"oy/tQYyjBdqb+gTw+KNAMyOc5bYZ01HziPUCCjZOFeSfClo=\n".
"-----END RSA PRIVATE KEY-----";
//Setear un arreglo de cadenas con los parámetros que serán devueltos
$VI= "f714258719af22cb";
//por el componente
$array_get['XMLREQ']="";
$array_get['DIGITALSIGN']="";
$array_get['SESSIONKEY']="";
		$plugin= New VposPlugin;
           $plugin->VPOSSend($array_send, $array_get, $llavePublicaCifrado, $llavePrivadaFirma, $VI);
            if(!empty($array_get)){
              
                return $this->render('confirm_a',['array_get'=>$array_get]);   
                
            }
		}
	}
public function actionVposresponse(){
$plugin= New VposPlugin;
 $llavePrivadaCifrado ="-----BEGIN RSA PRIVATE KEY-----\n".
"MIICXQIBAAKBgQCwFKSABzdu0Ehj9QJZaOg/TYYpyWMz1O8zK7xK+O8lu+Y+RZ7J\n".
"WgQ3ZKc4ISnDIKZ/v+tBD29cgyrrnLvBrC9emyWEMODkE5sOpLWx80eLOXKJ7HPD\n".
"HqKbqCJ33EkxGqN8clGh+ETIHnozLN6Eiv2XhNmNe2oUCbyWbgcaTBHKcQIDAQAB\n".
"AoGAazTGS2UZbRDHYoSkX4euEAzFaN/C1KYK1V8Fj6gtAw56SuPcn7983bUc0uHu\n".
"KW3RsepJ9BzPssXx9e5BqtOJKtA/Y9qsufdbWeqj45SJatb7blkrrPqzXco03bAa\n".
"8x3KNR1PQgt7PiIaV1THDCzaEOH++1BwfoAOr3aOuM5rPAECQQDXZ2qKgz8yM4hO\n".
"QVF4bTQkHIF+sh4Uy3BYRCdW4tGebLhSYcpOf4HnLdfXD7iUG1ImPSH3SPK0pCrk\n".
"lPg3Fk3RAkEA0UP+3sgqooWbNuqKSDAfULsmITDq/jaHfurGSCN2SCyInZsH4QO2\n".
"6zElGjQOa0a64SVmZm0Fqg68Q6rTlbG6oQJBAK/heVTwJcHP4hRDsUoroM97lyDk\n".
"PzurgWgQ/i4rtg0tqLNbtdyysFcbT4oDBCuqw0EF2Z4YqlRlV8CdAq+4PoECQQCw\n".
"R+4gb0/y/keFGEgKjXcjw7NYDGQ4Z2j2kgEb7buLCvC+i0U02LMzJoARtb5bwgZU\n".
"+PNs3vQBkE4pVnLMTB5hAkA+EyxIGiXXTfVIirsgLIlVnJlZxVnIhr2OavOnMrHB\n".
"4sXdaj2KxPZNxGIi7rGOyN+8yic/ffbKCGdarDlBX09p\n".
"-----END RSA PRIVATE KEY-----";

 $llavePublicaFirma ="-----BEGIN PUBLIC KEY-----\n".
"MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCvJS8zLPeePN+fbJeIvp/jjvLW\n".
"Aedyx8UcfS1eM/a+Vv2yHTxCLy79dEIygDVE6CTKbP1eqwsxRg2Z/dI+/e14WDRs\n".
"g0QzDdjVFIuXLKJ0zIgDw6kQd1ovbqpdTn4wnnvwUCNpBASitdjpTcNTKONfXMtH\n".
"pIs4aIDXarTYJGWlyQIDAQAB\n".
"-----END PUBLIC KEY-----";



 $arrayIn['IDACQUIRER'] = $_POST['IDACQUIRER'];
 $arrayIn['IDCOMMERCE'] = $_POST['IDCOMMERCE'];
 $arrayIn['XMLRES'] = $_POST['XMLRES'];
 $arrayIn['DIGITALSIGN'] = $_POST['DIGITALSIGN'];
 $arrayIn['SESSIONKEY'] = $_POST['SESSIONKEY'];
 $arrayIn['reserved1']=$_POST['reserved1']; 
 //$arrayIn['planCode'] = $_POST['planCode'];
 //$arrayIn['quotaCode'] = $arrayIn['quotaCode'];
 $arrayOut = '';


 $VI = "f714258719af22cb";

 if($plugin->VPOSResponse($arrayIn,$arrayOut,$llavePublicaFirma,$llavePrivadaCifrado,$VI)){
                $sell= Sell::findOne($arrayOut["reserved1"]);
    			$user= User::findOne($sell->user_id);
                if($arrayOut["authorizationResult"]=="00"){
			$id=$user->id;
			$sell->status="COMPLETE";
			$carshop=CarShop::find()->where(['user_id'=>$sell->user_id])->all();
			if($sell->save()){
				foreach($carshop as $item){
					$detail= New Detail();
					$detail->product_id=$item->product_id;
					$detail->quantity=$item->quantity;
					$detail->sell_id=$sell->id;
					$detail->sap_id=$item->sap_id;
					$detail->save();
				}
				CarShop::deleteAll("user_id = $id");
                }

            }
            return $this->render('response_a',['sell'=>$sell,'arrayOut'=>$arrayOut]);


}
}
	public function actionVpossend(){
		if(isset($_POST["Subtotal"]) && isset($_POST["billing"]) && isset($_POST["delivery"])){
			$plugin = new PlugInClientSend();
		/*Datos Establecimiento*/
			// $filePubKC = Yii::getAlias('@app')."/PUBLICA_CIFRADO_ESTABLECIMIENTO.pem"; 
			// $filePriKC = Yii::getAlias('@app')."/PRIVADA_CIFRADO_ESTABLECIMIENTO.pem"; 
			// $filePubKF = Yii::getAlias('@app')."/PUBLICA_FIRMA_ESTABLECIMIENTO.pem";
		$id=Yii::$app->user->identity->id;
		CarShop::deleteAll("user_id = $id");
	    foreach(Yii::$app->cart->positions as $position){
    			$carshop= new CarShop();
				$carshop->user_id=Yii::$app->user->identity->id;
          		$carshop->product_id=$position->product_id;
          		$carshop->quantity=$position->quantity;
          		$carshop->sap_id=$position->id;
          		try {
          			$carshop->save();
          		} catch (Exception $e) {
          			
          		}
        }
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
			$random_key=Yii::$app->user->identity->id.$number;
	       	$sell=New Sell();
        	$sell->user_id=Yii::$app->user->identity->id;
        	$sell->status="INCOMPLETE";
        	$sell->creation_date=date("Y-m-d H:i:s");
        	$sell->transactionid=$random_key;
        	$sell->delivery_id=$_POST["delivery"];
        	$sell->billing_id=$_POST["billing"];
        	$sell->save();
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
		$tax1=$pluginr->getTaxValue1()/100;
		$tax2=$pluginr->getTaxValue2()/100;
		$tip=$pluginr->getTipValue();
		$value=$pluginr->getTransacctionValue()/100;
		$status=$pluginr->getAuthorizationState();
		$auth=$pluginr->getAuthorizationCode();
		$referencia1=$pluginr->getReferencia1();
		$sell= Sell::findOne($referencia1);
		$transactionid=$sell->transactionid;
		if($status=="Y"){
		$xml=simplexml_load_file("https://www3.optar.ec/webmpi/qvpos?RucEstab=1790241483001&NoTransaccion=$transactionid");
		if($xml->TRANSACCION->RESULTADO=="OK"){
        Yii::$app->cart->removeAll();
    	}else{
    		$sell->status=="INCOMPLETE";
    		$sell->save();
    	}
    	}
		return $this->render('response',['transactionID'=>$transactionID,'tax1'=>$tax1,'tax2'=>$tax2,'tip'=>$tip,'value'=>$value,'status'=>$status,'auth'=>$auth,'xml'=>$xml]);
	}
    public function actionIndex()
    {
        return $this->render('index');
    }
	public function actionAddtocart($id){
		    $cart = Yii::$app->cart;

		    $model = SapCode::findOne($id);
		    if ($model) {
		        $cart->put($model, 1);
		        //die(print_r($cart));
		        return $this->redirect(['viewcart']);
		    }
	    throw new NotFoundHttpException();
	}
	public function actionRemovefromcart($id){
		    $cart = Yii::$app->cart;
		    $model = SapCode::findOne($id);
		    if ($model){
		        $cart->remove($model);
		        //die(print_r($cart));
		        return $this->redirect(['viewcart']);
		    }
	    throw new NotFoundHttpException();

	}
	public function actionUpdatefromcart($id,$quantity){
			    $cart = Yii::$app->cart;

		    $model = SapCode::findOne($id);
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
