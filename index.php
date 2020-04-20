<?php


$username_dict  = array( 'Admin' => '123456','Rotem' => '123456' );


?>

<!DOCTYPE html>
<html>
<head>
	<title>Robotic Arm Login</title>
	<script data-ad-client="ca-pub-6249131436002040" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	<style type="text/css">
		body
		{
			font-family: "Palatino Linotype", "Book Antiqua", Palatino, serif;
			/*background: url("login_wallpaper.jpg") no-repeat center center fixed;*/
  			background-size: cover;
  			height: 100%;
  			overflow: hidden;
		}

		.MainHeader
		{
			background-color: #004d4d;
			color: white;
			padding: 10px;

			text-align: center;
			width: 100%;
		}

		.main
		{
			text-align: center;

		}

		.Login
		{
			margin-top: 10%;
			margin-bottom: 10%;
		 	display: inline-block;

		}
		
		.MainFooter
		{
			background-color: #004d4d;
			color: white;
			padding: 10px;
			margin:0px;	
			text-align: center;
			position: absolute;
			bottom: 0;
			width: 100%;
		}
	</style>
</head>
<body>
	<header class="MainHeader">
		<h1> ROBOTIC ARM <h1>
	</header>
	<div class="main">

<?php
if (isset($_POST['username']))
{
    //comparing the user input with the good password
    $username = $_POST['username'];
    $password = $_POST['pwd'];
    if (array_key_exists($username,$username_dict))
    {
    	if ($password == $username_dict[$username])
    	{
    		header('Location: http://' . $_SERVER['HTTP_HOST'] . '/main.php');
    		exit;
    	}
    	else
    	{
    		echo '<p style="color:Red;font-weight: bold;">Wrong Password</p>';
    	}

    }
    else
    {
    	echo '<p style="color:Red;font-weight: bold;"> Username: <u>' . $username . '</u> does not exist on this planet</p>';
    }    
	
}
?>
	
		<form action="" method="post" class="Login">

			<input style="height:20%;font-size:30pt;" type="text" name="username" placeholder="Username"><br><br>
			<input style="height:20%px;font-size:30pt;" type="password" name="pwd" placeholder="Password"><br><br>
			<input style="height:20%;font-size:30pt;" type="Submit" value="Login" >
		</form>


	</div>

	<footer class="MainFooter">
		<div>By Rotem Ben David</div>

	</footer>
</body>
</html>