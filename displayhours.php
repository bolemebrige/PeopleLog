<!DOCTYPE html>
<html lang="hr-HR">
<head>

 <title>Osoba</title>
  <meta charset="utf-8">
  <meta http-equiv="content-type" content="text/html; charset=ISO-8859-2" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
  <style>
  
  #myTable{
	  
	   font-family: "Oswald", Helvetica, Arial, sans-serif!important;
	  
  }
  
  .tr {
	  
	  data-trigger="focus" ;
  }
  
  </style>

</head>
  <body>
<div class="row">
  <div class="col-sm-3"></div>
  <div class="col-sm-6">
  
<?php 

$oib1 = $_GET['oib'];
$con = mysqli_connect("localhost","root","","eradionica")
	or die("Failed to connect to MySQL: " . mysqli_connect_error());

$query1="SELECT SUM(rez_vrijeme) as rezvrijeme,ukupno.mjesec,ukupno.godina FROM ukupno WHERE ukupno.oib=". $oib1. " GROUP BY ukupno.mjesec,godina ORDER BY godina DESC ";
$query2="SELECT ime,prezime FROM ulaz WHERE oib= ".$oib1;


$result1=mysqli_query($con,$query1);
	if (!$result1) 
	{  echo "lose";
    	die('Invalid query: ' . mysql_error());
	}
	
	$result2=mysqli_query($con,$query2);
	if (!$result1) 
	{  echo "lose";
    	die('Invalid query: ' . mysql_error());
	}
	
	while($row1 = mysqli_fetch_assoc($result2)){
	
$ime=$row1['ime'];
$prezime=$row1['prezime'];


}
	
	
	
	while($row = mysqli_fetch_assoc($result1)){
	
$sati[]=$row['rezvrijeme'];
$mjesec[]=$row['mjesec'];
$godina[]=$row['godina'];

}

?>



  <h2><?php echo $ime.' '.$prezime;   ?></h2>
   <input class="form-control" id="myInput" type="text" placeholder="Search..">
  <br/>
  <br/>
  <br/>
  <table class="table table-striped table-responsive table-hover">
    <thead>
      <tr class="success">
        <th>Godina</th>
        <th>Mjesec</th>
		<th>Vrijeme rada</th>
        
      </tr>
    </thead>
    <tbody id="myTable">
<?php
 for($j=0;$j<count($sati);$j++){
  
  
  ?>
   
  

	

	
   <tr>
   
   
   <th><?php echo $godina[$j];?></th>
		<th><?php echo $mjesec[$j];?></th>
		<th><?php $sati[$j]=round($sati[$j],2);
		echo $sati[$j];?></th>

        
      </tr>
	  
	 
	  

   
	<?php };
            ?>
     
    </tbody>
  </table>
 </div>
<div class="col-sm-3"></div>
</div>
 </body>
   </html>