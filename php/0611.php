<?
    include "./dbconfig.php";
?>
<table>
    <tr>
        <th>num</th>
        <th>ban</th>
        <th>name</th>
        <th>kor</th>
        <th>eng</th>
        <th>mat</th>
    </tr>
<?
    $sql = "select * from rc1";
    $result = mysqli_query($conn, $sql) or die("query 오류");
    while($rst = mysqli_fetch_array($result)) {
?>
    <tr>
        <td><?=$rst['num'];?></td>
        <td><?=$rst['ban'];?></td>
        <td><?=$rst['name'];?></td>
        <td><?=$rst['kor'];?></td>
        <td><?=$rst['eng'];?></td>
        <td><?=$rst['mat'];?></td>
    </tr>
<? } ?>
</table>