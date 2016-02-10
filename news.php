<html>
	<head>
		<title>Home - Leila</title>
        <link href="res/css/temp-luca.css" rel="stylesheet" type="text/css">
        <link href="res/css/sveglie.css" rel="stylesheet" type="text/css"/> 
        <meta name="viewport" content="width=1349">
		<?php
			include("functions.php");
			getResource();
		?>
        <script>
        	var timer=setInterval(changeWeather, 5000);
            var numItems;
            var current=1;
            function changeWeather(){
            	if(current==numItems)
                	current=1;
            	else
                	current++;
           		$('.forecast-switcher').each(function(){$(this).removeClass('forecast-selected');});
                $('#'+current).addClass('forecast-selected');
                $('.forecast').each(function(){$(this).css({display:'none'});});
                $('#'+current+'-forecast').css({display:'block'});
            };
            
            $( document ).ready(function() {
            	numItems = $('.forecast-switcher').length;
              $('#1').addClass('forecast-selected');
              $('.location').each(function(){
              if($(this).text().length>15){
                var calc=((390/$(this).text().length));
                $(this).css({'font-size':(calc+'px')});
                }
              });
            });
            
        	function loadWeather(i){
          clearInterval(timer);
          timer=setInterval(changeWeather,5000);
            	//$('#'+i+'-forecast').addClass('forecast-selected');
                $('.forecast-switcher').each(function(){$(this).removeClass('forecast-selected');});
                $('#'+i).addClass('forecast-selected');
                $('.forecast').each(function(){$(this).css({display:'none'});});
                $('#'+i+'-forecast').css({display:'block'});
                current=i;
            }
        </script>
	</head>
	<body style="width: 1349px;max-width:1349px">
		<?php			
			getMenu();
		?>
        <div class="main">
			<div id="news-container">
            <h2 class="page-title">Notizie</h2>
            <?php 
              $mysqli = new mysqli("localhost", "root", "", "my_progettoleila");
              $result= mysqli_query($mysqli,"select * from db_notizie_source a, db_notizie_aggiornate b where a.id in (b.idSource) order by ordine asc,date desc");
              $source=0;
              while($r=mysqli_fetch_array($result)){
              	if($source!=$r['idSource']){
                	echo '<h4 class="category">'.$r['nome'].' - '.$r['fonte'].'</h4>';
                	$source=$r['idSource'];
                }
 				echo'<div class="news"><a href="'.$r['link'].'" target="_blank" style="width:100%;display:flex;color:#333333;text-decoration:none;">
                	<div style="width:80%;height:100%;">
                		<p class="news-title">'.($r['title']).'</p>
                		<p class="news-desc">'.($r['desc']).'</p>
                        </div>
                    <div class="news-img" style="background-image:url('.$r['img'].')"></div>
                     </a></div>';
  			  }                              
                ?>
            </div>
            <div id="forecast-container">
            <div id="clock">
            	 <article class="clock simple" style="background:#EdEdEd url(./res/img/clock-1.svg) no-repeat center;box-shadow: 0 1px 1px #B8B8B8;background-size:100%;width: 15em;height:15em;margin:10px auto;">
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
            
                        <?php
                        	$mysqli = new mysqli("localhost", "root", "", "my_progettoleila");
                            $result= mysqli_query($mysqli,"select * from db_meteo_previsioni a, db_meteo_scelte b where a.idCitta in (b.id)");
                            $n=0;
                            while($r=mysqli_fetch_array($result)){
                            	$n++;
                            	echo '<div id="'.$n.'-forecast" class="forecast" style="'.(($n!=1)?'display:none;':'').'">
                                        <div id="weather_wrapper">
                                        <div style="height:40px;background:#7ED088;width:100%"><p class="location" style="line-height:40px">'.utf8_encode($r['citta']).'</p></div>
                                            <div class="weatherCard">
                                                <div class="currentTemp"><span class="temp">'.$r['day1_max'].'°</span>
                                                </div>
                                                <div class="currentWeather">
                                                    <span class="conditions"><i class="wi '.$r['day1_icon'].'" style=" font-size: 60px;"></i></span>
                                                    <div class="info">
                                                        <span class="w-rain" style="font-size: 13px;">'.$r['day1_rain'].' %</span>
                                                        <span class="wind" style="font-size: 13px;">'.$r['day1_wind'].' KM/H</span>
                                                    </div>
                                                </div>
                                                 </div>
                                            <div class="griglia_giorni">
                                                <div class="giorno1">'.$r['day2'].' <i class="wi '.$r['day2_icon'].'"></i></div>
                                                <div class="giorno2">'.$r['day3'].' <i class="wi '.$r['day3_icon'].'"></i></div>
                                                <div class="giorno3">'.$r['day4'].' <i class="wi '.$r['day4_icon'].'"></i></div>
                                            </div>
                                         </div>
                                     </div>';
                            }
                            echo '<div style="height:30px;width:100%;"><div style="margin:0 auto;display:flex;width:'.(20*$n).'px">';
                            for($i=0;$i<$n;$i++)
                        		echo '<p id="'.($i+1).'" class="forecast-switcher" style="height:13px;width:13px;border-radius:50%" onclick="loadWeather('.($i+1).')"></p>';
                        	echo '</div></div>';
                        ?>
                        
                   
                             
            
            </div>
		</div>
	<script src="res/js/clock.js"></script>
    </body>
</html>