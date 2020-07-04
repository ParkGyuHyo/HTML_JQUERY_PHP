<?
include "./dbconfig.php";

$id = $_POST["userno"];
$level = $_POST["upLevel"];

$sql = "UPDATE member1 set levels = '".$level."' WHERE num = '".$id."'";
$query = mysqli_query($conn, $sql);
?>
변경완료