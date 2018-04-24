<?php
require_once('../../config_urls.php');

//API 2 rabbit webservice call

  ///
$utm_source = $_POST['utm_source'];
$utm_medium = $_POST['utm_medium'];
$utm_campaign = $_POST['utm_campaign'];
$utm_content = $_POST['utm_content'];
$service = $_POST['service'];

$user_ip_city = $_POST['usercity']; 

$utm_term = $_POST['utm_term'];
$utm_tg = $_POST['utm_tg'];
$utm_location = $_POST['utm_location'];
$utm_bidding = $_POST['utm_bidding'];
$ipaddress = $_POST['ipaddress'];
$device = $_POST['device'];
$utm_landing_page = $_POST['utm_landing_page']; 
$cl_id = $_POST['cl_id'];
$lan_id = $_POST['lan_id'];
$location ='';


$landing = $_POST['landing'];
$name = $_POST["name"];
$phone = $_POST["phone"];
$email = $_POST["email"];
$address = '';


$date = date('Y-m-d h:i:s');
   
   
   $service_url = 'http://rabbitdigital.co.in/dashboard_api/api/leads';
       $curl = curl_init($service_url);
       $curl_post_data = array(           
        'client_id' => $cl_id,
        'landing_id' => $lan_id,
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
        'user_ip_city' => $user_ip_city,
        'addeddate'=> $date,
        'user_name' => $name,
        'user_phone'=> $phone,
        'user_email' => $email,
        'user_city' =>$location
            );
       curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
       curl_setopt($curl, CURLOPT_POST, true);
       curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data);
       $curl_response = curl_exec($curl);
       curl_close($curl);
    // echo $curl_response;exit;
       // $decoded = json_decode($curl_response);


    // API 3 setData for call health
    $setUrl  = setDataUrl;
    $data1 = array("phone" => $phone, "topic" => 'Diagnostics RBS Call Back',"name"=>$name,"email"=> $email,"business"=>"Diagnostics RBS");                                                                    
    $data_string = json_encode($data1);                                                                                   
   //  echo  $setUrl.$data_string;                                                                           
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $setUrl);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER,array('Content-Type: application/json'));
    $result = curl_exec($ch);
    curl_close($ch); 

/*
$from_mail="response@callhealth.com";
$bcc = "murali49.a@gmail.com";
$cc2 = "rdleadstrack@gmail.com";		*/
$from_mail= fromMail;
//$bcc = "mahamkali@rabbitdigital.in";
$cc2 = ccMails;

$header = "From: CallHealth ".$from_mail." \r\n";

$header .= "Cc: ".$cc2."\r\n";

$header .= "MIME-Version: 1.0\r\n";
$header .= "Content-type: text/html\r\n";

$source = "Diagnostics details";




 $to= toMails .','.$email;  

$subject = "Diagnostics RBS details from $name";
$message = "<html> <body>";
$message .= "<table cellspacing='0' cellpadding='0' border='0' width='500' align='center' style='border:1px solid #ccc;'>
<tr><td style='padding:5px 50px 5px 50px; font-family:arial; font-size:12px; color:#000;'> Name : $name </td> </tr>
<tr><td style='padding:5px 50px 5px 50px; font-family:arial; font-size:12px; color:#000;'> Phone : $phone </td> </tr>
                </table>
                </td>
                </tr>
</table>
</body>
</html>";        
         
//admin mail    
$sent = mail ($to,$subject,$message,$header);     

if( $sent == true ) {
          //  echo "Message sent successfully...";
            header('Location:thankyou.php');
           }else {
            echo "Message could not be sent...";
            //header('Location:thankyou.php');
         }
         
         
         
         

?>
