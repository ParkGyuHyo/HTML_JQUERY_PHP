<?
    include "./dbconfig.php";

    $id = $_POST["userId"];
    $pwd = $_POST["userPwd"];

    $sql = "SELECT * FROM member1 WHERE userid = '".$id."' and psword = '".$pwd."'";
    $query = mysqli_query($conn, $sql);

    $row = mysqli_fetch_array($query);

    if (!empty($row)) {
        session_start();
        $_SESSION["userNo"] = $row['num'];
        $_SESSION["userLevel"] = $row['levels'];
        echo "<script>location.href='./login_ok.php';</script>";
    } else {
        echo "<script>alert('로그인 실패'); history.back();</script>";
    }