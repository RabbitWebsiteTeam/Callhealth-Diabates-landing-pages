<?php
// captcha code
session_start();
//echo dirname(__FILE__);
include_once('captcha/simple-php-captcha.php');

$_SESSION['captcha'] = simple_php_captcha();

//API call 1:: Get data
require_once('../../config_urls.php');


// API call 2 :: rabbit load api

$utm_source = $_GET['utm_source'] ? $_GET['utm_source'] : 'Not Defined';

$utm_medium = $_GET['utm_medium'] ? $_GET['utm_medium'] : 'Not Defined';
$utm_campaign = $_GET['utm_campaign'] ? $_GET['utm_campaign'] : 'Not Defined';
$utm_content = $_GET['utm_content'] ? $_GET['utm_content'] : 'Not Defined';

$utm_term = $_GET['utm_term'] ? $_GET['utm_term'] : 'Not Defined';
$utm_tg = $_GET['utm_tg'] ? $_GET['utm_tg'] : 'Not Defined';
$utm_location = $_GET['utm_location'] ? $_GET['utm_location'] : 'Not Defined';
$utm_bidding = $_GET['utm_bidding'] ? $_GET['utm_bidding'] : 'Not Defined';
$utm_landing_page  = $_GET['utm_landing_page'] ? $_GET['utm_landing_page'] : 'Not Defined';

$service = $_GET['service'] ? $_GET['service'] : 'Not Defined';

 $device  =$_SERVER['HTTP_USER_AGENT'];   
  $device = str_replace('"','\"',$device);
$device = str_replace("'","\'",$device);

 $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
        
 
//$device = substr($useragent,0,4);
$geopluginURL='http://www.geoplugin.net/php.gp?ip='.$ipaddress;
$addrDetailsArr = unserialize(file_get_contents($geopluginURL)); 

/*Get City name by return array*/
$city = $addrDetailsArr['geoplugin_city']; 

/*Get Country name by return array*/
$country = $addrDetailsArr['geoplugin_countryName'];

/*Comment out these line to see all the posible details*/
/*echo '<pre>';
print_r($addrDetailsArr);
die();*/

if(!$city){
   $city='Not Define';
}if(!$country){
   $country='Not Define';
}
//echo '<strong>IP Address</strong>:- '.$ip_address.'<br/>';
//echo '<strong>City</strong>:- '.$city.'<br/>';
//echo '<strong>Country</strong>:- '.$country.'<br/>';
$usercity = $city;
$client = 'CallHealth';
$landing = "Nursing";

 $cl_id = 25;
 $lan_id = 108;

// insert into rabbit server 

// service start

    $service_url = 'http://rabbitdigital.co.in/dashboard_api/api/on_load';
       $curl = curl_init($service_url);
       $curl_post_data = array(
            'cl_id' => $cl_id,
          'lan_id' => $lan_id,
        'service'=> $service,
        'utm_source' => $utm_source,
          'utm_location' => $utm_location,
        'utm_campaign'=> $utm_campaign,
        'utm_content' => $utm_content,
          'utm_term' => $utm_term,
        'utm_bidding'=>$utm_bidding,
        
        'utm_landing_page' => $utm_landing_page,
          'utm_tg' => $utm_tg,
        'device'=>$device,
        'ipaddress' => $ipaddress,
          'user_ip_city' => $city,
        'addeddate'=> $addeddate
            );
       curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
       curl_setopt($curl, CURLOPT_POST, true);
       curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data);
       $curl_response = curl_exec($curl);
      curl_close($curl);
     //echo $curl_response;exit;
            
        //$decoded = json_decode($curl_response);
    // print_r($decoded);exit;
    //echo $decoded->CODE;
    //echo $decoded->MESSAGE;

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="assets/images/favicon.ico">
    <title>CallHealth</title>
 <link href="assets/css/bootstrap.min.css" rel="stylesheet">
 <link href="assets/css/style.css" rel="stylesheet">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  


<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-TXVK6DP');</script>
<!-- End Google Tag Manager -->

  </head>
  
  <body>
   <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TXVK6DP"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->


    <div id="content" class="mobile-banner">
      <div class="container">
        <!-- begin:latest -->
        <div class="row" id="topc">
	  <div class="col-md-4 col-xs-6">
	  <a class="navbar-brand pull-left" ><img src="assets/images/logo.png" class="img-responsive"/></a>
	  </div>
	  <div class="col-md-8 col-xs-6">
	  <ul id="topnav" class="hidden-xs">
	  <li><a href="#how">How it Works</a></li>
	  <li><a href="#pack">Benefits</a></li>
	  <li><a href="#other">Key Services</a></li>
	  </ul>
	  </div>
	  </div>
      <div class="row">
	  <div class="col-sm-12">
	  <div class="well1" id="maincontent">
	  <div class="row" >
          <div class="col-md-6 col-xs-8 colpad">
           <div class="banncont">
		     <div class="head">Expert care for your loved ones</div>
		     <div class="cont">Nursing packages start at Rs.600 onwards</div>
		   </div>
          </div>
          <div class="col-md-6 col-xs-4 colpad mnop">
		
          <div class="login-panel panel panel-default">
                    <div class="hero"></div>
					 
                    <div class="panel-body">
					<div class="phea">Get Nursing Care @home</div>
                         <form role="form" id="indexFrm" name="callhealth" action="emailer.php" method="post">
                            <fieldset>
      
                                <div class="form-group">
                                    <input class="form-control" placeholder="Name" name="name" id="name" type="text" required>
                </div>                            
                                <div class="form-group">
                                    <input class="form-control" placeholder="Mobile no" name="phone" id="phone" type="text"  required>
                                </div>                               

                                <div class="form-group">
                                    <input class="form-control hidden" name="captchatxt" id="captchatxt-hidden" type="text" value="<?php echo $_SESSION['captcha']['code'] ;
                                ?>" >
                               
                                <input type="text" placeholder="Enter Captcha" id="captchatxt" name="captchatxt" class="form-control" required >
                                <?php
                                             echo '<img src="' . $_SESSION['captcha']['image_src'] . '" alt="CAPTCHA" />';
                                ?>
                                </div>

                                  <input type="hidden" name="utm_source" value="<?php echo $utm_source; ?>"/>
                                <input type="hidden" name="utm_medium" value="<?php echo $utm_medium; ?>"/>
                                <input type="hidden" name="utm_campaign" value="<?php echo $utm_campaign; ?>"/>
                                <input type="hidden" name="utm_content" value="<?php echo $utm_content; ?>"/>
                                <input type="hidden" name="service" value="<?php echo $service; ?>"/>
                                
                                <input type="hidden" name="utm_term" value="<?php echo $utm_term; ?>"/>
                                <input type="hidden" name="utm_tg" value="<?php echo $utm_tg; ?>"/>
                                <input type="hidden" name="utm_location" value="<?php echo $utm_location; ?>"/>
                                <input type="hidden" name="utm_bidding" value="<?php echo $utm_bidding; ?>"/>
                                <input type="hidden" name="utm_landing_page" value="<?php echo $utm_landing_page; ?>"/>
                                 
                                <input type="hidden" name="ipaddress" value="<?php echo $ipaddress; ?>"/>
                                 <input type="hidden" name="usercity" value="<?php echo $usercity; ?>"/>
                                 <input type="hidden" name="device" value="<?php echo $device; ?>"/>
                                 
                                <input type="hidden" name="landing" value="<?php echo $landing; ?>"/>
                                
                                <input type="hidden" name="lan_id" value="<?php echo $lan_id; ?>"/>
                                <input type="hidden" name="cl_id" value="<?php echo $cl_id; ?>"/>
                        
                              <div>

                              <div class="form-group">
                               <input class="btn btn-sm btn-block btn-blue text-uppercase" type="submit">
                               </div>
                            </fieldset>
                        </form> 
						
                    </div>
					<div class="form-down">*Prices valid for Hyderabad only.<br/>
					May vary for other locations.
					</div>
                </div>
				</div>

	  </div>
	  </div>
	  </div>
        </div>
 </div>
  </div>
  <div class="well-sm colpad" id="maincontent-show">
	  <div class="row" >
	  <div class="col-sm-12 colpad">
          <div class="colpad">
            <div class="panel panel-default ">
                     
                    <div class="panel-body">
					<div class="phea">Get Nursing Care @home</div>
                        <form role="form" id="indexFrmMobi" name="callhealth" action="emailer.php" method="post">
                            <fieldset>
      
                                <div class="form-group">
                                    <input class="form-control" placeholder="Name" name="name" id="name" type="text" required>
                </div>                            
                                <div class="form-group">
                                    <input class="form-control" placeholder="Mobile no" name="phone" id="phone" type="text"  required>
                                </div>                               

                                <div class="form-group">
                                    <input class="form-control hidden" name="captchatxt" id="captchatxt-hidden" type="text" value="<?php echo $_SESSION['captcha']['code'] ;
                                ?>" >
                               
                                <input type="text" placeholder="Enter Captcha" id="captchatxt" name="captchatxt" class="form-control" required >
                                <?php
                                             echo '<img src="' . $_SESSION['captcha']['image_src'] . '" alt="CAPTCHA" />';
                                ?>
                                </div>

                                  <input type="hidden" name="utm_source" value="<?php echo $utm_source; ?>"/>
                                <input type="hidden" name="utm_medium" value="<?php echo $utm_medium; ?>"/>
                                <input type="hidden" name="utm_campaign" value="<?php echo $utm_campaign; ?>"/>
                                <input type="hidden" name="utm_content" value="<?php echo $utm_content; ?>"/>
                                <input type="hidden" name="service" value="<?php echo $service; ?>"/>
                                
                                <input type="hidden" name="utm_term" value="<?php echo $utm_term; ?>"/>
                                <input type="hidden" name="utm_tg" value="<?php echo $utm_tg; ?>"/>
                                <input type="hidden" name="utm_location" value="<?php echo $utm_location; ?>"/>
                                <input type="hidden" name="utm_bidding" value="<?php echo $utm_bidding; ?>"/>
                                <input type="hidden" name="utm_landing_page" value="<?php echo $utm_landing_page; ?>"/>
                                 
                                <input type="hidden" name="ipaddress" value="<?php echo $ipaddress; ?>"/>
                                 <input type="hidden" name="usercity" value="<?php echo $usercity; ?>"/>
                                 <input type="hidden" name="device" value="<?php echo $device; ?>"/>
                                 
                                <input type="hidden" name="landing" value="<?php echo $landing; ?>"/>
                                
                                <input type="hidden" name="lan_id" value="<?php echo $lan_id; ?>"/>
                                <input type="hidden" name="cl_id" value="<?php echo $cl_id; ?>"/>
                        
                              <div>

                              <div class="form-group">
                               <input class="btn btn-sm btn-block btn-blue text-uppercase" type="submit">
                               </div>
                            </fieldset>
                        </form> 
                    </div>
					</div>
					<div class="form-down">*Prices valid for Hyderabad only. May vary for other locations.
                </div>
				</div>
	  
	  
	  
	  </div>
	  </div>
	  </div>
          <!-- break -->
		  <div class="container" id="how">
    <div class="row" id="section2">
	
	<div class="col-xs-12 nocolpad"><div class="down1">HOW IT WORKS</div>
	<center><div class="colorline"></div></center>
	</div>
	
	</div>
    </div>
 <div class="container">
          <div class="row">
		  
          <div class="col-md-3 col-xs-6">
            <div class="service-container">
              <div class="service-icon1">
               <div class="simg"><img src="assets/images/ic1.png"/></div>
              </div>
              <div class="service-content">
                <p>Book your service by filling up the form above</p>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-xs-6">
            <div class="service-container">
              <div class="service-icon1">
              <div class="simg"><img src="assets/images/ic2.png"/></div>
              </div>
              <div class="service-content">
                <p>Careful evaluation and assessment of your needs </p>
              </div>
            </div>
          </div>
          <div class="col-md-2 col-xs-6">
            <div class="service-container">
              <div class="service-icon1">
               <div class="simg"><img src="assets/images/ic3.png"/></div>
              </div>
              <div class="service-content">
                <p>Care plan drawn up after consultation with a specialist</p>
              </div>
            </div>
          </div>
		  <div class="col-md-3 col-xs-6">
            <div class="service-container">
              <div class="service-icon1">
               <div class="simg"><img src="assets/images/ic4.png"/></div>
              </div>
              <div class="service-content">
                <p>Nursing services closely monitored by a specialist</p>
              </div>
            </div>
          </div>

          </div>
		  </div>
		  
<div id="content1">
	<div class="container" id="pack">
    <div class="row" id="section2">
	<div class="col-xs-12 nocolpad"><div class="down1">BENEFITS</div>
	<center><div class="colorline"></div></center>
	</div>
	</div>
          <div class="row">
          <div class="col-md-3 col-xs-6 col-md-offset-3">
            <div class="service-container">
              <div class="service-icon1">
               <div class="simg"><img src="assets/images/trainedexpert.png"/></div>
              </div>
              <div class="service-content">
                <p>Physiotherapy by trained experts</p>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-xs-6">
            <div class="service-container">
              <div class="service-icon1">
              <div class="simg"><img src="assets/images/personalized.png"/></div>
              </div>
              <div class="service-content">
                <p>Personalised care plan</p>
              </div>
            </div>
          </div>        
   </div>
    </div>
		  
</div>
	 <div class="container" id="other">
    <div class="row" id="section2">
	
	<div class="col-xs-12 nocolpad"><div class="down1">OUR OTHER SERVICES</div>
	<center><div class="colorline"></div></center>
	</div>
	</div>
    </div>
 <div class="container" id="other1">
          <div class="row">
		  
          <div class="col-md-2 col-xs-6">
            <div class="service-container">
              <div class="service-icon1">
                <div class="simg"><img class="doim" src="assets/images/Icon6.png"/></div>
              </div>
              <div class="service-content">
                <p>Doctor consultation @ <span class="WebRupee wb">Rs.</span>149 onwards</p>
              </div>
            </div>
          </div>
          <div class="col-md-2 col-xs-6">
            <div class="service-container">
              <div class="service-icon1">
              <div class="simg"><img class="doim" src="assets/images/Icon10.png"/></div>
              </div>
              <div class="service-content">
                <p>Hospitalisation Assistance @ upto 40% off</p>
              </div>
            </div>
          </div>
          <div class="col-md-2 col-xs-6">
            <div class="service-container">
              <div class="service-icon1">
                <div class="simg"><img class="doim" src="assets/images/Icon7.png"/></div>
              </div>
              <div class="service-content">
                <p>Medicines @ upto 30% off</p>
              </div>
            </div>
          </div>
		  <div class="col-md-2 col-xs-6">
            <div class="service-container">
              <div class="service-icon1">
               <div class="simg"><img class="doim" src="assets/images/Icon9.png"/></div>
              </div>
              <div class="service-content">
                <p>Nursing care @ <span class="WebRupee wb">Rs.</span>600 onwards</p>
              </div>
            </div>
          </div>
		    <div class="col-md-2 col-xs-12 mid">
            <div class="service-container">
              <div class="service-icon1">
                <div class="simg"><img class="doim" src="assets/images/ic25.png"/></div>
              </div>
              <div class="service-content">
                <p>Diagnostics @ upto 70% off</p>
              </div>
            </div>
          </div>
		   
          </div>
		  </div>	     
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
   <script src="assets/js/bootstrap.min.js"></script>
	
  <script src="assets/js/jquery-validator.js"></script>
<script>

  $(document).ready(function() {
  
    // validate signup form on keyup and submit
    $("#indexFrm").validate({
      rules: {
        name: {
          required: true,
          
        },
        phone:{
          required:true,
          number:true,
          minlength: 10,
          maxlength: 10,
        }, 
        /* email:{
          required:true,
          email:true,          
        },  */ 
        captchatxt:{

          required: true,
          equalTo: "#captchatxt-hidden"
        }
      },
      messages: {
        name: {
          required: "Please enter a name",       
        },
        phone: {
          required: "Please enter a phone number",
          number: "Allowed numbers only",
          minlength: "Your phone number must consist of at least 10 numbers",
          maxlength: "Your phone number not more then 10 numbers"
        },
       /* email :{
          required: "Please enter your email",
          email: "Please enter currect email",
         
        },*/
        captchatxt:{
          required:"Please enter below text",
          equalTo: "Please enter correct text"

        }
      }

    });
$("#indexFrmMobi").validate({
      rules: {
        name: {
          required: true,
          
        },
        phone:{
          required:true,
          number:true,
          minlength: 10,
          maxlength: 10,
        }, 
        /* email:{
          required:true,
          email:true,          
        },   */
        captchatxt:{

          required: true,
          equalTo: "#captchatxt-hidden"
        }
      },
      messages: {
        name: {
          required: "Please enter a name",       
        },
        phone: {
          required: "Please enter a phone number",
          number: "Allowed numbers only",
          minlength: "Your phone number must consist of at least 10 numbers",
          maxlength: "Your phone number not more then 10 numbers"
        },
        /*email :{
          required: "Please enter your email",
          email: "Please enter currect email",
         
        },*/
        captchatxt:{
          required:"Please enter below text",
          equalTo: "Please enter correct text"

        }
      }

    });
  });
  </script>

  <script>
  $('.panel-heading a').click(function() {
    $('.panel-heading').removeClass('actives');
    $(this).parents('.panel-heading').addClass('actives');
    
    $('.panel-title').removeClass('actives'); //just to make a visual sense
    $(this).parent().addClass('actives'); //just to make a visual sense
    
    alert($(this).parents('.panel-heading').attr('class'));
 });
  </script>
   <script>
  var $root = $('html, body');
$('#topnav a').click(function() {
    var href = $.attr(this, 'href');
    $root.animate({
        scrollTop: $(href).offset().top
    }, 500, function () {
        window.location.hash = href;
    });
    return false;
});
  </script>
  </body>
</html>