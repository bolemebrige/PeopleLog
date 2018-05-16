<!DOCTYPE html>
<html lang="en">
<head>

 <title>Bootstrap Theme Company Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <style>
  
  

  
   #sub{
	  
	float : right;
    right: 0px;
	  
  }
  
  </style>
  
 
<?php 

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$mail=$password="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {;
	
	  if (empty($_POST["email"])) {
	
    $emailErr = "*";
  } else {
  $mail = test_input($_POST["email"]);};

    if (empty($_POST["password"])) {
		
	
    $passwordErr = "*";
  } else {
$password = test_input($_POST["password"]);}}


$hash='$2y$10$WndPmh8UE7WqIvdmHwFftO6PSMcLCnwuzDHQTBbo.10C2MsiV89AG';//password:12345 bcrypt
if (password_verify($password, $hash) ){
	if(strcmp('dzovko@etfos.hr',$mail)==0){
	
	
	header("Location: http://localhost/eradionica/people.php");//nova stranica za ispis
	
	
}
};



?>

 </head>
  <body>
  
  <div class="row">
  <div class="col-sm-3"></div>
  <div class="col-sm-6">
  
  <img class="img-responsive" src="logo.png" alt="Logo">
  <br/> <br/>
  
<form method="post" action="<?php  htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
    <input id="email" type="text" class="form-control" name="email" placeholder="Email">
  </div><br/>
  <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
    <input id="password" type="password" class="form-control" name="password" placeholder="Password">
  </div>
  <br/>
 <button type="submit" class="btn btn-md" id="sub">Submit</button>
</form>
  
  
  
  
  
  
  </div>
  <div class="col-sm-3"></div>
</div>
  
  
  
  
  
  
  
  
  
  </body>
  </html>