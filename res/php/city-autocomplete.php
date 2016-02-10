<?php
	$citta=$_POST['citta'];
	echo $citta."<br>";
	$s=file_get_contents("http://autocomplete.wunderground.com/aq?query=".urlencode($citta));
    $json=json_decode($s,true);	
	foreach($json['RESULTS'] as $city){
		echo $city['name'].' - '.$city['zmw'].'<br>';
	}
?>