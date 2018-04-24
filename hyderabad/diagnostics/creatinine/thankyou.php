<?php
require_once('../config_urls.php');

$city = 100340; //hyderabad
$serviceName ='creatinine' ;

$getUrl = getDataUrl;
$data = array("method" => "getAllServicesBySearch", "pop" => $city,"name"=>$serviceName,"businessID"=>"0");                                                                    
$data_string = json_encode($data);                                                                                   
                                                                                                                     
$ch = curl_init($getUrl);                                                                      
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
    'Content-Type: application/json',                                                                                
    'Content-Length: ' . strlen($data_string))                                                                       
);                                                                                                                   
                                                                                                                     
$result = curl_exec($ch);
$resData =json_decode($result);

// define vars
  $cityName ='';
  $name='';
  $searchDescription='';
  $resData->status;
  $description='';
  $servicePrecautions='';
  $grossAmount='';
  $netAmount='';
  $metaTitle ='';
  $seoName = '';
  $metaDescription ='';
  $keywords='';

 $status = $resData->status;
 if($status == 1){

    $data =$resData->data;

          if($data){
           $cityName =$data[0]->cityName;
          // name 
           $pagename = $data[0]->name;
          // what is this test
           $searchDescription = $data[0]->searchDescription;
          //why is it done
          $description = $data[0]->description;

          $description = nl2br($description);
          // Any instructions
           $servicePrecautions = $data[0]->servicePrecautions;

          //actual amount
           $grossAmount = $data[0]->grossAmount;
           // final amount
           $netAmount = $data[0]->netAmount;
            //metaTitle
           $metaTitle = $data[0]->metaTitle;
           //seoName
            $seoName = $data[0]->seoName;
              //metaDescription
            $metaDescription = $data[0]->metaDescription;
            $keywords = $data[0]->keywords; 
          
        }

    }


   
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo $metaDescription ; ?>">
    <meta name="keywords" content="<?php echo $keywords ; ?>">
    <title>CallHealth</title>
 <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
 <link href="../assets/css/style.css" rel="stylesheet">
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
   
    <div id="content">
      <div class="container">
        <!-- begin:latest -->
        <div class="row" id="topc">
	  <div class="col-xs-6">
	  <a class="navbar-brand pull-left" ><img src="../assets/images/logo.png" class="img-responsive"/></a>
	  </div>
	  <div class="col-xs-6">
	  <a  href="tel:04033557799" class="phone pull-right">040 - 33 55 77 99</a>
	  </div>
	  </div>
      <div class="row">
	  <div class="col-sm-12">
	  <div class="well1" id="maincontent">
	  <div class="row" >
          <div class="col-md-6 col-xs-8 colpad">
           <div class="banncont">
		     <div class="head"><?php echo $pagename; ?></div>
         <div class="head1"><span class="cross"><span class="WebRupee wb">Rs.</span><?php echo $grossAmount; ?></span> <span class="bsm">now at</span> <span class="WebRupee wb">Rs.</span><span style="font-family:Gotham-Bold"><?php echo $netAmount; ?></span>*</div>
		     
		     <div class="cont">Get a wide range of diagnostic tests done from the comfort of your home within 30 minutes.
			 <div class="colorline1"></div></div>
		     <div class="buttn" data-toggle="modal" data-target="#myModal1"> View all tests <span style="color:#37499b;"><b>></b></span></div>
		   </div>
          </div>
          <div class="col-md-6 col-xs-4 colpad mnop">
		  <div class="bimg hidden-xs"><img src="../assets/images/hand.png"/></div>
		  <div class="bimg1 visible-xs"><img src="../assets/images/hand_small.png"/></div>
          <div class="login-panel panel panel-default">
                    
                  <div class="panel-body thank">
                         <div class="call">
                         <p>Thank you for contacting us.</p>
                         <p>Our customer care executive will call you shortly.</p>
                       </div>
                     </div>
					
					<div class="form-down">*Prices valid for Hyderabad only.<br/>May vary for other locations.
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
                         <div class="call">
                         <p>Thank you for contacting us.</p>
                         <p>Our customer care executive will call you shortly.</p>
                       </div>
                     </div>
					</div>
					<div class="form-down">*Prices valid for Hyderabad only. May vary for other locations.
                </div>
				</div>
	  
	  
	  
	  </div>
	  </div>
	  </div>
	  </div>
        </div>
 </div>
        </div>
          <!-- break -->
		  <div class="container">
    <div class="row" id="section2">
	
	<div class="col-xs-12 nocolpad"><div class="down1">HOW IT WORKS</div>
	<center><div class="colorline"></div></center>
	</div>
	
	</div>
    </div>
 <div class="container">
          <div class="row">
		  
          <div class="col-md-2 col-xs-6">
            <div class="service-container">
              <div class="service-icon1">
               <div class="simg"><img src="../assets/images/Icon1.png"/></div>
              </div>
              <div class="service-content">
                <p>On booking, our representative calls to fix a date and time</p>
              </div>
            </div>
          </div>
          <div class="col-md-2 col-xs-6">
            <div class="service-container">
              <div class="service-icon1">
              <div class="simg"><img src="../assets/images/Icon2.png"/></div>
              </div>
              <div class="service-content">
                <p>FREE sample collection from home within 30 minutes</p>
              </div>
            </div>
          </div>

       <div class="col-md-2 col-xs-12 mid">
            <div class="service-container">
              <div class="service-icon1">
                <div class="simg"><img src="../assets/images/Icon5.png"/></div>
              </div>
              <div class="service-content">
                <p>Reports from NABL Accredited Labs</p>
              </div>
            </div>
          </div>
          <div class="col-md-2 col-xs-6">
            <div class="service-container">
              <div class="service-icon1">
               <div class="simg"><img src="../assets/images/Icon3.png"/></div>
              </div>
              <div class="service-content">
                <p>Reports<br/>emailed within 24 hours</p>
              </div>
            </div>
          </div>
		  <div class="col-md-2 col-xs-6">
            <div class="service-container">
              <div class="service-icon1">
               <div class="simg"><img src="../assets/images/Icon4.png"/></div>
              </div>
              <div class="service-content">
                <p>Report interpretation by expert for FREE</p>
              </div>
            </div>
          </div>
		  
		   
          </div>
		  </div>
		  
<div id="content1">
	 <div class="container">
    <div class="row" id="section2">
	<div class="col-xs-12 nocolpad"><div class="down1">Know More  About <?php echo $pagename; ?>.</div>
	<center><div class="colorline"></div></center>
	</div>
	
	</div>
    </div>
	
	
		  <section id="caniuse">
		  <div class="container">
		  <div class="row">

          <div class="col-sm-12">
                
          <div class="panel-group" id="accordion">
  <div class="panel panel-default clickable">
    <div class="panel-heading">
	<div class="row">
	<div class="col-xs-12 nor-pad">
      <h4 class="panel-title accordion-toggle"  data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
        
         <div id="tria"><p>WHAT IS THIS TEST?</p></div>
        
      </h4>
    </div>

	</div>
	</div>
	
    <div id="collapseOne" class="panel-collapse collapse in">
      <div class="panel-body">
	  <div class="col-xs-12 acont"> 
      	  <?php echo $searchDescription; ?> 

        </div>
      </div>
    </div>
  </div>
  <div class="panel panel-default clickable">
    <div class="panel-heading">
	<div class="row">
	<div class="col-xs-12 nor-pad">
      <h4 class="panel-title accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
        
         <div id="tria"><p>WHY IS IT DONE?</p></div>
        </h4>
     </div>

	</div>
	</div>
    <div id="collapseTwo" class="panel-collapse collapse">
      <div class="panel-body">
<div class="col-xs-12 acont"> 
	    <?php echo $description; ?> 
	  </div>
	 
      </div>
    </div>
  </div>
  <!-- <div class="panel panel-default clickable">
    <div class="panel-heading">
	<div class="row">
	<div class="col-xs-12 nor-pad">
      <h4 class="panel-title accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
          <div id="tria"><p>WHEN IS IT DONE?</p></div>
      </h4>
     </div>
	</div>
	</div>
    <div id="collapseThree" class="panel-collapse collapse">
      <div class="panel-body">
	  <div class="col-xs-12 acont"> 
	  <ul>
	  <li>For a healthy individual, it is recommended to do this test at least once in a year.</li>
      <li>For people with above risk factors, it is recommended to do this test at least once in 6months.</li>
      <li>For people with a previous abnormal lipid profile, it is recommended to do this test at least once in 3months or as advised by the doctor.</li>
      </ul>
	  </div>
      </div>
    </div>
  </div>
  

  <div class="panel panel-default clickable">
    <div class="panel-heading">
	<div class="row">
	<div class="col-xs-12 nor-pad">
      <h4 class="panel-title accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
          <div id="tria"><p>INTERPRETATION</p></div>
      </h4>
     </div>
	</div>
	</div>
    <div id="collapseThree" class="panel-collapse collapse">
      <div class="panel-body">
	  <div class="col-xs-12 acont"> 
	  <ul>
	  <li>Abnormal test values usually mean one (or more) of the following:
		<ul>
		<li>Yourfood contains excess of saturated fats than required</li>
        <li>Your physical activity is not as per the recommended standards</li>
        <li>Your body is not able to utilize the fat from food</li>
		</ul>
	  </li>
      <li>Abnormal test values potentially increases the risk of obesity, diabetes, hypertension, cardiac problems and stroke</li>
       </ul>
	  </div>
      </div>
    </div>
  </div>  
   -->
  
<div class="panel panel-default clickable">
    <div class="panel-heading">
	<div class="row">
	<div class="col-xs-12 nor-pad">
      <h4 class="panel-title accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
          <div id="tria"><p>ANY INSTRUCTIONS TO BE FOLLOWED BEFORE TEST?</p></div>
      </h4>
     </div>
	</div>
	</div>
    <div id="collapseThree" class="panel-collapse collapse">
      <div class="panel-body">
	  <div class="col-xs-12 acont"> 
	  <?php echo $searchDescription; ?> 
	  </div>
      </div>
    </div>
</div>

<!-- <div class="panel panel-default clickable">
    <div class="panel-heading">
	<div class="row">
	<div class="col-xs-12 nor-pad">
      <h4 class="panel-title accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
          <div id="tria"><p>REMEMBER</p></div>
      </h4>
     </div>
	</div>
	</div>
    <div id="collapseThree" class="panel-collapse collapse">
      <div class="panel-body">
	  <div class="col-xs-12 acont"> 
	  Early detection can help manage high levels of lipids effectively and reduce the complications significantly
	  </div>
      </div>
    </div>
</div> -->
  
</div>

          </div>
          </div>
		  </div>
		  </section>
		  
</div>
	 <div class="container">
    <div class="row" id="section2">
	
	<div class="col-xs-12 nocolpad"><div class="down1">OUR OTHER SERVICES</div>
	<center><div class="colorline"></div></center>
	</div>
	
	</div>
    </div>
 <div class="container">
          <div class="row">
		  
          <div class="col-md-2 col-xs-6">
            <div class="service-container">
              <div class="service-icon1">
                <div class="simg"><img class="doim" src="../assets/images/Icon6.png"/></div>
              </div>
              <div class="service-content">
                <p>Doctor consultation</p>
              </div>
            </div>
          </div>
          <div class="col-md-2 col-xs-6">
            <div class="service-container">
              <div class="service-icon1">
              <div class="simg"><img class="doim" src="../assets/images/Icon7.png"/></div>
              </div>
              <div class="service-content">
                <p>Medicines<br/>@home</p>
              </div>
            </div>
          </div>
          <div class="col-md-2 col-xs-6">
            <div class="service-container">
              <div class="service-icon1">
                <div class="simg"><img class="doim" src="../assets/images/Icon8.png"/></div>
              </div>
              <div class="service-content">
                <p>Physiotherapy<br/>@home</p>
              </div>
            </div>
          </div>
		  <div class="col-md-2 col-xs-6">
            <div class="service-container">
              <div class="service-icon1">
               <div class="simg"><img class="doim" src="../assets/images/Icon9.png"/></div>
              </div>
              <div class="service-content">
                <p>Nursing care<br/>@home</p>
              </div>
            </div>
          </div>
		    <div class="col-md-2 col-xs-12 mid">
            <div class="service-container">
              <div class="service-icon1">
                <div class="simg"><img class="doim" src="../assets/images/Icon10.png"/></div>
              </div>
              <div class="service-content">
                <p>Facilitation</p>
              </div>
            </div>
          </div>
		   
          </div>
		  </div>	        
  <footer class="footer">
         <div class="container">
         <div class="row">
		 	 <div class="col-md-6 col-xs-9 col-md-offset-0 col-xs-offset-2">
		  <ul class="socialicons"> 
		  <li><a class="twitter" href="https://twitter.com/CallHealthIndia" target"_blank"=""></a> </li>
		  <li> <a class="facebook" href="https://www.facebook.com/CallHealth-805530929458243/" target"_blank"=""></a> </li> 
          <li> <a class="youtube" href="https://www.youtube.com/channel/UCVaHv9sE-UV93i60q-OKwSw" target"_blank"=""></a> </li>  
           <li> <a class="google" href="https://plus.google.com/u/1/+CallHealthOfficial/about" target"_blank"=""></a> </li> 
</ul>
	
		  </div>
         <div class="col-md-6 col-xs-12">
		 <ul class="list-inline ">
	<li><a href="https://www.callhealth.com/home">www.callhealth.com</a></li>
	</ul>
	 </div>

         </div>
         </div>
         </footer>
<div id="myModal1" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
					  <button type="button" class="close" data-dismiss="modal">&times;</button>
					 <img src="../assets/images/logo.png" class="img-responsive" style="width: 30%;">
						</div>
      <div class="modal-body">
	  <center><h4 style="text-decoration:underline"> List Of All Tests </h2></center>
	  <ul>
	  <li><a href="../calcium" target="_blank">Calcium - Serum</a></li>
    <li><a href="../VitaminD" target="_blank">25-Hydroxy Vitamin D</a></li>
    <li><a href="../cbp" target="_blank">Complete Blood Count(CBC) or CBP</a></li>
    <li><a href="../cue" target="_blank">Complete Urine Examination (CUE) - Urine</a></li>
    <li><a href="../creatinine" target="_blank">Creatinine - Serum</a></li>
    <li><a href="../culture" target="_blank">Culture & Sensitivity urine</a></li>
    <li><a href="../esr" target="_blank">Erythrocyte Sedimentation Rate (ESR) - Whole Blood</a></li>
    <li><a href="../fbs" target="_blank">Fasting Blood Glucose (FBS)</a></li>
    <li><a href="../hba1c" target="_blank">Glycosylated Hemoglobin (HBA1c) - Whole Blood</a></li>
    <li><a href="../hb" target="_blank">Hemoglobin   Hb - Whole Blood</a></li>
    <li><a href="../lipid">Lipid Profile</a></li>
    <li><a href="../lft" target="_blank">Liver Function Test (LFT)</a></li>
    <li><a href="../ppbs" target="_blank">Post prandial blood sugar</a></li>
    <li><a href="../rbs" target="_blank">Random blood sugar</a></li>
    <li><a href="../serum_electro" target="_blank">Serum Electrolytes</a></li>
    <li><a href="../thyroid" target="_blank">Thyroid profile</a></li>
    <li><a href="../tsh" target="_blank">TSH Hormone</a></li>
    <li><a href="../uric" target="_blank">Uric acid serum</a></li>
    <li><a href="../vit_b12" target="_blank">Vit B12 serum</a></li>
    <li><a href="../vit_d3" target="_blank">Vitamin D3</a></li>
	  </ul>
	  
      </div>
      
    </div>

  </div>
</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
   <script src="../assets/js/bootstrap.min.js"></script>
	<script src="../assets/js/stacktable.js"></script>
	<script src="../assets/js/jquery.easing.min.js"></script>
	 <script>
	 $(document).ready(function(){
  $('#myModal1').on('hidden.bs.modal', function () {
    var $this = $(this).find('iframe'),
      tempSrc = $this.attr('src');
      $this.attr('src', "");
      $this.attr('src', tempSrc);
    });
	$('#responsive-example-table').stacktable({myClass:'your-class-name'});
	
	
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
$('.login-panel a').click(function() {
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