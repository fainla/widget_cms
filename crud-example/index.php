<?php 

require('components/config.php');
	$query = "SELECT * FROM subjects WHERE visible=1 ORDER BY position";
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
  		<?php if ($editmode) { ?>
  		<a href="databases-create.php">Lisa uus</a>
  		<?php } ?>
	<?php while($row = mysqli_fetch_assoc($result)) { ?>
		<?php if ($editmode) { ?>
		<h1 class="page-title"> <?php echo $row['menu_name']; ?> </h1>
		<a href ="databases-update.php?id=<?php echo $row['id']; ?>">Muuda</a>
		<a href ="databases-delete.php?id=<?php echo $row['id']; ?>">Kustuta</a>
		<?php } ?>
	<?php } ?>
	<?php mysqli_free_result($result); ?>
	
    </pre>

  </body>

  </html>

  <?php mysqli_close($connect);?>