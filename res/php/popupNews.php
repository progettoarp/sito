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
	$action=$_POST['action'];
	$ord=$_POST['idNews'];
	if($action=="get")
	{
		$query="select db_notizie_scelte.numero,db_notizie_scelte.Ordine,db_notizie_source.fonte,db_notizie_source.link,db_notizie_source.categoria from db_notizie_scelte INNER JOIN db_notizie_source ON (db_notizie_scelte.idNews=db_notizie_source.id) where db_notizie_scelte.ordine=".$ord;
		$result= mysqli_query($link,$query);
		$row = mysqli_fetch_array($result, MYSQLI_BOTH);
		$msg='
				<center>
					<h2>'.$row["fonte"].'</h2>
				</center>
					<div class="container" style="width:100%">
					<p class="element-popup"><strong>Numero notizie da leggere</strong></p>
					<input id="popup-numero" style="width:50%" type="number" min=1 max=5 class="form-control"value="'.$row["numero"].'"/>
					<p class="element-popup"><strong>Categoria</strong></p>
					<input id="popup-categoria" style="width:50%" type="text" class="form-control" value="'.$row["categoria"].'"/>
					<p class="element-popup"><strong>Link</strong></p>
					<input id="popup-link" style="width:50%" type="text" class="form-control" value="'.$row["link"].'"/>
					<button id="mod-news" type="button" class="btn btn-default" STYLE="margin-top:30px">Modifica Fonte</button>
					</div>
		';
		
		/* free result set */
		mysqli_free_result($result);
	}
	else
	{
		//update
		$cat=$_POST['categoria'];
		$num=$_POST['num'];
		$lin=$_POST['link'];
		$query="select idNews from db_notizie_scelte where ordine=".$ord;
		$result= mysqli_query($link,$query);
		$row = mysqli_fetch_array($result, MYSQLI_BOTH);
		$idNews=$row['idNews'];
		mysqli_free_result($result);
		//query di update
		$query="UPDATE db_notizie_scelte SET numero=".$num." where idNews=".$idNews;
		mysqli_query($link,$query);
		$query="UPDATE db_notizie_source SET categoria=".$cat." link=".$lin." where id=".$idNews;
		mysqli_query($link,$query);	
		$msg='saved'; 
	}
	/* close connection */
	mysqli_close($link);
   echo $msg; 
    
?>