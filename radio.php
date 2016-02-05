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
  <h2 class="page-title">Notizie</h2> 
<div id="container">
<?php
                        	$mysqli = new mysqli("localhost", "root", "", "my_progettoleila");
                            $result= mysqli_query($mysqli,"select * from db_radio_source ");
                            while($r=mysqli_fetch_array($result)){
                            echo '<div class="radio-item" style="background-image:url('.$r['source_icon'].')"></div>';
                            }
?>
	
			</div>
            </div>
		<div class="barra">
        <div class=radioscelta style="background-image:url('res/img/img-radio/rr1.png ')">
        </div>
        <div class="plpast">
     <img src="res\img\img-radio\plpast.png" style="width: 100%;"/>
		</div>
        </div>
        </div>
	</body>
</html>
