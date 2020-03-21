<?php



$motor = "";
$angle = "";
$motor = $_POST['motor'];
$angle = $_POST['angle'];
echo "<h2>" . $motor . "</h2>";

echo "<h2>" . $angle . "</h2>";





$file = fopen("stam.json",'w');


fwrite($file,'{"motor":"'.$motor.'","angle":"'.$angle.'"}');
fclose($file);



 readfile("index1.php"); 

?>
