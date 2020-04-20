<?php
$str = file_get_contents('MotorData.json');
$motors_data = json_decode($str, true);
$sensor_str = file_get_contents('SensorData.json');
$sensor_data = json_decode($sensor_str, true);
$humidity = $sensor_data['humidity'];
$temperature = $sensor_data['temperature'];

if (!empty($_POST))
{
	if (isset($_POST['refresh']))
	{

	}
	if (isset($_POST['motor'])) 
	{
		# code...
	
		$motor = $_POST['motor'];
		$angle = $_POST['angle'];
		
		switch ($motor) {
		    case "motor1":
		    	$motors_data['motor1'] = $angle;
		        break;
		    case "motor2":
		        $motors_data['motor2'] = $angle;
		        break;
		    case "motor3":
		        $motors_data['motor3'] = $angle;
		        break;
		    case "motor4":
		        $motors_data['motor4'] = $angle;
		        break;
		    case "motor5":
		        $motors_data['motor5'] = $angle;
		        break;
		}
	}
	if (isset($_POST['reset']))
	{
		$motors_data['motor1'] = '0';
		$motors_data['motor2'] = '90';
		$motors_data['motor3'] = '90';
		$motors_data['motor4'] = '0';
		$motors_data['motor5'] = '165';	
	}


	if (isset($_POST['RunServer']))
	{
		echo "string";
		echo exec('/usr/bin/python server_side.py &');
	}

	if (isset($_POST['StopServer']))
	{
		echo "another string";
		echo exec('./stopServer.sh');
	}

	if (isset($_POST['mode'])) {
		# code...
		$motors_data['mode'] = $_POST['mode'];
	}
	

	$motors_data_back = json_encode($motors_data);


	$file = fopen("MotorData.json",'w');

	fwrite($file,$motors_data_back);

fclose($file);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Robotic Arm</title>
	<link rel="stylesheet" type="text/css" href="index_style.css">
	<script src="mainJS.js"></script>

	<script type="text/javascript"></script>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body>
	<header class="MainHeader">
		<h1>ROBOTIC ARM<h1>
	</header>

	<div class="wrapper">

		<div class="control">
			<br><br>


			<form action="" method="POST">
				<!-- TODO: handle form in php -->
				<input type="submit" name="RunServer" value="Run Server"> 

			</form>
			<form action="" method="POST">
				<!-- TODO: handle form in php -->
				<input type="submit" name="StopServer" value="Stop Server"> 

			</form>

			<br><br>			


			<form action="" method="POST">
				<label>Temperture: <?php echo htmlspecialchars($temperature);?> </label><br>
				<label>Humidity: <?php echo htmlspecialchars($humidity);?> </label><br>
     			<input type="submit" name="refresh" value="Refresh"> 
			</form>

			<br><br>


			<form action="" method="POST">
				<!-- TODO: handle form in php -->
				<input type="submit" name="reset" value="Reset"> 

			</form>
			<br>
			<form action="" method="POST">
				<p>Choose a progam from the program list below</p>
				<select name="mode">
				  <option value="program1">program1</option>
				  <option value="program1">program1</option>
				  <option value="program1">program1</option>
				  <option value="program1">program1</option>
				</select>
				<input type="submit">
				<br><br>
				<!-- TODO: handle form in php -->
				<input type="button" name="stop" value="stop">
			</form>
			<br><br>
			<form action="" method="POST">
				motor: motor1 base 
				<br>
				angle: 
				<input type="button" onclick="change_val('ValRange1','range1','sub')"  value="<<">
				<input type="button" onclick="dec_val('ValRange1','range1')"  value="<">
				<input oninput="update_label('ValRange1','range1')" id="range1" type="range" value="<?php echo htmlspecialchars($motors_data['motor1']);?>" min="-90" max="90" name="angle">
				<input type="hidden" name="mode" value="manual">
				<input type="button" onclick="inc_val('ValRange1','range1')"   value=">">
				<input type="button" onclick="change_val('ValRange1','range1','add')"   value=">>">
				<label for="lfname" id="ValRange1"><script>update_label('ValRange1','range1')</script></label> 
				<input type="submit" name="motor" value="motor1">
			</form>
			<br>
			<form action="" method="POST">
				motor: motor2 forward backwards
				<br>
				angle: 
				<input type="button" onclick="change_val('ValRange2','range2','sub')"  value="<<">
				<input type="button" onclick="dec_val('ValRange2','range2')"  value="<">
				<input oninput="update_label('ValRange2','range2')" id="range2" type="range" value="<?php echo htmlspecialchars($motors_data['motor2']);?>" min="10" max="150" name="angle">
				<input type="button" onclick="inc_val('ValRange2','range2')"   value=">">
				<input type="button" onclick="change_val('ValRange2','range2','add')"   value=">>">
				<label for="lfname" id="ValRange2"><script>update_label('ValRange2','range2')</script></label> 
				<input type="hidden" name="mode" value="manual">
				<input type="submit" name="motor" value="motor2">
			</form>
			<br>
			<!-- MOTOR 3 -->
			<form action="" method="POST">
				motor: motor3 up = 90 down
				<br>
				angle:
				<input type="button" onclick="change_val('ValRange3','range3','sub')"  value="<<">
				<input type="button" onclick="dec_val('ValRange3','range3')"  value="<">
				<input oninput="update_label('ValRange3','range3')" id="range3" type="range" value="<?php echo htmlspecialchars($motors_data['motor3']);?>" min="10" max="140" name="angle">
				<input type="button" onclick="inc_val('ValRange3','range3')"   value=">">
				<input type="button" onclick="change_val('ValRange3','range3','add')"   value=">>">
				<label for="lfname" id="ValRange3"><script>update_label('ValRange3','range3')</script></label> 
				<input type="hidden" name="mode" value="manual">
				<input type="submit" name="motor" value="motor3">
			</form>
			<br>

			<!-- MOTOR 4 -->
			<form action="" method="POST">
				motor: motor4 gripper rotation flat = 0 upside down = 180
				<br>
				angle: 
				<input type="button" onclick="change_val('ValRange4','range4','sub')"  value="<<">
				<input type="button" onclick="dec_val('ValRange4','range4')"  value="<">
				<input oninput="update_label('ValRange4','range4')" id="range4" type="range" value="<?php echo htmlspecialchars($motors_data['motor4']);?>" min="0" max="180" name="angle">
				<input type="button" onclick="inc_val('ValRange4','range4')"   value=">">
				<input type="button" onclick="change_val('ValRange4','range4','add')"   value=">>">
				<input type="hidden" name="mode" value="manual">
				<label for="lfname" id="ValRange4"><script>update_label('ValRange4','range4')</script></label> 
				<input type="submit" name="motor" value="motor4">
			</form>
			<br>	
			<!-- MOTOR 5 -->
			<form action="" method="POST">
				motor: motor5 gripper open = 0 close = 180
				<br>
				angle:
				<input type="button" onclick="change_val('ValRange5','range5','sub')"  value="<<"> 
				<input type="button" onclick="dec_val('ValRange5','range5')"  value="<">
				<input oninput="update_label('ValRange5','range5')" id="range5" type="range" value="<?php echo htmlspecialchars($motors_data['motor5']);?>" min="0" max="180" name="angle">
				<input type="button" onclick="inc_val('ValRange5','range5')"   value=">">
				<input type="button" onclick="change_val('ValRange5','range5','add')"   value=">>">
				<label for="lfname" id="ValRange5"><script>update_label('ValRange5','range5')</script></label>
				<input type="hidden" name="mode" value="manual">
				<input type="submit" name="motor" value="motor5">
			</form>
			<br>

		</div>


	
	</div>



	









	<footer class="MainFooter">
		<div>By Rotem Ben David</div>
	</footer>

</body>
</html>