<?php 

require('components/config.php');

	if (isset($_POST['submit'])){
	$menu_name = $_POST['menu_name'];
	$position = $_POST['position'];
	$visible = $_POST['visible'];

	$query = "INSERT INTO subjects (menu_name, position, visible)
           VALUES ('{$menu_name}', '{$position}', '{$visible}')";
	$result = mysqli_query($connect, $query);
	
  if ($result) {
    $answer = "Õnnestus";
  } else {
    $answer = "Ebaõnnestus";
  }
}
?>


<!DOCTYPE html>
<html>
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset= utf-8">
  <title>databases</title>
   </head>
  <body>

<?php

if (isset($_POST['submit'])){
echo $answer;
}
?>

<form action="databases-create.php" method="post">
<label for="menu-name" >Teema nimi:</label>
<input id="menu-name" type="text" name="menu_name"></input>

<label for="position" >Positsioon:</label>
<select id="postition" name ="position">
	<?php for ($i=1; $i < 16; $i++) {  ?>

	<option value="<?php echo $i;?>"><?php echo $i;?></option>

	<?php } ?>


</select>
<label for="visible" >Nähtavus:</label>
<!--<input id="visible" type="number" name="visible"></input>f.ainla page>-->
<select id="visible" name="visible">

<option value="1">Nähtav</option>
<option value="0">Peidetud</option>

</select>

<input type="submit" name="submit" value="Saada"></input>


</form>
<a href="index.php">Mine tagasi</a>
  </body>

  </html>

  <?php mysqli_close($connect);?>