<!doctype html>
<html lang="en"> 
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Test02</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
	
  } );
  </script>
</head>
<body>

<?php 

	echo (String) 2.3333;

	if ( !empty($_REQUEST["date"]) ) {
		echo "<b>".$_REQUEST["date"]."</b>";
	} else {
	?>
<form action="test2.php" method="POST">
	<p>Date: <input type="text" id="datepicker" name="date"></p>
	<br />
	<input type="submit" value="SEND">
</form>
	<?php } ?>
 
</body>
</html>