<?
include "./dbconfig.php";
session_start();

$sql = "DELETE FROM member1 WHERE num='".$_SESSION['userNo']."'";
mysqli_query($conn, $sql);
?>

<script>
    alert('탈퇴 완료');
    location.href='./login.php';
</script>
