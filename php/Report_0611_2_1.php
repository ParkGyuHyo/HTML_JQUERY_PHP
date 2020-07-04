<!doctype html>
<html>
<head>
    <style type="text/css">
        table {
            width: 100%;
            border-collapse: collapse;
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
            text-align: center;
        }

        textarea {
            width: 99%;
        }
    </style>
</head>
<body>
<form method="POST" action="Report_0611_2_2.php">
    <table>
        <tr>
            <th>이름</th>
            <td><input type="text" name="user_name"></td>
            <th>나이</th>
            <td><input type="text" name="user_age"></td>
        </tr>
        <tr>
            <th>휴대폰</th>
            <td><input type="text" name="user_phone"></td>
            <th>이메일</th>
            <td><input type="text" name="user_email"></td>
        </tr>
        <tr>
            <th>내용</th>
            <td colspan="3">
                <textarea name="content" rows="10"></textarea>
            </td>
        </tr>
        <tr>
            <td colspan="4">
                <input type="submit" value="전송">
                <input type="reset" value="취소">
            </td>
        </tr>
    </table>
</form>
</body>
</html>