<?
session_start();
$age = (int)$_COOKIE["age"];

if (!empty($_GET['type'])) {
    if ($_GET['type'] == "down") {
        $age--;
    } else if ($_GET['type'] == "up") {
        $age++;
    }
}

setcookie("age", $age, time() + 3600);

echo $age."세 ".$_SESSION["name"];
?>

<input type="button" onclick="location.href='./Report3-3.php?type=down'" value="나이감소">
<input type="button" onclick="location.href='./Report3-3.php?type=up'" value="나이증가">