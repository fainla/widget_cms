<?php 

if (!isset($_GET['id'])) {
	header('location:index.php');
}
require('components/config.php');
$id = $_GET['id'];

	if (isset($_POST['submit'])){
	$menu_name = $_POST['menu_name'];
	$position = $_POST['position'];
	$visible = $_POST['visible'];

	  $query = "UPDATE subjects SET
            menu_name = '{$menu_name}',
            position = {$position},
            visible = {$visible}
            WHERE id = {$id}";
	$result = mysqli_query($connect, $query);
	
  if ($result) {
    $answer = "Õnnestus";
  } else {
    $answer = "Ebaõnnestus";
  }
}else {
	$query = "SELECT * FROM subjects WHERE id = $id";
	$result = mysqli_query($connect, $query);
	$row = mysqli_fetch_assoc($result);

	$menu_name = $row['menu_name'];
	$position = $row['position'];
	$visible = $row['visible'];
}

?>


<!DOCTYPE html>
<html>
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset= utf-8">
  <title>databases</title>
  <?php if (isset ($_POST ['submit'])) { ?>
<meta http-equiv="refresh" content ="2; url=index.php">
  <?php } ?>
   </head>
  <body>

<?php

if (isset($_POST['submit'])){
echo $answer;
}


?>

<?php if (!isset($_POST['submit'])) { ?>
<form action="databases-update.php?id=<?php echo $id;?>" method="post">
<label for="menu-name" >Teema nimi:</label>
<input id="menu-name" type="text" name="menu_name" value= "<?php echo $menu_name ?>"></input>

<label for="position" >Positsioon:</label>
<select id="postition" name ="position">
	<?php for ($i=1; $i < 16; $i++) {  ?>

	<option value="<?php echo $i;?>"<?php if ($i == $position){echo "selected";}?>><?php echo $i;?></option>

	<?php } ?>


</select>
<label for="visible" >Nähtavus:</label>

<select id="visible" name="visible">

<option value="1"<?php if ($visible == 0) { echo "selected"; } ?>>Nähtav</option>
<option value="0"<?php if ($visible == 1) { echo "selected"; }; ?>>Peidetud</option>

</select>

<input type="submit" name="submit" value="Saada"></input>


</form>
<a href="index.php">Mine tagasi</a>
<?php } ?>

  </body>

  </html>

  <?php mysqli_close($connect);?>