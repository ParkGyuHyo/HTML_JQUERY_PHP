<?
    $name = $_POST['user_name'];
    $age = $_POST['user_age'];
    $phone = $_POST['user_phone'];
    $email = $_POST['user_email'];
    $content = $_POST['content'];
    $wdate = date("Y-m-d h:i:s");
    $ip = $_SERVER["REMOTE_ADDR"];

    $filename = "./file/guest.txt";

    if (file_exists($filename)) {
        $fb = fopen($filename, "a");
    } else {
        $fb = fopen($filename, "w");
    }

    $file_content = $name."\n".$age."\n".$phone."\n".$email."\n".str_replace("\n", "<br>", $content)."\n".$wdate."\n".$ip."\n";
    if ($name && $age && $phone && $email && $content && $wdate && $ip) {
        fwrite($fb, $file_content);
    } else {
        echo "입력이 없어 내용 저장은 스킵합니다";
    }

    fclose($fb);

    echo "입력내용 : <br>";
    echo $file_content;
?>
<hr>
<input type="button" value="방명록 보기" onclick="location.href='Report7-3.php'">