<?php
	$citta=$_POST['citta'];
	//echo $citta."<br>";
	$s=file_get_contents("http://autocomplete.wunderground.com/aq?query=".urlencode($citta));
    $json=json_decode($s,true);	
	foreach($json['RESULTS'] as $city){
		echo "<option zmw=".$city['zmw']." value='".$city['name']."'>".$city['name']." </option>";
	}
?>