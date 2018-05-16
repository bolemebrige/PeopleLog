<?php
date_default_timezone_set("Europe/Zagreb");

// Create connection
$con = mysqli_connect("localhost","root","","eradionica")
	or die("Failed to connect to MySQL: " . mysqli_connect_error());




//http://localhost/eradionica/getdata.php?oib=331215335&ime=ja&prezime=ti&time=2015-02-03%2023:55:50&flag=0

$oib = $_GET['oib'];
$name= $_GET['ime'];
$surname=$_GET['prezime'];
$time = $_GET['time'];

$flag = $_GET['flag'];

if($flag == 1){


	
	echo $time;
	$result=mysqli_query($con,"INSERT INTO ulaz(indeks,oib,ime,prezime,vr_ulaz) VALUES ('','$oib','$name','$surname','$time')");
	if (!$result) 
	{  echo "lose";
    	die('Invalid query: ' . mysql_error());
	}
	
}
else {
	$timealias=strtotime($time);

	
	
	$query="SELECT ulaz.vr_ulaz FROM ulaz WHERE indeks=(SELECT MAX(ulaz.indeks) FROM ulaz WHERE ulaz.oib=" . $oib. ")";
	
	$queryresult=mysqli_query($con,$query);
	if (!$queryresult) {
		echo "lose";
    	die('Invalid query: ' . mysql_error());
	};
	$uzetovrijeme = mysqli_fetch_array($queryresult, MYSQLI_NUM);
	

mysqli_free_result($queryresult);
	
	

$time1alias=strtotime($uzetovrijeme[0]);
echo $time1alias.'<br>';

$interval=$timealias-$time1alias;
echo $interval.'<br>';
$interval=$interval/3600.00;
$interval=round($interval,2);//zaokruži na 2 decimale
echo $interval;
$month = date('m', $time1alias);
$year=date('Y',$time1alias);
mysqli_query($con,"INSERT INTO ukupno (num,oib,rez_vrijeme,mjesec,godina) VALUES ('','$oib','$interval','$month','$year')");

}


mysqli_close($con);
?> 