<?php

// Server key from Firebase Console
define( 'API_ACCESS_KEY', '****************************************************************' ); // Replace YOUR FIREBASE CLOUD MESSAGING API KEY with your Firebase Cloud Messaging server Key

if($_SERVER["REQUEST_METHOD"] == "POST")
{

// POST values
$token= $_POST["token"];
$title= $_POST["title"];
$message= $_POST["message"];
$postlink= $_POST["postlink"];

$token = htmlspecialchars($token,ENT_COMPAT);
$title = htmlspecialchars($title,ENT_COMPAT);
$message = htmlspecialchars($message,ENT_COMPAT);
$postlink = htmlspecialchars($postlink,ENT_COMPAT);

// Push Data's
$data = array(
"to" => "$token",
"notification" => array( 
"title" => "$title", 
"body" => "$message", 
"icon" => "https://avatars2.githubusercontent.com/u/52190236?s=460&u=b5599a497d334f1edf4c2be8df4bd4d8f2a44e54&v=4", // Replace https://example.com/icon.png with your PUSH ICON URL
"click_action" => "$postlink")
);

// Print Output in JSON Format
$data_string = json_encode($data); 
     
// FCM API Token URL
$url = "https://fcm.googleapis.com/fcm/send";

//Curl Headers
$headers = array
(
     'Authorization: key=' . API_ACCESS_KEY, 
     'Content-Type: application/json'
);  

$ch = curl_init();  
curl_setopt($ch, CURLOPT_URL, $url);                                                                 
curl_setopt($ch, CURLOPT_POST, 1);  
curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
curl_setopt( $ch,CURLOPT_POSTFIELDS, $data_string);                                                                  
                                                                                                                     
// Variable for Print the Result
$result = curl_exec($ch);

curl_close ($ch);

}

?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<title>FCM Push Notification</title>
<meta name="Description" content="Subscribe to our Blog Post Updates.">

<!-- CSS and Fonts -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css" integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Exo+2" rel="stylesheet">

<style>
body {
  background: #eee !important;
  font-family: 'Exo 2', sans-serif;
}
.login-form{
  margin:3% auto 0;
  max-width:380px;
}
.login-form h1{
  font-size: 30pt;
  font-weight: 700;
    letter-spacing: -1px;
    font-family: 'Exo 2', sans-serif;
}
.form-header,.form-footer{
  background-color: rgba(255, 255, 255, .8);
    border: 1px solid rgba(0,0,0,0.1);
}
.form-signin{
  padding: 45px 35px 45px;
    background-color: #fff;
    border: 1px solid rgba(0,0,0,0.1);  
    border-bottom: 0px; 
    border-top: 0px;  
}
.form-register{
  padding: 45px 35px 45px;
    background-color: #fff;
    border: 1px solid rgba(0,0,0,0.1);  
    border-bottom: 0px; 
    border-top: 0px; 
}
.form-header{
  text-align: center;
  padding: 15px 40px;
  border-radius: 10px 10px 0 0;
}
.form-header i{font-size:60px;}
.form-footer {
  padding: 15px 40px; 
}
.form-signin-heading{
  margin-bottom: 30px;
}
.bt-login{
    background-color: #ff8627;
    color: #ffffff;
    padding-bottom: 10px;
    padding-top: 10px;
    transition: background-color 300ms linear 0s;
}
.form-signin .form-control, .form-register .form-control{
  position: relative;
  height: auto;
  -webkit-box-sizing: border-box;
     -moz-box-sizing: border-box;
          box-sizing: border-box;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus, .form-register .form-control:focus {
  z-index: 2;
}
.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
input.parsley-error,
select.parsley-error,
textarea.parsley-error {    
    border-color:#843534;
    box-shadow: none;
}
input.parsley-error:focus,
select.parsley-error:focus,
textarea.parsley-error:focus {    
    border-color:#843534;
    box-shadow:inset 0 1px 1px rgba(0,0,0,.075),0 0 6px #ce8483
}
.parsley-errors-list {
    list-style-type: none;
    opacity: 0;
    transition: all .3s ease-in;

    color: #d16e6c;
    margin-top: 5px;
    margin-bottom: 0;
  padding-left: 0;
}
.parsley-errors-list.filled {
    opacity: 1;
    color: #a94442;
}
pre {
  background-color: #f7f7f9;
  border: 1px solid #e1e1e8;
color: #336cac;
font-size: 17px;
}
pre:before {
    color: #333;
}
.btn {
    margin-bottom:4px;white-space: normal;
}
.input {
    margin-bottom:4px;white-space: normal;
}
</style>


<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>

</head>
<body>
<br />

<div class="container">
<div class="login-form">
<h2 class="text-center">Send Push Notification</h2>
<br>
<div class="form-header">
<i class="fas fa-bell"></i>
</div>
<form class="form-signin" method="post">
<div class="form-group">
<textarea class="form-control" name="token" placeholder="FCM Token" data-parsley-required="true" data-parsley-error-message="Please Enter the Token"></textarea>
</div>
<div class="form-group">
<input class="form-control" type="text" name="title" placeholder="Push Title" data-parsley-required="true" data-parsley-error-message="Enter the Title">
</div>
<div class="form-group">
<textarea class="form-control" name="message" placeholder="Push Message" data-parsley-required="true" data-parsley-error-message="Enter a Push Message"></textarea>
</div>
<div class="form-group">
<input class="form-control" type="text" name="postlink" placeholder="Click Action Link" data-parsley-required="true" data-parsley-error-message="Enter a Link">
</div>
<button type="submit" class="btn btn-block bt-login">Send Push</button>
</form>
<br />
<br />
</div>
</div>

<div class="container">
<div class="row">
<div class="col-lg-6 col-lg-offset-3 mx-auto">
<?php
if(isset($_POST['token'])) {
// Display Output
echo "<p>&nbsp;</p>";
echo "<pre>$result</pre>";
echo "<pre>The Json Data : $data_string</pre>";
}
?>
</div>
</div>
</div>
<br />
<br />

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.8.1/parsley.min.js" integrity="sha256-XqEmjxbIPXDk11mQpk9cpZxYT+8mRyVIkko8mQzX3y8=" crossorigin="anonymous"></script>

<script>
$(document).ready(function(){
  $('form').parsley();
});
</script>

</body>
</html>
