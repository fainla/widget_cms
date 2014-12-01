<?php 
	$dbhost = "localhost";
	$dbuser = "widget_cms";
	$dbpass = "secretpassword";
	$dbname = "widget_corp";

	$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

	if (mysqli_connect_errno()) {
			die("Database connection failed: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ").");
	}
	$query = "SELECT * FROM subjects";
	$result = mysqli_query($connect, $query);
?>


<!DOCTYPE html>
<html>
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset= utf-8">
  <title>databases</title>
   </head>
  <body>
  	<pre>

	<?php while($row = mysqli_fetch_assoc($result)) { ?>
		<h1 class="page-title"> <?php echo $row['menu_name']; ?> </h1>
		<a href ="databases-update.php?id=<?php echo $row['id']; ?>">Muuda</a>
		
	<?php } ?>
	<?php mysqli_free_result($result); ?>
	
    </pre>

  </body>

  </html>

  <?php mysqli_close($connect);?>