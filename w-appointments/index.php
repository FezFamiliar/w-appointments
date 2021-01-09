<?php

require_once 'config/database/db.php';

$start = 8;
$end = 19;


if(isset($_POST['date']) && isset($_POST['time']))
{
	// check if the interval isn't taken --> if not book him else dont

	echo '<pre>';
	print_r($_POST['date']);
	print_r($_POST['time']);
	echo '</pre>';

}
else if(isset($_POST['date']) && !isset($_POST['time']))
{
	// you need to fill in time
}
else if(!isset($_POST['date']) && isset($_POST['time']))
{
	// you need to fill in date
}


?>



<!DOCTYPE html>
<html>
<head>
	<title>W-appointment</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<main>
		<form method="POST" disabled>
			
			Date: <input type="date" name="date">
			<br><br>
			Time:
			<select name="time">
				<?php for($i = $start; $i <= $end; ++$i): ?>

					<option value=<?php echo $i; ?>><?php echo $i . ':00 - ' . $i + 1 . ':00' ?></option>

				<?php endfor; ?>
			</select>
			<br><br>
			<input type="submit" value="book">	
		</form>
	</main>
</body>
</html>