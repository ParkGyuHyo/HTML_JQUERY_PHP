<!doctype html>
<html>
<head>
    <style type="text/css">
        table {
            width: 100%;
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

        table tr:last-child td {
            text-align: right;
        }

        textarea {
            width: 99%;
        }
    </style>
</head>
<body>

<? include "./dbconfig.php"; ?>
<?
    $sql = "select * from guest_text order by sysdate asc";
    $result = mysqli_query($conn, $sql);

    while ($rst = mysqli_fetch_array($result)) {
?>
        <table>
            <colgroup>
                <col width="15%">
                <col width="35%">
                <col width="15%">
                <col width="35%">
                <tr>
                    <th>이름</th>
                    <td><?=$rst['name'];?></td>
                    <th>나이</th>
                    <td><?=$rst['age'];?></td>
                </tr>
                <tr>
                    <th>휴대폰</th>
                    <td><?=$rst['phone'];?></td>
                    <th>이메일</th>
                    <td><?=$rst['email'];?></td>
                </tr>
                <tr>
                    <th>내용</th>
                    <td colspan="3">
                        <?=$rst['content'];?>
                    </td>
                </tr>
                <tr>
                    <td colspan="4">
                        <?=$rst['sysdate']." ".$rst['ip'];?>
                    </td>
                </tr>
        </table>
        <? } ?>
<hr>
<input type="button" onclick="location.href='Report_0611_2_1.php'" value="글 쓰 기">
</body>
</html>