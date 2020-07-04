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

<?
$filename = "file/guest.txt";
$fd = fopen($filename, "r");
while (!feof($fd)){
    $name = trim(fgets($fd, 100));
    $age = trim(fgets($fd, 100));
    $phone = trim(fgets($fd, 100));
    $email = trim(fgets($fd, 100));
    $content = trim(fgets($fd, 100));
    $wdate = trim(fgets($fd, 100));
    $ip = trim(fgets($fd, 100));

    if ($name.$age.$phone.$email.$content.$wdate.$ip != "") {
        ?>
        <table>
            <colgroup>
                <col width="15%">
                <col width="35%">
                <col width="15%">
                <col width="35%">
                <tr>
                    <th>이름</th>
                    <td><?=$name;?></td>
                    <th>나이</th>
                    <td><?=$age;?></td>
                </tr>
                <tr>
                    <th>휴대폰</th>
                    <td><?=$phone;?></td>
                    <th>이메일</th>
                    <td><?=$email;?></td>
                </tr>
                <tr>
                    <th>내용</th>
                    <td colspan="3">
                        <?=$content;?>
                    </td>
                </tr>
                <tr>
                    <td colspan="4">
                        <?=$wdate." ".$ip;?>
                    </td>
                </tr>
        </table>
        <?
    }
}
?>
<hr>
<input type="button" onclick="location.href='Report7-1.html'" value="글 쓰 기">
</body>
</html>