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
    $today = date("Y-m-d");

    $sql = "INSERT INTO member1 (username, userid, psword, jumin, email, phone1, phone2, phone3, groups, levels, indate, ip)";
    $sql .= " values ('".$name."','".$id."','".$pwd."','".$jumin."','".$email."','".$phone1."','".$phone2."','".$phone3."','".$groups."','4','".$today."','".$_SERVER['REMOTE_ADDR']."')";
    $query = mysqli_query($conn, $sql);
?>

<!doctype HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
</head>
<body>
    <?
    function alert_fun($msg)
    {
        echo("<script>
		alert('$msg'); 
		location.href='./login.php';
	   </script>");
        exit;
    }
    $title= "회원가입을 축하드립니다.";
    $title = '=?UTF-8?B?'.base64_encode($title).'?=';
    $sender="p201987062@l.bsks.ac.kr";
    $receiver=$email;

    $contents="<html><body  bgcolor=\"red\">";
    $contents.="우리 oo 사이트에 가입을 축하드립니다". "\r\n";
    $contents.="가입 id는 ".$id." 이고 암호는 ".$pwd." 입니다</html>". "\r\n";

    // ereg(php 7.0 제거)-->preg_match
    if(!preg_match("(^[_0-9a-zA-Z-]+(\.[_0-9a-zA-Z-]+)*@[0-9a-zA-Z-]+(\.[0-9a-zA-Z-]+)*$)", $sender))
    {
        alert_fun(" $sender : 보내는 사람의 메일주소가 잘못되었습니다.");
    }
    if(!preg_match("(^[_0-9a-zA-Z-]+(\.[_0-9a-zA-Z-]+)*@[0-9a-zA-Z-]+(\.[0-9a-zA-Z-]+)*$)", $receiver))
    {
        alert_fun("받는사람의 메일주소가 잘못되었습니다.");
    }
    $header="From:박규효<$sender>\r\n";
    $header.= "Content-Type: text/html; charset=utf-8\r\n";

    mail($receiver, $title, $contents, "$header" );

    alert_fun("회원가입에 성공하였습니다.");

    echo("<meta http-equiv='refresh' content='0; url=./login.php'>");
    ?>
</body>
</html>
