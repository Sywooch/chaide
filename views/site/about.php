<?php
use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */
$this->title = 'La Empresa';
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="cont-trayectoria productos">
	<!-- -->
    <div id="pluma1" 
    data-500="width:4%;left:20%;top:10%;opacity:0; transform:rotate(0deg)" 
    data-800="width:6%;left:10%;top:10%;opacity:0.2; transform:rotate(20deg)" 
    data-1200="width:8%;left:20%;top:10%;opacity:0.4; transform:rotate(0deg)" 
    data-1600="width:10%;left:10%;top:10%;opacity:0.6; transform:rotate(-20deg)">
    	<img src="<?= URL::base() ?>/images/trayectoria/pluma1-v.svg"/>
    </div>
    <div id="pluma2" 
    data-500="width:4%;left:20%;top:13%;opacity:0; transform:rotate(0deg)" 
    data-800="width:6%;left:10%;top:13%;opacity:0.2; transform:rotate(-20deg)" 
    data-1200="width:8%;left:20%;top:13%;opacity:0.4; transform:rotate(0deg)" 
    data-1600="width:12%;left:10%;top:13%;opacity:0.6; transform:rotate(20deg)">
    	<img src="<?= URL::base() ?>/images/trayectoria/pluma2-v.svg"/>
    </div>
    <div id="pluma3" 
    data-500="width:8%;left:20%;top:15%;opacity:0; transform:rotate(0deg)" 
    data-800="width:10%;left:10%;top:15%;opacity:0.6; transform:rotate(20deg)" 
    data-1200="width:12%;left:20%;top:15%;opacity:0.8; transform:rotate(0deg)" 
    data-1600="width:15%;left:10%;top:15%;opacity:1; transform:rotate(-20deg)">
    	<img src="<?= URL::base() ?>/images/trayectoria/pluma1-v.svg"/>
    </div>
    
    <!-- -->
	<div id="tit-trayectoria">
    	<img src="<?= URL::base() ?>/images/trayectoria/tit-trayectoria.svg" alt="Trayectoria"/>
    </div>
    <div id="a-1975"
    data-50="width:15%; opacity:0;"
    data-100="width:20%; opacity:1;">
    	<img src="<?= URL::base() ?>/images/trayectoria/a-1975.svg"/>
    </div>
    <div class="cont-contenedor">
    	<div id="txt-chaide">
         	<h1>CHAIDE Y CHAIDE S.A.</h1>
            <span>NACE COMO  UNA INDUSTRIA ECUATORIANA ESPECIALIZADA EN LA FABRICACIÓN Y COMERCIALIZACIÓN DE PRODUCTOS PARA EL DESCANSO.</span>
        </div>
        <div id="imagen-1"><img src="<?= URL::base() ?>/images/trayectoria/imagen-1.png"/></div>
        <div id="fundada-quito"><img src="<?= URL::base() ?>/images/trayectoria/fundada-quito.svg"/></div>
    </div>
    <!-- -->
    <div class="cont-contenedor">
    	<div id="cont-1994">
        	<div id="a-1994"><img src="<?= URL::base() ?>/images/trayectoria/a-1994.svg"/></div>
            <div id="img-1994"><img src="<?= URL::base() ?>/images/trayectoria/restonic.svg"/></div>
            <h1>LICENCIA RESTONIC</h1>
            <span>OBTUVO LA LICENCIA DE RESTONIC MATTRESS CORPORATION UNA DE LAS ORGANIZACIONES LÍDERES A NIVEL INTERNACIONAL EN TECNOLOGÍA PARA LA FABRICACIÓN DE COLCHONES.</span>
        </div>
        <div id="imagen-2"><img src="<?= URL::base() ?>/images/trayectoria/cama-v.svg"/></div>
        <div id="cont-2003">
        	<div id="a-2003"><img src="<?= URL::base() ?>/images/trayectoria/a-2003.svg"/></div>
            <div id="img-2003"><img src="<?= URL::base() ?>/images/trayectoria/iso9001.svg"/></div>
            <h1>ISO 9001</h1>
            <span>ADQUIERE LA MARCA DE COLCHONES REGINA Y LA CERTIFICACIÓN ISO 9001, QUE GARANTIZA QUE SUS PROCESOS SATISFACEN LOS REQUERIMIENTOS DE SUS CLIENTES Y QUE HA SIDO RATIFICADA ANUALMENTE CON AUDITORÍAS INTERNACIONALES.</span>
        </div>
    </div>
    <!-- -->
    <div id="cont-ekos">
    	<div id="a-2005"><img src="<?= URL::base() ?>/images/trayectoria/a-2005.svg"/></div>
        <div id="img-2005"><img src="<?= URL::base() ?>/images/trayectoria/ekos.svg"/></div>
        <h1>PREMIO EKOS</h1>
        <span>RECIBE EL PREMIO EKOS DE ORO POR SU GESTIÓN EN LA INDUSTRIA ECUATORIANA.</span>
    </div>
    <!-- -->
    <div class="cont-contenedor">
    	<div id="cont-2007">
        	<div id="a-2007"><img src="<?= URL::base() ?>/images/trayectoria/a-2007.svg"/></div>
        	<div id="img-2007"><img src="<?= URL::base() ?>/images/trayectoria/img-2007.svg"/></div>
            <h1>CÁMARA DE INDUSTRIAS</h1>
            <span>CONSIGUE EL RECONOCIMIENTO AL MÉRITO INDUSTRIAL EN LA CÁMARA DE INDUSTRIAS Y PRODUCCIÓN. RECIBE EL RECONOCIMIENTO BIZZ AWARDS.</span>
        </div>
    	<div id="imagen-3"><img src="<?= URL::base() ?>/images/trayectoria/sillon-v.svg"/></div>
        <div id="cont-2012">
        	<div id="a-2012"><img src="<?= URL::base() ?>/images/trayectoria/a-2012.svg"/></div>
        	<div id="img-2012"><img src="<?= URL::base() ?>/images/trayectoria/img-2012.svg"/></div>
            <h1>GREAT PLACE</h1>
            <span>OBTIENE EL PREMIO GREAT PLACE TO WORK COMO UNA DE LAS MEJORES EMPRESAS PARA TRABAJAR EN ECUADOR; RECONOCIMIENTO QUE HA CONSEGUIDO DESDE EL AÑO 2007.</span>
        </div>
    </div>
    <!-- -->
    <div id="cont-2013">
    	<div id="a-2013"><img src="<?= URL::base() ?>/images/trayectoria/a-2013.svg"/></div>
        <div id="img-2013"><img src="<?= URL::base() ?>/images/trayectoria/chaide.svg"/></div>
        <h1>CHAIDE</h1>
        <span>ACTUALIZA SU LOGOTIPO, SLOGAN Y VISIÓN EMPRESARIAL A CHAIDE “SUEÑA CON UN MUNDO MEJOR”.</span>
    </div>
    <!-- -->
    <div class="cont-contenedor">
    	<div id="txt-chaide">
         	<h1>MEJOR PROVEEDOR 2013</h1>
            <span>CHAIDE RECIBE EL PREMIO COMO "MEJOR PROVEEDOR DEL AÑO 2013" EN LA CATEGORÍA HOGAR DE  CORPORACIÓN FAVORITA. ESTE PREMIO SE OTORGA A LAS EMPRESAS QUE CUMPLEN ALTOS ESTÁNDARES EN: CALIDAD, PUNTUALIDAD EN ENTREGAS, RENTABILIDAD, COMPETITIVIDAD E INNOVACIÓN.</span>
        </div>
        <div id="imagen-1"><img src="<?= URL::base() ?>/images/trayectoria/corporacion-favorita.svg"/></div>
        <div id="fundada-quito"><img src="<?= URL::base() ?>/images/trayectoria/chaide-premiada.svg"/></div>
    </div>
    <!-- -->
</section>
