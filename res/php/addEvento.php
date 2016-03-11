<?php
	foreach($_POST as $p)
	{
		if(!(isset($p)&&$p!=""))
			die("Errore!");	
	}
	$nome=$_POST["nome"];
	$dataInizio=$_POST["dataInizio"];
	$dataFine=$_POST["dataFine"];
	$oraInizio=$_POST["oraInizio"];
	$minutoInizio=$_POST["minutoInizio"];
	$oraFine=$_POST["oraFine"];
	$minutoFine=$_POST["minutoFine"];
	$suoneria=$_POST["suoneria"];
	$mysqli= new mysqli('localhost','root','','my_progettoleila') or die('Errore nel connettersi al server mySQL!');
	$query = "INSERT INTO db_eventi (IDEvento,nomeEvento,dataInizio, dataFine, oraInizio, minutoInizio, oraFine, minutoFine, Suoneria) VALUES (null,'$nome','$dataInizio','$dataFine',$oraInizio,$minutoInizio,$oraFine,$minutoFine,$suoneria)";
	$result=$mysqli->query($query);
	echo "Evento inserito correttamente!";
	?>