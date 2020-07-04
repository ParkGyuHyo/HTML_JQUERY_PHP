<?
    include "./dbconfig.php";
    $id = $_POST['chkId'];
    $sql = "SELECT EXISTS(SELECT * FROM member1 WHERE userid = '".$id."') result";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($query);

    if ($row["result"]) {
        echo json_encode($row);
    } else {
        echo json_encode($row);
    }
?>