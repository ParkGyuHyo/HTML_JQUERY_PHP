<?
    include "./dbconfig.php";

    $ip = $_SERVER['REMOTE_ADDR'];

    $sql = "INSERT INTO COUNT (ip) VALUES ('".$ip."')";
    $query = mysqli_query($conn, $sql);

    $totalCount = "SELECT COUNT(*) CNT FROM COUNT";
    $query = mysqli_query($conn, $totalCount);
    $row = mysqli_fetch_array($query);

    $countN = $row['CNT'];
    $zero = 5 - strlen($countN);

    $html = '';

    for($i=0; $i<$zero; $i++) {
        $html .= '<img src="http://l.bsks.ac.kr/~p1234/img/N0.GIF">';
    }

    for($i=0; $i<strlen($countN); $i++) {
        $html .= '<img src="http://l.bsks.ac.kr/~p1234/img/N'.substr($countN, $i, 1).'.GIF">';
    }

    echo $html;
?>