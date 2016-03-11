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
		<style>
		.ui-datepicker-prev span, .ui-datepicker-next span{
			
			 background-image: url(res/img/arow.png) !important;
		}
		</style>
        <script src="bootstrap-3.3.5-dist/js/bootstrap-datetimepicker.min.js"></script>
        <script>
        $(document).ready(function()
        {
        	$('#h,#hE,#hE2,#m,#mE,#mE2').focusout(function(){
            	if(this.value.length==1)
       				this.value='0'+this.value;
            })
         });
        </script>
		<style>
			#nomeEvento::-webkit-input-placeholder
			{
			  color:    white;
			}
			#nomeEvento:-moz-placeholder 
			{
			  color:    white;
			}
		</style>
		<script src="res/js/jquery-ui.min.js"></script>
		<link rel="stylesheet" href="res/css/calendar.css" type="text/css"/>
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
            	<button id="btnPlus" style="outline:none; z-index:3; position:absolute; bottom:0;right:0;  background:#8ce196; border:#8ce196;" type="button" class="btn btn-info btn-circle btn-xl"><i class="glyphicon glyphicon-plus"></i></button>
				<button id="btnEvents" title="Aggiungi Evento" style="outline:none; z-index:2;position:relative; background:#34cb46; border:#34cb46; border-radius:50%; width:70px; height:70px;" type="button" class="btn btn-info btn-circle btn-xl"><i class="
glyphicon glyphicon-calendar"></i></button>
                <button id="btnClock" title="Aggiungi Sveglia" style="outline:none; z-index:1;position:relative; background:#34cb46; border:#34cb46; border-radius:50%; width:70px; height:70px;margin-top:10px;" type="button" class="btn btn-info btn-circle btn-xl"><i class="glyphicon glyphicon-time"></i></button>
            </div>
        </div>
        <!--PopupSveglie-->
        
        	<div id="popupSveglie" style="position:absolute; height:100%; width:100%; background-color:rgba(128,128,128,0.39); display:none;">
            	<div style="position:relative; margin: 140 auto; height:400px; width:600px; background-color:white;">
                	<button id="closePopup" type="button" class="btn btn-warning btn-circle" style="outline:none; z-index: 2; position:absolute; margin-left:560px; margin-top:5px; background:red;"><i style="margin:0 auto;" class="glyphicon glyphicon-remove" ></i></button>
   					<div style="z-index:1; position:relative; width:100%; height:200px; background:#8ce196;">
                    
                    <input id="h" name="ora" type="number" min="0" max="24" maxlength="2" class="sveglia-picker" value="00" style="position:relative;height:150px; width:120px; text-color:white; margin-left:170px;margin-top:25px;font-size:100px;" />
                    <input id="m" name="minuti" type="number"  min="0" max="59" maxlength="2" class="sveglia-picker" value="00" style="position:relative;height:150px; width:120px; text-color:white; margin-left:20px;margin-top:25px;font-size:100px;" />
                    <button id="h+" onclick="incrementHour('h')" style="outline:none; position:absolute; margin-left:-220px; margin-top:5px; height:10px;width:30px;background-color:#8ce196;border:#8ce196"><i  class="glyphicon glyphicon-triangle-top" ></i></button>
                  	<button id="m+" onclick="incrementMinutes('m')" style="outline:none; position:absolute; margin-left:-80px; margin-top:5px; height:10px;width:30px;background-color:#8ce196;border:#8ce196"><i  class="glyphicon glyphicon-triangle-top" ></i></button>
                    <button id="h-" onclick="decreaseHour('h')" style="outline:none; position:absolute; margin-left:-220px; margin-top:180px; height:10px;width:30px;background-color:#8ce196;border:#8ce196"><i  class="glyphicon glyphicon-triangle-bottom" ></i></button>
                  	<button id="m-" onclick="decreaseMinutes('m')" style="outline:none; position:absolute; margin-left:-80px; margin-top:180px; height:10px;width:30px;background-color:#8ce196;border:#8ce196"><i  class="glyphicon glyphicon-triangle-bottom" ></i></button>
                    </div>
					<div style="position:relative; height:100px; width:100%; background:#8ce196;">
						<select name="combo" style="outline:none; position:absolute; height:40px; width:180px; margin-top:30px; margin-left:360px; border-radius:15px;">
							<?php
							//CODICE PHP PER METTERE NELLA COMBOBOX LE SUONERIE DEL DATABASE
								$myconn= new mysqli('localhost','root','','my_progettoleila') or die('Errore nel connettersi al server mySQL!');
								$query = "SELECT Titolo FROM db_suonerie_sveglie";
								$result = $myconn->query($query) or die('Errore nella query');
								$i=0;
								while($array = mysqli_fetch_array($result))
								{
									echo '<option value='.$i.'>'.$array[0].'</option>';
									$i++;
								}
							?>	
						</select>
						<input id="nomeSveglia" type="text" style="position:absolute; outline:none; height:40px; width:180px; margin-top:30px; margin-left:60px; border-radius:15px;" placeholder=" &nbsp&nbsp Nome sveglia">
					</div>
					<div  style="position:relative; height:100px; width:100%">
					<div id="divSett">
						<div id="lun" style="position:absolute;  height:50px;width:50px; border-radius:50%; margin-top:25px; margin-left:30px; background:#8ce196; border:#8ce196; padding:0;"  class="btn btn-info btn-circle btn-lg" ><span style="line-height:50px;"><strong>L</strong></span></div>
						<div id="mar" style="position:absolute;  height:50px;width:50px; border-radius:50%; margin-top:25px; margin-left:90px; background:#8ce196; border:#8ce196; padding:0;"  class="btn btn-info btn-circle btn-lg" ><span style="line-height:50px;"><strong>M</strong></span></div>
						<div id="mer"style="position:absolute;  height:50px;width:50px; border-radius:50%; margin-top:25px; margin-left:150px; background:#8ce196; border:#8ce196; padding:0;"  class="btn btn-info btn-circle btn-lg" ><span style="line-height:50px;"><strong>M</strong></span></div>
						<div id="gio" style="position:absolute;  height:50px;width:50px; border-radius:50%; margin-top:25px; margin-left:210px; background:#8ce196; border:#8ce196; padding:0;"  class="btn btn-info btn-circle btn-lg" ><span style="line-height:50px"><strong>G</strong></span></div>
						<div id="ven" style="position:absolute;  height:50px;width:50px; border-radius:50%; margin-top:25px; margin-left:270px; background:#8ce196; border:#8ce196; padding:0;"  class="btn btn-info btn-circle btn-lg" ><span style="line-height:50px"><strong>V</strong></span></div>
						<div id="sab" style="position:absolute;  height:50px;width:50px; border-radius:50%; margin-top:25px; margin-left:330px; background:#8ce196; border:#8ce196; padding:0;"  class="btn btn-info btn-circle btn-lg" ><span style="line-height:50px"><strong>S</strong></span></div>
						<div id="dom" style="position:absolute;  height:50px;width:50px; border-radius:50%; margin-top:25px; margin-left:390px; background:#8ce196; border:#8ce196; padding:0;"  class="btn btn-info btn-circle btn-lg" ><span style="line-height:50px"><strong>D</strong></span></div>
					</div>
						<div id="ok" style="background:#8ce196; border:#8ce196; position:relative; margin-left:495px; margin-top:15px; padding:0;"  class="btn btn-info btn-circle btn-xl"><i class="glyphicon glyphicon-ok" style="line-height:70px;"></i></div>
					</div>
					
               </div>
            </div>
        <!--PopupEventi-->
        
        	    <div id="popupEventi" style="position:absolute; height:100%; width:100%; background-color:rgba(128,128,128,0.39); display:none;">
					<div style="position:absolute; margin-left:97px;margin-top:50px; height:600px; width:1200px; background-color:white;">
						<button id="closePopup2" type="button" class="btn btn-warning btn-circle" style="outline:none; z-index: 2; position:absolute; margin-left:1160px; margin-top:5px; background:red;"><i style="margin:0 auto;" class="glyphicon glyphicon-remove" ></i></button>
						<div style="z-index:1; position:relative; width:100%; height:400px; background:white;">
							<input id="nomeEvento" type="text" placeholder=" &nbsp&nbsp Titolo Evento" style="background: #8ce196; position:absolute; outline:none; height:40px; width:180px; margin-top:20px; margin-left:510px; border-radius:15px;">
							<b style="position:absolute; color:#8ce196; margin-left:250px; margin-top:45px;">Inizio Evento</b>
							<!--calendarioInizio-->
							<div id="calendar" style="position:absolute; margin-left:120px; margin-top:80px;"></div>
							<script>
								$('#calendar').datepicker({
									inline: true,
									firstDay: 1,
									showOtherMonths: true,
									dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat']
								});
							</script>
							<b style="position:absolute; color:#8ce196; margin-left:844px; margin-top:45px;">Fine Evento</b>
							<!--calendarioFINE-->
							<div id="calendar2" style="position:absolute; margin-left:714px; margin-top:80px;"></div>
							<script>
								$('#calendar2').datepicker({
									inline: true,
									firstDay: 1,
									showOtherMonths: true,
									dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat']
								});
							</script>
						</div>
						<div style="background:#8ce196; height: 200px;">
						<div style="margin-left:0px;">
							<input id="hE" name="ora" type="number" min="0" max="24" maxlength="2" class="sveglia-picker" value="00" style="position:relative;height:150px; width:120px; text-color:white; margin-left:170px;margin-top:25px;font-size:100px;" />
							<input id="mE" name="minuti" type="number"  min="0" max="59" maxlength="2" class="sveglia-picker" value="00" style="position:relative;height:150px; width:120px; text-color:white; margin-left:20px;margin-top:25px;font-size:100px;" />
							<button id="h+E" onclick="incrementHour('hE')" style="outline:none; position:absolute; margin-left:-220px; margin-top:5px; height:10px;width:30px;background-color:#8ce196;border:#8ce196"><i  class="glyphicon glyphicon-triangle-top" ></i></button>
							<button id="m+E" onclick="incrementMinutes('mE')" style="outline:none; position:absolute; margin-left:-80px; margin-top:5px; height:10px;width:30px;background-color:#8ce196;border:#8ce196"><i  class="glyphicon glyphicon-triangle-top" ></i></button>
							<button id="h-E" onclick="decreaseHour('hE')" style="outline:none; position:absolute; margin-left:-220px; margin-top:180px; height:10px;width:30px;background-color:#8ce196;border:#8ce196"><i  class="glyphicon glyphicon-triangle-bottom" ></i></button>
							<button id="m-E" onclick="decreaseMinutes('mE')" style="outline:none; position:absolute; margin-left:-80px; margin-top:180px; height:10px;width:30px;background-color:#8ce196;border:#8ce196"><i  class="glyphicon glyphicon-triangle-bottom" ></i></button>						
						</div>

						<select name="comboE" style="outline:none; position:absolute; height:40px; width:180px; margin-top:-150px; margin-left:510px; border-radius:15px;">
							<?php
							//CODICE PHP PER METTERE NELLA COMBOBOX LE SUONERIE DEL DATABASE
								$myconn= new mysqli('localhost','root','','my_progettoleila') or die('Errore nel connettersi al server mySQL!');
								$query = "SELECT Titolo FROM db_suonerie_sveglie";
								$result = $myconn->query($query) or die('Errore nella query');
								$i=0;
								while($array = mysqli_fetch_array($result))
								{
									echo '<option value='.$i.'>'.$array[0].'</option>';
									$i++;
								}
							?>	
						</select>						
						<button id="okE" style="outline:none; background:#2aa238; border:#2aa238; position:absolute; margin-left:565px; margin-top:-90px; padding:0;"  class="btn btn-info btn-circle btn-xl"><i class="glyphicon glyphicon-ok" style="line-height:70px;"></i></button>
						<div style="margin-left:590px; margin-top:-175px;">
							<input id="hE2" name="ora" type="number" min="0" max="24" maxlength="2" class="sveglia-picker" value="00" style="position:relative;height:150px; width:120px; text-color:white; margin-left:170px;margin-top:25px;font-size:100px;" />
							<input id="mE2" name="minuti" type="number"  min="0" max="59" maxlength="2" class="sveglia-picker" value="00" style="position:relative;height:150px; width:120px; text-color:white; margin-left:20px;margin-top:25px;font-size:100px;" />
							<button id="h+E2" onclick="incrementHour('hE2')" style="outline:none; position:absolute; margin-left:-220px; margin-top:5px; height:10px;width:30px;background-color:#8ce196;border:#8ce196"><i  class="glyphicon glyphicon-triangle-top" ></i></button>
							<button id="m+E2" onclick="incrementMinutes('mE2')" style="outline:none; position:absolute; margin-left:-80px; margin-top:5px; height:10px;width:30px;background-color:#8ce196;border:#8ce196"><i  class="glyphicon glyphicon-triangle-top" ></i></button>
							<button id="h-E2" onclick="decreaseHour('hE2')" style="outline:none; position:absolute; margin-left:-220px; margin-top:180px; height:10px;width:30px;background-color:#8ce196;border:#8ce196"><i  class="glyphicon glyphicon-triangle-bottom" ></i></button>
							<button id="m-E2" onclick="decreaseMinutes('mE2')" style="outline:none; position:absolute; margin-left:-80px; margin-top:180px; height:10px;width:30px;background-color:#8ce196;border:#8ce196"><i  class="glyphicon glyphicon-triangle-bottom" ></i></button>						
						</div>
						</div>
					</div>
				</div>
 		<script>
        	$("#h,#hE,#hE2").on("keydown",function(e) {
            	if(e.keyCode==8||e.keyCode==38||e.keyCode==40){
                	return true;
                }
    			if ((e.keyCode >= 48 && e.keyCode <= 57) || (e.keyCode >= 96 && e.keyCode <= 105)) { //0-9 only {
        			
                    var value=$(this).val().toString();
                    if(value.length==2)
                    	return false;
                   	if(value==''&&((e.keyCode<58&&e.keyCode>50)||e.keyCode>98))
                    	return false;
                   	if(value[0]=='2'){
                    	if((e.keyCode<58&&e.keyCode>51)||e.keyCode>99)
                        	return false;
                            }
  				  }
                  else{
                  	return false;
                  }
				});
                $("#m,#mE,#mE2").on("keydown",function(e) {
            	if(e.keyCode==8||e.keyCode==38||e.keyCode==40){
                	return true;
                }
    			if ((e.keyCode >= 48 && e.keyCode <= 57) || (e.keyCode >= 96 && e.keyCode <= 105)) { //0-9 only {
        			
                    var value=$(this).val().toString();
                    if(value.length==2)
                    	return false;
                   	if(value==''&&((e.keyCode<58&&e.keyCode>53)||e.keyCode>101))
                    	return false;
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
		<script src="res/js/clock.js"></script>
		<script>
			$("#divSett").children('div').on('click',function() {
					if($(this).css('background')=="rgb(42, 162, 56) none repeat scroll 0% 0% / auto padding-box border-box")
					
						$(this).css('background','#8ce196');
					
					else
						$(this).css('background','#2aa238');
					
			});


		</script>
		<script>
		function incrementHour(id)
		{
			var value = parseInt(document.getElementById(id).value, 10);
			if(value<23)
			{
			value = isNaN(value) ? 0 : value;
			if(document.getElementById(id).value<9)
			{
			value++;
			document.getElementById(id).value = '0'+value;
			}
			else{
				value++;
			document.getElementById(id).value = value;
			}	
			}
		}
		function incrementMinutes(id)
		{
			var value = parseInt(document.getElementById(id).value, 10);
			if(value<59)
			{
			value = isNaN(value) ? 0 : value;
			if(document.getElementById(id).value<9)
			{
			value++;
			document.getElementById(id).value = '0'+value;
			}
			else{
				value++;
			document.getElementById(id).value = value;
			}
			}
		}
		function decreaseHour(id)
		{
			var value = parseInt(document.getElementById(id).value, 10);
			if(value>0)
			{
			value = isNaN(value) ? 0 : value;
			if(document.getElementById(id).value<=10)
			{
			value--;
			document.getElementById(id).value = '0'+value;
			}
			else{
				value--;
			document.getElementById(id).value = value;
			}
			}
		}
		function decreaseMinutes(id)
		{
			var value = parseInt(document.getElementById(id).value, 10);
			if(value>0)
			{
			value = isNaN(value) ? 0 : value;
			if(document.getElementById(id).value<=10)
			{
			value--;
			document.getElementById(id).value = '0'+value;
			}
			else{
				value--;
			document.getElementById(id).value = value;
			}
			}
		}
		
		</script>
		<script>
			$("#ok").click(function(){
				var form=new FormData();
				form.append("hour",$("#h").val());
				form.append("minutes",$("#m").val());
				form.append("suonerie",$("[name=combo]").val());
				var str;
				var lun='0';
				var mar='0';
				var mer='0';
				var gio='0';
				var ven='0';
				var sab='0';
				var dom='0';
				if($("#lun").css('background')=="rgb(42, 162, 56) none repeat scroll 0% 0% / auto padding-box border-box")
					lun='1';
				if($("#mar").css('background')=="rgb(42, 162, 56) none repeat scroll 0% 0% / auto padding-box border-box")
					mar='1';
				if($("#mer").css('background')=="rgb(42, 162, 56) none repeat scroll 0% 0% / auto padding-box border-box")
					mer='1';
				if($("#gio").css('background')=="rgb(42, 162, 56) none repeat scroll 0% 0% / auto padding-box border-box")
					gio='1';
				if($("#ven").css('background')=="rgb(42, 162, 56) none repeat scroll 0% 0% / auto padding-box border-box")
					ven='1';
				if($("#sab").css('background')=="rgb(42, 162, 56) none repeat scroll 0% 0% / auto padding-box border-box")
					sab='1';
				if($("#dom").css('background')=="rgb(42, 162, 56) none repeat scroll 0% 0% / auto padding-box border-box")
					dom='1';
				str=lun+mar+mer+gio+ven+sab+dom;
				form.append("giorno",str);
				form.append("nome",$("#nomeSveglia").val());
				//CHIAMATA AJAX PER SCRIVERE SU DATABASE SVEGLIE
				$.ajax({
				  type: "post",
				  url: "res/php/addSveglia.php",
				  data: form,
				   processData: false,  // tell jQuery not to process the data
					contentType: false,  // tell jQuery not to set contentType
				  success: function(data){	  
				  }
				});
			});
				
			$("#okE").click(function(){
				
				//alert($("#calendar").val());
				var titolo=$("#nomeEvento").val();
				var dataInizio=$("#calendar").val().split("/");
				var dataSQLInizio=dataInizio[2]+'-'+dataInizio[0]+'-'+dataInizio[1];
				var dataFine=$("#calendar2").val().split("/");
				var dataSQLFine=dataFine[2]+'-'+dataFine[0]+'-'+dataFine[1];
				var oraInizio=$("#hE").val();
				var minutoInizio=$("#mE").val();
				var oraFine=$("#hE2").val();
				var minutoFine=$("#mE2").val();
				var suoneria=$("[name=comboE]").val();
				var form=new FormData();
				form.append("nome",titolo);
				form.append("dataInizio",dataSQLInizio);
				form.append("dataFine",dataSQLFine);
				form.append("oraInizio",oraInizio);
				form.append("minutoInizio",minutoInizio);
				form.append("oraFine",oraFine);
				form.append("minutoFine",minutoFine);
				form.append("suoneria",suoneria);
				$.ajax({
				  type: "post",
				  url: "res/php/addEvento.php",
				  data: form,
				   processData: false,  // tell jQuery not to process the data
					contentType: false,  // tell jQuery not to set contentType
				  success: function(data){	  
				  }
				});
			});

		</script>
	</body>
</html>