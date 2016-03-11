<html>
<head>
<title>Impostazioni - Leila</title>
  <script src="res/js/jquery-2.2.0.min.js"></script> 

  <script src="res/js/impostazioni.js"></script>
  <?php
			include("functions.php");
			getResource();
	?>
<<<<<<< HEAD
	
	<link href="res/css/css_impostazioni.css" rel="stylesheet"/>
    <script src="res/js/jquery-ui.min.js"></script>  
=======
	<link href="res/css/css_impostazioni.css" rel="stylesheet"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>  

>>>>>>> 1e384caa1e147157a35b6a906c16be3ae7452a67
    <!-- select-->
    <link href="res/css/bootstrap-select.min.css" rel="stylesheet"/>
		<script src="res/js/bootstrap-select.min.js"> </script>
		
		<script type="text/javascript">
        $(document).ready(function() {
			
              $('.selectpicker').selectpicker({
                style: 'form-control',
                size: 4
              });
            //Helper function to keep table row from collapsing when being sorted
            var fixHelperModified = function(e, tr) {
                var $originals = tr.children();
                var $helper = tr.clone();
                $helper.children().each(function(index)
                {
                  $(this).width($originals.eq(index).width())
                });
                return $helper;
            };
            //Make diagnosis table sortable
            $("#diagnosis_list tbody").sortable({
                helper: fixHelperModified,
                stop: function(event,ui) {renumber_table('#diagnosis_list')}
            }).disableSelection();
            //Delete button in table rows
            $('table').on('click','.btn-delete',function() {
                tableID = '#' + $(this).closest('table').attr('id');
                r = confirm('Eliminare la fonte?');
                if(r) {
                    $(this).closest('tr').remove();
                    renumber_table(tableID);
                    }
            });
        //Renumber table rows
        function renumber_table(tableID) {
            $(tableID + " tr").each(function() {
                count = $(this).parent().children().index($(this)) + 1;
                $(this).find('.priority').html(count);
            });
        }    	
            //Make diagnosis table sortable
            $("#localita_list tbody").sortable({
                helper: fixHelperModified,
                stop: function(event,ui) {renumber_table('#localita_list')}
            }).disableSelection();
            //Delete button in table rows
            $('table').on('click','.btn-delete',function() {
                tableID = '#' + $(this).closest('table').attr('id');
                r = confirm('Eliminare la località?');
                if(r) {
                    $(this).closest('tr').remove();
                    renumber_table(tableID);
                    }
            });
			$('#citta-cerca').keyup(function(e){
				if($(this).val()=="")
					$("#a-meteo").addClass("btn-not-active");
				else
					$("#a-meteo").removeClass("btn-not-active");
					
				$.post( "./res/php/city-autocomplete.php", { citta: $(this).val() })
				  .done(function( data ) {
					$('#citta-trovate').html(data);
				  });
			});
			
			
         });
    </script>
    
</head>
<body style="">
	<?php			
		getMenu();
	?>
<div class="main">
	<div class="container" style="width:100%; padding-left:25px;padding-right:25px;">
		<div id="title">
		<h1 id="title_text">Impostazioni</h1>
		<img id="title_icon" src="res/img/settings_title.ico"/>
		</div>
		<h4><small>Per modificare le impostazioni clicca sulla freccia del pannello desiderato.</small></h4>
		<div class="panel panel-default" style="margin-top: 25px;">
			<ul class="list-group">
				<li class="list-group-item">
					<div class="row toggle" id="dropdown-detail-1" data-toggle="detail-1">
						<div class="col-xs-10 section-title">
							Generali
						</div>
						<div class="col-xs-2"><i class="fa fa-chevron-down pull-right"><img class="rotation" src="res/img/arrow_down.png"/></i></div>
					</div>
					<div id="detail-1">
						<hr>
						<div class="container container-sub">
							<div class="fluid-row">
								<div id="lingua" class="section-element">
									<div class="section-sub">Lingua: <p id="lingua-sel">Italiano<p></div>
									<div id="flag-container">
									<img lingua="it" src="res/img/italiano.png" class="flag flag-selected"/>
									<img lingua="en" src="res/img/inglese.png" class="flag"/>
									<img lingua="es" src="res/img/spagnolo.png" class="flag"/>
									<img lingua="td" src="res/img/tedesco.png" class="flag"/>
									</div>
								</div>
								<div class="spacer"></div>
								<div id="notturna" class="section-element">
                                    <div class="section-sub" >Modalità Notturna</div>
                                    <div class="row" style="display: flex;margin:0 0 0 0;">
									  <div class="switch">
										<input id="cmn-toggle-1" class="cmn-toggle cmn-toggle-round" type="checkbox">
										<label for="cmn-toggle-1"></label>
									  </div>
									</div>
                                 </div>
                                 <div class="section-element">
                                    <div id="container-inizio" class="section-sub" style="margin-left:3%;width:57%">Orario inizio modalità:
                                    </div>
                                    <div id="inizio-notte" >
                                      <input type="time" class="form-control">
                                      </div>
                                   </div>
                                   <div class="section-element">
                                    <div id="container-fine" class="section-sub" style="margin-left:3%;width:57%">Orario fine modalità:
                                    </div>
                                        <div id="fine-notte">
                                          <input type="time" class="form-control">
                                      </div>
                                </div>
							</div>
                            <div class="spacer"></div>
                            <div id="muto" class="section-element">
                                    <div class="section-sub" >Modalità Muto</div>
                                    <div class="row" style="display: flex;margin:0 0 0 0;">
									  <div class="switch">
										<input id="cmn-toggle-2" class="cmn-toggle cmn-toggle-round" type="checkbox">
										<label for="cmn-toggle-2"></label>
									  </div>
									</div>
                            </div>
                            <div class="spacer"></div>
                            <div id="lettura-ore" class="section-element">
                                    <div id="container-intervallo-ore" class="section-sub">Leggi ore ogni:
                                    </div>
                                    <div id="intervallo-ore" >
                                      <select class="form-control">
                                        <option value="1">30 minuti</option>
                                        <option value="2">1 ora</option>
                                        <option value="3">2 ore</option>
                                        <option value="4">Mai</option>
                                      </select>
                                    </div>
                            </div>
                            <div class="spacer"></div>
                            
                            <div id="abilita-notizie" class="section-element">
                                  <div class="section-sub" >Lettura Notizie</div>
                                  <div class="row" style="display: flex;margin:0 0 0 0;">
                                    <?php
                                   	$mysqli = new mysqli("localhost", "root", "", "my_progettoleila");
                            		$result= mysqli_query($mysqli,"select * from db_impostazioni where str_name='lettura_notizie'");
                                      $r=mysqli_fetch_array($result);
                                      if($r['str_value']=='true')
                                      { echo '<div class="switch">
                                          <input id="cmn-toggle-notizie-1" class="cmn-toggle cmn-toggle-round" type="checkbox" checked>
                                          <label for="cmn-toggle-notizie-1"></label>
                                      </div>';
                                      }
                                      else
                                      {
                                      	echo '<div class="switch">
                                          	<input id="cmn-toggle-notizie-1" class="cmn-toggle cmn-toggle-round" type="checkbox">
                                          	<label for="cmn-toggle-notizie-1"></label>
                                      		</div>';
                                      }
                                      ?>
                                 </div>
                              </div>
                                <div class="spacer"></div>
                                <div id="abilita-meteo" class="section-element">
                                  <div class="section-sub" >Lettura Meteo</div>
                                  <div class="row" style="display: flex; margin:0 0 0 0;">
                                    <?php
                                   	$mysqli = new mysqli("localhost", "root", "", "my_progettoleila");
                            		$result= mysqli_query($mysqli,"select * from db_impostazioni where str_name='lettura_notizie'");
                                      $r=mysqli_fetch_array($result);
                                      if($r['str_value']=='true')
                                      { echo '<div class="switch">
                                          <input id="cmn-toggle-meteo-1" class="cmn-toggle cmn-toggle-round" type="checkbox" checked>
                                          <label for="cmn-toggle-meteo-1"></label>
                                      </div>';
                                      }
                                      else
                                      {
                                      	echo '<div class="switch">
                                          	<input id="cmn-toggle-meteo-1" class="cmn-toggle cmn-toggle-round" type="checkbox">
                                          	<label for="cmn-toggle-meteo-1"></label>
                                      		</div>';
                                      }
                                      ?>
                                 </div>
                              </div>
                              <div class="spacer"></div>
<<<<<<< HEAD
=======
                            <div id="abilita-borsa" class="section-element">
                                  <div class="section-sub" >Lettura Notizie</div>
                                  <div class="row" style="display: flex;margin:0 0 0 0;">
                                    <?php
                                   	$mysqli = new mysqli("localhost", "root", "", "my_progettoleila");
                            		$result= mysqli_query($mysqli,"select * from db_impostazioni where str_name='lettura_notizie'");
                                      $r=mysqli_fetch_array($result);
                                      if($r['str_value']=='true')
                                      { echo '<div class="switch">
                                          <input id="cmn-toggle-borsa-1" class="cmn-toggle cmn-toggle-round" type="checkbox" checked>
                                          <label for="cmn-toggle-borsa-1"></label>
                                      </div>';
                                      }
                                      else
                                      {
                                      	echo '<div class="switch">
                                          	<input id="cmn-toggle-borsa-1" class="cmn-toggle cmn-toggle-round" type="checkbox">
                                          	<label for="cmn-toggle-borsa-1"></label>
                                      		</div>';
                                      }
                                      ?>
                                 </div>
                              </div>
>>>>>>> 1e384caa1e147157a35b6a906c16be3ae7452a67
                            	 <div class="spacer"></div>
                                <div class="section-element" style="DISPLAY:BLOCK;">
                                  <button id="save-generali" type="button" class="btn btn-default" STYLE="FLOAT:RIGHT">Salva Modifiche</button>
                                </div>
                                <div class="spacer"></div>
						</div>
					</div>
				</li>
				<li class="list-group-item">
					<div class="row toggle" id="dropdown-detail-2" data-toggle="detail-2">
							<div class="col-xs-10 section-title">
							Notizie
						</div>
						<div class="col-xs-2"><i class="fa fa-chevron-down pull-right"> <img class="rotation" src="res/img/arrow_down.png"/></i></div>
					</div>
					<div id="detail-2">
						<hr>
						<div class="container container-sub">
							<div class="fluid-row">
                            	
                                <!--tabella-->
                                <div id="container-tab-news" class="table-responsive" style="height: 315px;">
                                	<table class="table" id="diagnosis_list">
                                    	<thead>         
                                        <tr><th>Priorità</th><th>Nome</th><th>Categoria</th><th>N.News</th><th></th></tr>
                                    </thead>
									<tbody class="ui-sortable myclass">
                                    <?php
                                        	$mysqli = new mysqli("localhost", "root", "", "my_progettoleila");
                                            $result= mysqli_query($mysqli,"SELECT * FROM db_notizie_source INNER JOIN db_notizie_scelte ON db_notizie_source.id=db_notizie_scelte.idNews ORDER BY db_notizie_scelte.ordine ASC");
                                      		while($r=mysqli_fetch_array($result))
                                            {
<<<<<<< HEAD
                                            	echo '<tr><td class="priority">'.$r["ordine"].'</td><td>'.$r["fonte"].'</td><td>'.$r["nome"].'</td><td class="num-mod">'.$r["numero"].'</td><td><a class="btn btn-delete btn-danger">Elimina</a></td></tr>';
=======
                                            	echo '<tr><td class="priority">'.$r["ordine"].'</td><td>'.$r["fonte"].'</td><td>'.$r["categoria"].'</td><td>'.$r["numero"].'</td><td><a class="btn btn-delete btn-mod">Modifica</a><a class="btn btn-delete btn-danger">Elimina</a></td></tr>';
>>>>>>> 1e384caa1e147157a35b6a906c16be3ae7452a67
                                            }
                                        ?>
                                	</tbody> 
                               	</table>
                               </div>
                                
                                <!--tabella-->
                                <!-- Aggiungi alla tabella-->
                                <div id="add-notizie" class="section-element" style="margin-top:10px">
                                  	<div class="section-sub" >Aggiungi Fonti</div>
                              	</div>
                                <div class="section-element">
                                    <div id="add-notizie-1" class="section-sub" style="margin-left:3%;width:57%">Fonte da aggiungere:
                                    </div>
                                    <div id="add-news" >
                                        <select class="selectpicker" data-show-subtext="true" data-live-search="true">
                                        <?php
                                        	$mysqli = new mysqli("localhost", "root", "", "my_progettoleila");
                            				$result= mysqli_query($mysqli,"select * from db_notizie_source where id NOT IN (Select idNews From db_notizie_scelte)");
                                      		while($r=mysqli_fetch_array($result))
                                            {
                                            	echo '<option data-subtext="'.$r["nome"].'">'.$r["fonte"].'</option>';
                                            }
                                            $result= mysqli_query($mysqli,"select * from db_notizie_source where id IN (Select idNews From db_notizie_scelte)");
                                      		while($r=mysqli_fetch_array($result))
                                            {
                                            	echo '<option data-subtext="'.$r["nome"].'"disabled="disabled">'.$r["fonte"].'</option>';
                                            }
                                        ?>
                                          </select>
                                      </div>
                                   </div>
                                   <div class="section-element">
                                   <div id="add-notizie-2" class="section-sub" style="margin-left:3%;width:57%">Numero notizie da leggere:
                                    </div>
                                    <div id="add-ripetizioni" >
                                      <input type="number" style="width:218px;"class="form-control" value="0">
                                      </div>
                                   </div>
                                   <div id="btn-confirm" class="section-element">
                                   	<a id="a-news" href="#" class="btn btn-block btn-insert-news" STYLE="width:83%">Clicca per aggiungere la fonte</a>
                                   </div>
                                <!-- Aggiungi alla tabella-->
                                <div class="spacer"></div>
                                <div class="section-element" style="DISPLAY:BLOCK;">
                                  <button id="save-notizie" type="button" class="btn btn-default" STYLE="FLOAT:RIGHT" onclick="ajaxNews('res/php/manageNews.php')">Salva Modifiche</button>
                                </div>
                                <div class="spacer"></div>
							</div>
						</div>
					</div>
				</li>
				<li class="list-group-item">
					<div class="row toggle" id="dropdown-detail-3" data-toggle="detail-3">
						<div class="col-xs-10 section-title">
							Meteo
						</div>
						<div class="col-xs-2"><i class="fa fa-chevron-down pull-right"><img class="rotation" src="res/img/arrow_down.png"/></i></div>
					</div>
					<div id="detail-3">
						<hr>
						<div class="container container-sub">
							<div class="fluid-row">
                            	
                                <!--tabella-->
                                <div id="container-tab-news" class="table-responsive" style="height: 315px;">
                                	<table class="table" id="localita_list">
                                    	<thead>         
                                        <tr><th>Priorità</th><th>Località</th><th>Cap.</th><th>Provincia</th><th>Nazione</th><th></th></tr>
                                    </thead>
									<tbody class="ui-sortable myclass">
                                    <?php
                                        	$mysqli = new mysqli("localhost", "root", "", "my_progettoleila");
                                            $result= mysqli_query($mysqli,"SELECT * FROM db_meteo_scelte ORDER BY id ASC");
                                      		while($r=mysqli_fetch_array($result))
                                            {
                                            	echo '<tr><td link="'.$r["link"].'" class="priority">'.$r["id"].'</td><td>'.$r["citta"].'</td><td>'.$r["cap"].'</td><td>'.$r["provincia"].'</td><td>'.$r["nazione"].'</td><td><a class="btn btn-delete btn-danger">Elimina</a></td></tr>';
                                            }
                                        ?>
                                	</tbody> 
                               	</table>
                               </div>
                                
                                <!--tabella-->
                                <!-- Aggiungi alla tabella-->
                                <div id="add-notizie" class="section-element" style="margin-top:10px">
                                  	<div class="section-sub" >Aggiungi Località</div>
                              	</div>
                                <div class="section-element">
                                    <div id="add-localita-1" class="section-sub" style="margin-left:3%;width:57%">Località da cercare:
                                    </div>
                                    <div id="cerca-localita" >
                                        <input id="citta-cerca" type="text" style="width:218px;"class="form-control">
                                      </div>
                                   </div>
                                   <div class="section-element">
                                   <div id="add-localita-2" class="section-sub" style="margin-left:3%;width:57%">Località trovate:
                                    </div>
                                    <div id="add-localita" >
                                      <select id="citta-trovate" style="width:218px;"class="form-control">
									  </select>
                                      </div>
                                   </div>
                                   <div id="btn-confirm-meteo" class="section-element">
                                   	<a id="a-meteo" href="#" class="btn btn-block btn-insert-news" STYLE="width:83%">Clicca per aggiungere la località</a>
                                   </div>
                                <!-- Aggiungi alla tabella-->
                                <div class="spacer"></div>
                                <div class="section-element" style="DISPLAY:BLOCK;">
                                  <button id="save-meteo" type="button" class="btn btn-default" STYLE="FLOAT:RIGHT" onclick="ajaxMeteo('res/php/manageMeteo.php')">Salva Modifiche</button>
                                </div>
                                <div class="spacer"></div>
							</div>
						</div>
					</div>
				</li>
			
			</ul>
		</div>
	</div>
	</div>
</div>
</div>
</body>
</html>