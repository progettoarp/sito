<html>
	<head>
		<title>LEILA</title>
		<?php
			include("functions.php");
			getResource();
		?>

	</head>
	<body>
		<?php			
			getMenu();
		?>
        <div class="main">
		<input id="cerca" type="text"/>
		<p id="result"></p>
		</div>
		<script>
			$('#cerca').keyup(function(){
				$.post( "./res/php/city-autocomplete.php", { citta: $(this).val() })
				  .done(function( data ) {
					$('#result').html(data);
				  });
			});
		</script>
	</body>
</html>