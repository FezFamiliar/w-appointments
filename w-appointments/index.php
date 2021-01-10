<?php

require_once 'config/database/db.php';

$start = 8;
$end = 19;
$error = '';
$scs = '';

if($_POST['date'] && $_POST['time'])
{
	if(strtotime($_POST['date']) && is_numeric($_POST['time']))
	{
		$interval = $_POST['date'] . ' ' . $_POST['time'];

		$sql = "SELECT * FROM appointments WHERE time_interval = '$interval'";
		$stmt = $conn->query($sql);
		$occupy = $stmt->fetch(PDO::FETCH_ASSOC);

		if($occupy)
		{
			$error = 'That timeframe is occupied!';
		}
		else
		{
			$sql = "INSERT INTO appointments (time_interval) VALUES (:interval)";
			$stmt = $conn->prepare($sql);
		
			$stmt->bindParam(':interval', $interval);
		
			if($stmt->execute())
			{
				$scs = 'book successfull!';
			}
		}
	}
	else
	{
		$error = 'try harder ;)';
	}
}
else if($_POST['date'] && !$_POST['time'])
{
	$error = 'you need to fill in time';
}
else if(!$_POST['date'] && $_POST['time'])
{
	$error = 'you need to fill in date';
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

		<form method="POST">
			<?php if($error): ?>
				<h2 class="error-msg"><?php echo $error; ?></h2>
			<?php elseif($scs): ?>
				<h2 class="scs-msg"><?php echo $scs;?></h2>
			<?php endif; ?>
			Date: <input type="date" name="date">
			<br><br>
			Time:
			<select name="time">
				<option value="">Enter a time interval</option>
				<?php for($i = $start; $i <= $end; ++$i): ?>

					<option value=<?php echo $i; ?>><?php echo $i . ':00 - ' . ($i + 1) . ':00' ?></option>

				<?php endfor; ?>
			</select>
			<br><br>
			<input type="submit" value="book">	
		</form>
	</main>
</body>
</html>