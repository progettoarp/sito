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

	$type=$_POST['action'];
	if($type=='generali')
	{
		$lingua=$_POST['lingua'];
		$mnotte='false';
		if(($_POST['mod_notte']==1))
			$mnotte='true';
		$inotte=$_POST['ini_notte'];
		$fnotte=$_POST['fin_notte'];
		$muto='false';
		if(($_POST['mod_muto']==1))
			$muto='true';
		$ore=$_POST['leg_ore'];
		//$news=(($_POST['leg_notizie']==1) ? 'true' : 'false');
		$news='false';
		if(($_POST['leg_notizie']==1))
			$news='true';
		//$meteo=(($_POST['leg_meteo']==1) ? 'true' : 'false');
		$meteo='false';
		if(($_POST['leg_meteo']==1))
			$meteo='true';
		//$borsa=(($_POST['leg_borsa']==1) ? 'true' : 'false');
		$borsa='false';
		if(($_POST['leg_borsa']==1))
			$borsa='true';
		
		$query="UPDATE db_impostazioni SET str_value='".$lingua."' where str_name='selected_lingua'";
		mysqli_query($link,$query);
		$query="UPDATE db_impostazioni SET str_value='".$mnotte."' where str_name='modalita_notte'";
		mysqli_query($link,$query);
		$query="UPDATE db_impostazioni SET str_value='".$inotte."' where str_name='inizio_notte'";
		mysqli_query($link,$query);
		$query="UPDATE db_impostazioni SET str_value='".$fnotte."' where str_name='fine_notte'";
		mysqli_query($link,$query);
		$query="UPDATE db_impostazioni SET str_value='".$muto."' where str_name='modalita_muto'";
		mysqli_query($link,$query);
		$query="UPDATE db_impostazioni SET str_value='".$ore."' where str_name='ora_ogni'";
		mysqli_query($link,$query);
		$query="UPDATE db_impostazioni SET str_value='".$news."' where str_name='lettura_notizie'";
		mysqli_query($link,$query);
		$query="UPDATE db_impostazioni SET str_value='".$meteo."' where str_name='lettura_meteo'";
		mysqli_query($link,$query);
		$query="UPDATE db_impostazioni SET str_value='".$borsa."' where str_name='lettura_borsa'";
		mysqli_query($link,$query);
		$msg='saved';
	}
	
	/* close connection */
	mysqli_close($link);
   echo $msg; 
    
?>