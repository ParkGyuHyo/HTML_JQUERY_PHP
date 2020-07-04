<?
$age = date("Y") - $_POST['year'] + 1;
$name = $_POST['name'];

session_start();
$_SESSION["name"] = $name;

setcookie("age", $age, time()+3600);

echo $age."세 ".$name;
?>
<br />
<input type="button" value="다 음" onclick="location.href='./Report3-3.php'">