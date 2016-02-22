<?php

	$mysqli= new mysqli('localhost','root','','my_progettoleila') or die('Errore nel connettersi al server mySQL!');
	//mysql_select_db('my_progettoleila', $myconn) or die('Errore nel connettersi al database!');
	//variabili
	if(isset($_POST["hour"])&&isset($_POST["minutes"])&&isset($_POST["suonerie"])&&isset($_POST["giorno"]))
	{
		
		$ora=$_POST["hour"];
		$minuti=$_POST["minutes"];
		$suono=$_POST["suonerie"];
		$day=$_POST["giorno"];
		$nome=$_POST["nome"];

		$query = "INSERT INTO db_sveglie (IDSveglia,Ora, Minuti, Giorno, Suoneria, Nome) VALUES (null,$ora,$minuti,'$day',$suono,'$nome')";
		$result=$mysqli->query($query);
		echo "Sveglia inserita correttamente!";
		
	}
?>