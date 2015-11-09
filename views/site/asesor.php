<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = 'Asesor de Compras';
?>
<section class="cont-paginternas productos">
	<div id="cont-asesorCompras">
   		<h1>ASESOR DE COMPRA</h1>
        <span>¿Desea conocer el colchón o almohada recomendados para usted?, nosotros te ayudamos</span>
        <!-- -->
        <div class="pag-inicial">
           <div id="asesor-pag1" class="asesor-2opc">
               <ul>
                  <li><span>Colchón</span><img src="<?= URL::base() ?>/images/asesor-colchon.jpg" alt="Asesor Colchon"/><a href="#" class="btn-asesor">SELECCIONAR</a></li>
                  <li><span>Almohada</span><img src="<?= URL::base() ?>/images/asesor-almohada.jpg" alt="Asesor Almohada"/><a href="#" class="btn-asesor">SELECCIONAR</a></li>
              </ul>
           </div>
           <!-- -->
           <div id="asesor-pag2" class="asesor-2opc">
               <span>Indique si el uso del colchón será:</span>
               <ul>
                  <li><img src="<?= URL::base() ?>/images/asesor/ico-individual.svg" alt="Asesor Colchon"/><a href="#" class="btn-asesor">SELECCIONAR</a></li>
                  <li><img src="<?= URL::base() ?>/images/asesor/ico-pareja.svg" alt="Asesor Almohada"/><a href="#" class="btn-asesor">SELECCIONAR</a></li>
              </ul>
           </div>
           <!-- -->
           <div id="asesor-pag3" class="asesor-4opc">
               <span>¿Quién utilizará el colchón?:</span>
               <ul>
                  <li><img src="<?= URL::base() ?>/images/asesor/ico-ninos.svg" alt="Asesor Colchon"/><a href="#" class="btn-asesor">SELECCIONAR</a></li>
                  <li><img src="<?= URL::base() ?>/images/asesor/ico-adolecente.svg" alt="Asesor Almohada"/><a href="#" class="btn-asesor">SELECCIONAR</a></li>
                  <li><img src="<?= URL::base() ?>/images/asesor/ico-adultos.svg" alt="Asesor Colchon"/><a href="#" class="btn-asesor">SELECCIONAR</a></li>
                  <li><img src="<?= URL::base() ?>/images/asesor/ico-adultomayor.svg" alt="Asesor Almohada"/><a href="#" class="btn-asesor">SELECCIONAR</a></li>
              </ul>
           </div>
           <!-- -->
           <div id="asesor-pag4" class="asesor-3opc">
               <span>¿Tiene algún problema de salud?:</span>
               <ul>
                  <li><img src="<?= URL::base() ?>/images/asesor/ico-ninguno.svg" alt="Asesor Colchon"/><a href="#" class="btn-asesor">SELECCIONAR</a></li>
                  <li><img src="<?= URL::base() ?>/images/asesor/ico-columna.svg" alt="Asesor Almohada"/><a href="#" class="btn-asesor">SELECCIONAR</a></li>
                  <li><img src="<?= URL::base() ?>/images/asesor/ico-saludcronico.svg" alt="Asesor Colchon"/><a href="#" class="btn-asesor">SELECCIONAR</a></li>
              </ul>
           </div>
           <!-- -->
           <div id="asesor-pag5" class="peso-corporal">
               <div class="peso-individual">
                   <span>Ingrese su peso corporal:</span>
                   <ul>
                      <li><img src="<?= URL::base() ?>/images/peso.png" alt="Asesor Colchon"/><div class="inf-peso"><input type="text"/><label>libras (ejemplo: 126 lb)</label></div></li>
                  </ul>
                   <a href="#" class="btn-aseror-back">&lt;&lt; Anterior</a>
                  <a href="#" class="btn-aseror-next">Siguiente >></a>
              </div>
               <div class="peso-parejas">
                   <span>Ingrese su peso corporal:</span>
                   <ul>
                      <li><font>Tú:</font><img src="<?= URL::base() ?>/images/peso.png" alt="Asesor Colchon"/><div class="inf-peso"><input type="text"/><label>libras (ejemplo: 126 lb)</label></div></li>
                      <li><font>Tu pareja:</font><img src="<?= URL::base() ?>/images/peso.png" alt="Asesor Colchon"/><div class="inf-peso"><input type="text"/><label>libras (ejemplo: 126 lb)</label></div></li>
                  </ul>
                  <a href="#" class="btn-aseror-back">&lt;&lt; Anterior</a>
                  <a href="#" class="btn-aseror-next">Siguiente >></a>
              </div>
           </div>
           <!-- -->
           <div id="asesor-pag6" class="peso-corporal">
               <div class="peso-individual">
                   <span>¿Cuál es el nivel de confort que busca?:</span>
                   <ul>
                      <li><img src="<?= URL::base() ?>/images/peso.png" alt="Asesor Colchon"/><div class="inf-peso"></li>
                  </ul>
                   <a href="#" class="btn-aseror-back">&lt;&lt; Anterior</a>
                  <a href="#" class="btn-aseror-next">Siguiente >></a>
              </div>
               <div class="peso-parejas">
                   <span>¿Cuál es el nivel de confort que busca?:</span>
                   <ul>
                      <li><font>Tú:</font><img src="<?= URL::base() ?>/images/peso.png" alt="Asesor Colchon"/></li>
                      <li><font>Tu pareja:</font><img src="<?= URL::base() ?>/images/peso.png" alt="Asesor Colchon"/></li>
                  </ul>
                  <a href="#" class="btn-aseror-back">&lt;&lt; Anterior</a>
                  <a href="#" class="btn-aseror-next">Siguiente >></a>
              </div>
           </div>
           <!-- -->
           <div id="asesor-pag7" class="asesor-6opc">
               <span>Seleccione la medida de su colchón:</span>
               <ul>
                  <li><img src="<?= URL::base() ?>/images/asesor/colchon-3p.svg" alt="Asesor Colchon"/><a href="#" class="btn-asesor">SELECCIONAR</a></li>
                  <li><img src="<?= URL::base() ?>/images/asesor/colchon-2mp.svg" alt="Asesor Almohada"/><a href="#" class="btn-asesor">SELECCIONAR</a></li>
                  <li><img src="<?= URL::base() ?>/images/asesor/colchon-m.svg" alt="Asesor Colchon"/><a href="#" class="btn-asesor">SELECCIONAR</a></li>
                  <li><img src="<?= URL::base() ?>/images/asesor/colchon-2p.svg" alt="Asesor Almohada"/><a href="#" class="btn-asesor">SELECCIONAR</a></li>
                  <li><img src="<?= URL::base() ?>/images/asesor/colchon-1mp.svg" alt="Asesor Colchon"/><a href="#" class="btn-asesor">SELECCIONAR</a></li>
                  <li><img src="<?= URL::base() ?>/images/asesor/colchon-1cp.svg" alt="Asesor Almohada"/><a href="#" class="btn-asesor">SELECCIONAR</a></li>
              </ul>
           </div>
       	</div>
        <!-- -->
    </div>
	<div class="secciones-productos productos-asesor">
        <h1 class="tit-asesor">NUESTRA RECOMENDACIÓN</h1>
        <ul>
        	<li>
            	<a href="colchon-interna.html"><img src="<?= URL::base() ?>/images/productos/colchon1.png" alt="productos chaide"/><h1>CARRESA</h1><h2>Desde <strong>$776.92</strong> (No incluye IVA)</h2></a>
                <a href="colchon-interna.html" class="link-comprar">Comprar</a>
                <div class="c-comparar">
                	<input type="checkbox" /><label>Comparar</label>
                </div>
            </li>
            <li>
            	<img src="<?= URL::base() ?>/images/productos/colchon2.png" alt="productos chaide"/><h1>ESCAPE</h1><h2>Desde <strong>$776.92</strong> (No incluye IVA)</h2>
                <a href="colchon-interna.html" class="link-comprar">Comprar</a>
                <div class="c-comparar">
                	<input type="checkbox" /><label>Comparar</label>
                </div>
            </li>
            <li>
            	<img src="<?= URL::base() ?>/images/productos/colchon3.png" alt="productos chaide"/><h1>GRAND PALAIS</h1><h2>Desde <strong>$776.92</strong> (No incluye IVA)</h2>
                <a href="colchon-interna.html" class="link-comprar">Comprar</a>
                <div class="c-comparar">
                	<input type="checkbox" /><label>Comparar</label>
                </div>
            </li>
            <li>
            	<img src="<?= URL::base() ?>/images/productos/colchon4.png" alt="productos chaide"/><h1>RESTONIC EXCELLENCE</h1><h2>Desde <strong>$776.92</strong> (No incluye IVA)</h2>
                <a href="colchon-interna.html" class="link-comprar">Comprar</a>
                <div class="c-comparar">
                	<input type="checkbox" /><label>Comparar</label>
                </div>
            </li>
            <li>
            	<img src="<?= URL::base() ?>/images/productos/colchon5.png" alt="productos chaide"/><h1>RESTONIC GOLD</h1><h2>Desde <strong>$776.92</strong> (No incluye IVA)</h2>
                <a href="colchon-interna.html" class="link-comprar">Comprar</a>
                <div class="c-comparar">
                	<input type="checkbox" /><label>Comparar</label>
                </div>
            </li>
            <li>
            	<img src="<?= URL::base() ?>/images/productos/colchon6.png" alt="productos chaide"/><h1>SYMPHONY</h1><h2>Desde <strong>$776.92</strong> (No incluye IVA)</h2>
                <a href="colchon-interna.html" class="link-comprar">Comprar</a>
                <div class="c-comparar">
                	<input type="checkbox" /><label>Comparar</label>
                </div>
            </li>
        </ul>
    </div>
    <!-- SEPARADOR -->
    <div class="separador-p"><img src="<?= URL::base() ?>/images/separador.jpg"/></div>
    <!-- -->
</section>