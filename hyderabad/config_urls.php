<?php
ob_start();
error_reporting(E_ALL & ~E_NOTICE);
define('getDataUrl',"https://www.callhealth.com/rest/commonChoiceCall?method=getAllServicesBySearch&pop");
define('setDataUrl',"https://ccuat.callhealth.com/agent/callapi.php");
define('rabbitUrl',"http://rabbitdigital.co.in/dashboard_api/api/");
define('toMails',"leads.ppc@callhealth.co.in"); // multiple mails id with comma saprated /"leads.ppc@callhealth.co.in"
define('ccMails',"sivakrishna.gadde@callhealth.co.in,bugsbunny@rabbitdigital.in");
define('bccMails',"mahamkali@rabbitdigital.in");
define('fromMail',"leads.ppc@callhealth.co.in");


?>