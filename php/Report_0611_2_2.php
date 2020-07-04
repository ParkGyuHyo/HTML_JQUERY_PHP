<?
    include "./dbconfig.php";

    $name = $_POST['user_name'];
    $age = $_POST['user_age'];
    $phone = $_POST['user_phone'];
    $email = $_POST['user_email'];
    $content = str_replace("\n", "<br>", $_POST['content']);
    $ip = $_SERVER['REMOTE_ADDR'];

    $sql = "insert into guest_text (name, age, phone, email, content, ip)
            values('".$name."','".$age."','".$phone."','".$email."','".$content."','".$ip."')";
    $result = mysqli_query($conn, $sql);

    header("Location: Report_0611_2_3.php");
?>