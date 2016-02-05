<html>
	<head>
		<title>Sveglie - Leila</title>
		<?php
			include("functions.php");
			getResource();
		?>
        <link href="res/css/sveglie.css" rel="stylesheet" type="text/css">
        <link href="bootstrap-3.3.5-dist/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css">
		<script src="res/js/jquery-2.2.0.min.js"></script>
        <script src="bootstrap-3.3.5-dist/js/bootstrap-datetimepicker.min.js"></script>
        
	</head>
	<body>
		<?php			
			getMenu();
		?>
        <div class="main">
			<div style="position:relative; height:300px; width:100%; background:#8ce196;">
						<article style="position:relative; margin:10 auto; " class="clock">
                          <div class="hours-container">
                            <div class="hours"></div>
                          </div>
                          <div class="minutes-container">
                            <div class="minutes"></div>
                          </div>
                          <div class="seconds-container">
                            <div class="seconds"></div>
                          </div>
                        </article>
          	</div>
            <div id="openPopup" style="overflow:hidden; position:fixed; bottom:25; right:25;   border:#8ce196; border-bottom-left-radius:35px; border-bottom-right-radius:35px;">
            	<button id="btnPlus" style=" z-index:3; position:absolute; bottom:0;right:0;  background:#8ce196; border:#8ce196;" type="button" class="btn btn-info btn-circle btn-xl"><i class="glyphicon glyphicon-plus"></i></button>
				<button id="btnEvents" title="Aggiungi Evento" style="z-index:2;position:relative; background:#34cb46; border:#34cb46; border-radius:50%; width:70px; height:70px;" type="button" class="btn btn-info btn-circle btn-xl"><i class="
glyphicon glyphicon-calendar"></i></button>
                <button id="btnClock" title="Aggiungi Sveglia" style="z-index:1;position:relative; background:#34cb46; border:#34cb46; border-radius:50%; width:70px; height:70px;margin-top:10px;" type="button" class="btn btn-info btn-circle btn-xl"><i class="glyphicon glyphicon-time"></i></button>
            </div>
        </div>
        <!--PopupSveglie-->
        
        	<div id="popupSveglie" style="position:absolute; height:100%; width:100%; background-color:rgba(128,128,128,0.39); display:none;">
            	<div style="position:relative; margin: 190 auto; height:300px; width:600px; background-color:white;">
                	<button id="closePopup" type="button" class="btn btn-warning btn-circle" style="z-index: 2; position:absolute; margin-left:560px; margin-top:5px; background:red;"><i style="margin:0 auto;" class="glyphicon glyphicon-remove" ></i></button>
   					<div style="z-index:1; position:relative; width:100%; height:200px; background:#8ce196;">
                    
                    <input id="h" onkeyup=""  type="number" min="0" max="24" maxlength="2" class="sveglia-picker" value="00" style="position:relative;height:150px; width:120px; text-color:white; margin-left:170px;margin-top:25px;font-size:100px;" />
                    <input type="number"  min="0" max="59" maxlength="2" class="sveglia-picker" value="00" style="position:relative;height:150px; width:120px; text-color:white; margin-left:20px;margin-top:25px;font-size:100px;" />
                    <button id="h+" style="position:absolute; margin-left:-220px; margin-top:5px; height:10px;width:30px;background-color:#8ce196;border:#8ce196"><i  class="glyphicon glyphicon-triangle-top" ></i></button>
                  	<button id="h-" style="position:absolute; margin-left:-80px; margin-top:5px; height:10px;width:30px;background-color:#8ce196;border:#8ce196"><i  class="glyphicon glyphicon-triangle-top" ></i></button>
                    <button id="m+" style="position:absolute; margin-left:-220px; margin-top:180px; height:10px;width:30px;background-color:#8ce196;border:#8ce196"><i  class="glyphicon glyphicon-triangle-bottom" ></i></button>
                  	<button id="m-" style="position:absolute; margin-left:-80px; margin-top:180px; height:10px;width:30px;background-color:#8ce196;border:#8ce196"><i  class="glyphicon glyphicon-triangle-bottom" ></i></button>
                    </div>
               </div>
            </div>
        <!--PopupEventi-->
        
        	<div id="popupEventi" style="position:absolute; height:100%; width:100%; background-color:rgba(128,128,128,0.39); display:none;">
            	<div style="position:relative; margin: 190 auto; height:300px; width:600px; background-color:white;">
                	<button id="closePopup2" type="button" class="btn btn-warning btn-circle" style="position:relative; margin-left:560px; margin-top:5px; background:red;"><i style="margin:0 auto;" class="glyphicon glyphicon-remove" ></i></button>
               </div>
            </div> 
 		<script>
        	$("#h").on("keydown",function(e) {
            	if(e.keyCode==8||e.keyCode==38||e.keyCode==40){
                	return true;
                }
    			if ((e.keyCode >= 48 && e.keyCode <= 57) || (e.keyCode >= 96 && e.keyCode <= 105)) { //0-9 only {
        			
                    var value=$("#h").val().toString();
                    if(value.length==2)
                    	return false;
                   if(value[0]=='2'){
                    	if(e.keyCode>100||e.keyCode>52)
                        	return false;
                            }
  				  }
                  else{
                  	return false;
                  }
				});
        </script>
       <script>
        $("#btnClock").click(function () {
        $("#popupSveglie").show();
      	});
		</script>
       <script>
        $("#closePopup").click(function () {
        $("#popupSveglie").hide();
      	});
		</script>
               <script>
        $("#btnEvents").click(function () {
        $("#popupEventi").show();
      	});
		</script>
       <script>
        $("#closePopup2").click(function () {
        $("#popupEventi").hide();
      	});
		</script>
		<script src="../res/js/clock.js"></script>

	</body>
</html>