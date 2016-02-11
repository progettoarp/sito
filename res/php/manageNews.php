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
  	mysqli_query($link,"DELETE FROM db_notizie_scelte");
    $tabEl=json_decode($_POST['JSONel'],true);

  	foreach($tabEl as $tabRow)
    {
		$record=explode("-",$tabRow);
		$query="select id from db_notizie_source where (fonte='". $record[1]."' AND categoria='". $record[2]."')";
        $result= mysqli_query($link,$query);
        $row = mysqli_fetch_array($result, MYSQLI_BOTH);
        mysqli_query($link,"INSERT INTO db_notizie_scelte(idNews,numero,ordine) VALUES (".$row['id'].", ".$record[3].",". $record[0].")");
    }
	
	/* free result set */
	mysqli_free_result($result);

	/* close connection */
	mysqli_close($link);
   echo 'Aggiunto'; 
    
?>