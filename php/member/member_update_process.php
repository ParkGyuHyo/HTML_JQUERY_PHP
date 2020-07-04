<?
include "./dbconfig.php";

$name = $_POST['userName'];
$id = $_POST['userId'];
$pwd = $_POST['userPwd'];
$jumin = $_POST['userJumin1'].$_POST['userJumin2'];
$phone1 = $_POST['userPhone1'];
$phone2 = $_POST['userPhone2'];
$phone3 = $_POST['userPhone3'];
$email = $_POST['userEmail'];
$groups = $_POST['userGroups'];

$sql = "UPDATE member1 SET 
            username = '".$name."', 
            psword = '".$pwd."', 
            jumin = '".$jumin."', 
            email = '".$email."', 
            phone1 = '".$phone1."', 
            phone2 = '".$phone2."', 
            phone3 = '".$phone3."', 
            groups = '".$groups."'
        WHERE userid = '".$id."'
";
mysqli_query($conn, $sql);

echo $sql;
?>

<script>
    alert('수정 완료');
    location.href='./member_view.php';
</script>
