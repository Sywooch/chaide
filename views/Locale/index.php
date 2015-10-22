<?php
use yii\helpers\Url;
use yii\web\View;
$aux='';
$aux2='';
$this->title = 'Chaide | Locales';
$address="";
$email="";
$phone="";
$script='
$(".locale").click(function(){
        $(".inf-a").html("");
        $(".locale").removeClass("l-selected");
        $(this).addClass("l-selected");
        $.ajax({
  url: "consult",
  method: "POST",
  data: { id : $(this).attr("id_locale") },
  dataType: "json",
   success:function(data) {
         $("#address").html(data.address);
         $("#email").html(data.email);
         $("#phone").html(data.phone);
      }
});


    }); 
function locales(){
$(".locale").click(function(){
        $(".inf-a").html("");
        $(".locale").removeClass("l-selected");
        $(this).addClass("l-selected");
        $.ajax({
  url: "consult",
  method: "POST",
  data: { id : $(this).attr("id_locale") },
  dataType: "json",
   success:function(data) {
         $("#address").html(data.address);
         $("#email").html(data.email);
         $("#phone").html(data.phone);
      }
});
});



}
$(".city").click(function(){
    $(".inf-a").html("");
    $(".lista-locales").html("");
     $(".city").removeClass("c-selected");
        $(this).addClass("c-selected");
                $.ajax({
  url: "locales",
  method: "POST",
  data: { id : $(this).attr("id_city") },
  dataType: "json",
   success:function(data) {
      $(".lista-locales").html("");
      $.map( data, function( val, i ) {
     $(".lista-locales").append("<li><a class=';
     $script.="'locale' href='#'  id_locale=";$script.='"+val.id+"';$script.='>"+val.address+"</a></li>");
});
    locales();
      }
});
        }); 
';
$this->registerJs($script,View::POS_END);
 ?>
<section class="cont-locales">
    <div class="cont2-locales">
        <div class="conte-local">
            <div class="cont-maps">
                <iframe frameborder="0" style="border:0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.8021480894836!2d-78.4962638895797!3d-0.16313475280675024!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m3!3e6!4m0!4m0!5e0!3m2!1ses!2sec!4v1442002001460" allowfullscreen></iframe>
                <div class="cont-l-locales">
                    <h1>Locales</h1>
                    <ul class="lista-locales">
                        <?php foreach($model as $city): ?>
                         <?php foreach($city->locales as $locale): ?>
                               <?php if($locale->id==1){ ?>
                                <?php 
                                $aux2='l-selected'; 
                                $address=$locale->address;
                                $email=$locale->email;
                                $phone=$locale->phone;
                                ?>
                                 <?php } ?>
                        <li><a class="locale <?= $aux2 ?>" id_locale="<?= $locale->id ?>" href="#" ><?= $locale->address ?></a></li>
                        <!-- class="l-selected" -->
                        <?php $aux2=''; ?>
                       <?php endforeach; ?>
                       <?php break; ?>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <!-- --> 
            <ul class="list-ciudades">
                <?php foreach($model as $city): ?>
              <?php if($city->id==1){ ?>
                <?php $aux='c-selected'; ?>
                 <?php } ?>
              <li><a class="city <?= $aux ?>" href="#" id_city="<?= $city->id ?>" ><?= strtoupper($city->description) ?></a></li>
            
             <!--  class="" -->
                <?php $aux=''; ?>
                <?php  endforeach; ?>
            </ul>
            <!-- -->
            <div class="info-local">
                DIRECCIÓN:<p id="address" class="inf-a"><?= $address ?><p>
                E-MAIL: <p id="email" class="inf-a"><?= $email ?><p>
                TELÉFONO: <p id="phone" class="inf-a"><?= $phone ?><p>
            </div>
            <!-- -->
        </div>
        <img src="<?= URL::base() ?>/images/locales.jpg" class="img-locales"/>
    </div>
</section>
<!-- -->
<div class="footter-home">
    <p>
        Contamos con una ámplia red de distribuidores autorizados y tiendas propias a nivel nacional.<br/>
        Consulte el distribuidor autorizado más cercano llamando al 1800-CHAIDE (242433) ó escríbanos al servicioalcliente@chaide.com
    </p>
</div>