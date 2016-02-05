<?php
	function getMenu()
	{
		echo ' 		<nav class="navbar-inverse" style="width:343px;height:100%;position:absolute;">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div id="logo-container" class="navbar-header ">
				<a class="navbar-brand" href="#" style="height:150px"><image src="res/img/logo.png" style="height:100%"/></a>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div id="bs-sidebar-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li class="lista menu" style="height:60px;"><a href="news.php" >Notizie<span  class="pull-right hidden-xs showopacity glyphicon glyphicon-globe"></span></a></li>
					<li class="lista menu" style="height:60px";><a href="sveglie.php" >Sveglie<span  class="pull-right hidden-xs showopacity glyphicon glyphicon-time"></span></a></li>
					<li class="lista menu" style="height:60px";><a href="radio.php" >Radio<span  class="pull-right hidden-xs showopacity glyphicon glyphicon-headphones"></span></a></li>
					<li class="lista menu" style="height:60px";><a href="impostazioni.php" >Impostazioni<span class="pull-right hidden-xs showopacity glyphicon glyphicon-cog"></span></a></li>
				</ul>
			</div>
		</nav>';
	}
	function getResource()
	{
		echo ' 		<meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=1349">
		<link href="bootstrap-3.3.5-dist/css/bootstrap.css" rel="stylesheet" type="text/css">
		<link href="bootstrap-3.3.5-dist/css/bootstrap-theme.css" rel="stylesheet" type="text/css">
		<script src="bootstrap-3.3.5-dist/js/bootstrap.js" type="text/javascript"></script>
		<script src="bootstrap-3.3.5-dist/js/npm.js" type="text/javascript"></script>
		<link href="res/css/style.css" rel="stylesheet" type="text/css">
        <script src="res/js/jquery-2.2.0.min.js" type="text/javascript"></script>
        ';
	}
    function getClock()
    {
    	echo ' 		
        <article class="clock">
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
        
        ';
    }
?>