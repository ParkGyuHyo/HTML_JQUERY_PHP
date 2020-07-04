<?
$conn = mysqli_connect("localhost", "p201987062", "pp201987062", "p201987062");
if (!$conn) {
    die("DB 연결 실패 ===> (".mysqli_connect_errno().") ".mysqli_connect_error());
}
?>