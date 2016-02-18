<html>
<link href="./res/css/temp-riva.css" rel="stylesheet" type="text/css">
	<head>
		<title>LE TUE RADIO</title>
		<?php
			include("functions.php");
			getResource();
		?>

	</head>
	<body>
		<?php			
			getMenu();
		?>
        <div class="main" style="display:block !important;">
  <div class="radio-container">
  <h2 class="page-title">Le tue radio</h2> 
<div id="container">

<?php
                        	
							$mysqli = new mysqli("localhost", "root", "", "my_progettoleila");
                            $result= mysqli_query($mysqli,"select * from db_radio_source ");
                            while($r=mysqli_fetch_array($result)){

                            echo '<div class="radio-item-container" onclick="play(\''.$r['source_icon'].'\',\''.$r['nome'].'\')"'.'><div class="radio-item" style="background-image:url('.$r['source_icon'].')"></div><p style="width: 101px;height: 30px;text-align: center; font-family: cursive;">'.$r['nome'].'</p></div>';


							
							}
?>

</table>	
			</div>
            </div>
		<div class="barra">
        <div class=radioscelta style="background-image:url('res/img/img-radio/rr1.png ')">
        </div>
		<center>
		<p id=nomeradio> </p>
		</center>
        <div class="plpast"  style="background-image:url('res/img/img-radio/playernero.png')" onclick="pausa1()">

		</div>
        </div>
        </div>
		<script>
		function play(source_icon,nomeradio)
							{
							$('.plpast').css("background-image", "url('res/img/img-radio/pausanero.png')");  
							$('.radioscelta').css("background-image", "url("+source_icon+")" );
							$('#nomeradio').html(nomeradio);
							$('.barra').css("display","flex");
							$('.radio-container').css("height","calc(100% - 125px)");
							}
		</script>
		<script>
		function pausa1()
							{
							$('.plpast').css("background-image", "url('res/img/img-radio/playernero.png')");  
							
							}
		</script>
	</body>
</html>
