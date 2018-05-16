<!DOCTYPE html>
<html lang="hr-HR">
<head>

 <title>Zaposlenici</title>
  <meta charset="utf-8">
  <meta http-equiv="content-type" content="text/html; charset=ISO-8859-2" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  
  #myTable{
	  
	   font-family: "Oswald", Helvetica, Arial, sans-serif!important;
	  
  }
  
  .tr {
	  
	  data-trigger="focus" ;
  
  }
  
  
  </style>
 <script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});




jQuery(document).ready(function($) {
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
});




function myfunction(clicked_id){
		if (window.XMLHttpRequest){
    xmlhttp=new XMLHttpRequest();
}

else{
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}


var PageToSendTo = "http://localhost/eradionica/displayhours.php?";
var MyVariable = clicked_id;
var VariablePlaceholder = "oib=";
var UrlToSend = PageToSendTo + VariablePlaceholder + MyVariable;



	window.open(UrlToSend);
	
	
}
</script>
  
  <?php
  
  // Create connection
$con = mysqli_connect("localhost","root","","eradionica")
	or die("Failed to connect to MySQL: " . mysqli_connect_error());

	$query="SELECT ime,prezime,oib FROM ulaz WHERE 1";
	
$result=mysqli_query($con,$query);
	if (!$result) 
	{  echo "lose";
    	die('Invalid query: ' . mysql_error());
	}
	
	
	$ljudi= mysqli_fetch_array($result, MYSQLI_NUM);
	

	
	
	
	mysqli_free_result($result);
  
  
  
  ?>
  
  </head>
  <body>
  <div class="row">
  <div class="col-sm-2"></div>
  <div class="col-sm-8">

  <h2>Zaposlenici:</h2>
    
  <input class="form-control" id="myInput" type="text" placeholder="Search..">
  <br>
  <table class="table table-striped table-bordered table-responsive table-hover">
    <thead>
      <tr class="info">
        <th>Ime</th>
        <th>Prezime</th>
		<th>Posljednji mjesec/Tekući mjesec</th>
		
        
      </tr>
    </thead>
    <tbody id="myTable">
	
   <?php  
   
   


	$query="SELECT Distinct ime,prezime,oib FROM ulaz WHERE 1";

	
$result=mysqli_query($con,$query);
	if (!$result) 
	{  echo "lose";
    	die('Invalid query: ' . mysql_error());
	}
	
		

	
	while($row = mysqli_fetch_assoc($result)){
	
	$imena[] = $row['ime'];
$prezimena[] = $row['prezime'];
$oibovi[]=$row['oib'];


}

 
  
  for($i=0;$i<count($imena);$i++){
  
  
  ?>
   
  

	

	
   <tr onclick="myfunction(this.id)" id="<?php echo $oibovi[$i];?>">
   
        <th style="cursor:pointer;"><?php echo $imena[$i];?></th>
		<th style="cursor:pointer;"><?php echo $prezimena[$i];?></th>
		<th style="cursor:pointer;"><?php 
		$query1="SELECT SUM(rez_vrijeme) as rezvrijeme,ukupno.mjesec,ukupno.godina FROM ukupno WHERE ukupno.oib= ".$oibovi[$i]." GROUP BY ukupno.mjesec,godina ORDER BY godina DESC ";
			
$result1=mysqli_query($con,$query1);
	if (!$result1) 
	{  echo "lose";
    	die('Invalid query: ' . mysql_error());
	}
		 while($row1 = mysqli_fetch_assoc($result1)){
	
	$time[] = $row1['rezvrijeme'];
$month[] = $row1['mjesec'];
$year[]=$row1['godina'];
}
$timeFormatNow=round($time[0],2);
$timeFormatLast=round($time[1],2);
	echo $timeFormatLast.'/'.$timeFormatNow;	
		
		?></th>
		
      </tr>
	  
	 
	  

   
	<?php };
            ?>
     
    </tbody>
  </table>
  

</div>
<div class="col-sm-2"></div>


</div>

  </body>
   </html>