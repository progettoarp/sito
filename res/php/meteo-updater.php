<?php
$mysqli = new mysqli("localhost", "progettoleila", "delneri!", "my_progettoleila");
$q=mysqli_query($mysqli,"truncate table db_meteo_previsioni");
$result= mysqli_query($mysqli,"select * from db_meteo_scelte");
while($city=mysqli_fetch_array($result)){
	$s=file_get_contents($city["link"]);
    $json=json_decode($s,true);
    $id=$city['id'];
    $day2=$json['forecast']['simpleforecast']['forecastday'][1]['date']['day'].'/'.$json['forecast']['simpleforecast']['forecastday'][1]['date']['month'];
    $day3=$json['forecast']['simpleforecast']['forecastday'][2]['date']['day'].'/'.$json['forecast']['simpleforecast']['forecastday'][2]['date']['month'];
    $day4=$json['forecast']['simpleforecast']['forecastday'][3]['date']['day'].'/'.$json['forecast']['simpleforecast']['forecastday'][3]['date']['month'];
    $day1_icon= $json['forecast']['simpleforecast']['forecastday'][0]['icon'];
	$day1_max=$json['forecast']['simpleforecast']['forecastday'][0]['high']['celsius'];
    $day1_rain=$json['forecast']['simpleforecast']['forecastday'][0]['pop'];
    $day1_wind=$json['forecast']['simpleforecast']['forecastday'][0]['avewind']['kph'];
	$day2_icon= $json['forecast']['simpleforecast']['forecastday'][1]['icon'];
    $day3_icon= $json['forecast']['simpleforecast']['forecastday'][2]['icon'];
    $day4_icon= $json['forecast']['simpleforecast']['forecastday'][3]['icon'];
    mysqli_query($mysqli, "INSERT INTO `db_meteo_previsioni`(`id`, `idCitta`, `day1_icon`, `day1_max`, `day1_rain`, `day1_wind`, `day2`, `day2_icon`, `day3`, `day3_icon`, `day4`, `day4_icon`) VALUES (null, $id,'$day1_icon',$day1_max,$day1_rain,$day1_wind,'$day2','$day2_icon','$day3','$day3_icon','$day4','$day4_icon')");
}


?>