<?
include "./dbconfig.php";

$today = "SELECT COUNT(*) CNT FROM COUNT WHERE IDATE LIKE '".date("Y-m-d")."%'";
$todayQuery = mysqli_query($conn, $today);
$tod = mysqli_fetch_array($todayQuery);

$yesterdayM = mktime(0, 0, 0, date("m"), date("d")-1, date("Y"));
$yesterdayM = date("Y-m-d", $yesterdayM);

$yesterday = "SELECT COUNT(*) CNT FROM COUNT WHERE IDATE = '".$yesterdayM."'";
$yesterdayQuery = mysqli_query($conn, $yesterday);
$yes = @mysqli_fetch_array($yesterdayM);

$nowMonth = "SELECT COUNT(*) CNT FROM COUNT WHERE IDATE LIKE '".date("Y-m")."%'";
$nowMonthQuery = mysqli_query($conn, $nowMonth);
$mon = mysqli_fetch_array($nowMonthQuery);

$totalCount = "SELECT COUNT(*) CNT FROM COUNT";
$query = mysqli_query($conn, $totalCount);
$row = mysqli_fetch_array($query);
?>
<style type="text/css">
    table {
        width: 200px;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    th, td {
        padding: 7px;
        box-sizing: border-box;
    }

    th {
        background: #ddd;
        border: 1px solid #bbb;
    }

    td {
        border: 1px solid #bbb;
    }

    textarea {
        width: 99%;
    }
</style>
<table>
    <tr>
        <th>오늘</th>
        <td><?=$tod['CNT'];?></td>
    </tr>
    <tr>
        <th>어제</th>
        <td><?=($yes['CNT']=='') ? '0' : $yes['CNT'];?></td>
    </tr>
    <tr>
        <th>이번달</th>
        <td><?=$mon['CNT'];?></td>
    </tr>
    <tr>
        <th>전체</th>
        <td><?=$row['CNT'];?></td>
    </tr>
</table>
