<?php
	$sensor_str = file_get_contents('SensorData.json');
	$sensor_data = json_decode($sensor_str, true);
	if (!empty($_POST))
	{
		if (isset($_POST['humidity']))
		{

			$sensor_data['humidity'] = $_POST['humidity'];
		}
		if (isset($_POST['temperature']))
		{
			$sensor_data['temperature'] = $_POST['temperature'];
		}
		$sensor_data_back = json_encode($sensor_data);

	$file = fopen("SensorData.json",'w');

	fwrite($file,$sensor_data_back);

	fclose($file);
	}

	

	header('Location: http://' . $_SERVER['HTTP_HOST'] . '/MotorData.json');
    exit;
?>