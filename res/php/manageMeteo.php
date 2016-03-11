<?php
	//session_start();
   	$link = new mysqli("localhost", "root", "", "my_progettoleila");
	
    //$result= mysqli_query($mysqli,"select * from db_impostazioni where str_name='lettura_notizie'");
    //$r=mysqli_fetch_array($result);
	//$link->query("DELETE * FROM db_notizie_scelte");
	
	/* check connection */
	if ($link->connect_errno) {
		printf("Connessione fallita");
		exit();
	}
  	mysqli_query($link,"DELETE FROM db_meteo_scelte");
    $tabEl=json_decode($_POST['JSONel'],true);

  	foreach($tabEl as $tabRow)
    {
		$record=explode("-",$tabRow);
		$f=explode("!",$record[0]);
		echo $record[0];
		$q="INSERT INTO db_meteo_scelte (citta, cap, provincia, nazione, link) VALUES ('".$record[1]."', '".$record[2]."','". $record[3]."','". $record[4]."','". $f[1]."')";
		mysqli_query($link,$q);
    }


	/* close connection */
	mysqli_close($link);
   echo 'Aggiunto'; 
    
?>