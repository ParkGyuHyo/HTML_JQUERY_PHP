<!doctype html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="./css/style.css"/>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <?
    include "./dbconfig.php";
    session_start();
    $userNo = $_SESSION['userNo'];

    $sql = "SELECT * FROM member1 where num = '".$userNo."'";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($query);

    $groups_arr = array(1=>'재학생', 2=>'졸업생', 3=>'교수', 4=>'일반');
    $levels_arr = array(1=>'관리자', 2=>'정회원', 3=>'준회원', 4=>'승인대기', 5=>'승인불가');
    ?>
    <script type="text/javascript">
        $(function() {
            $("#goHome").click(function(){
               location.href='./login_ok.php';
            });

            $("#update").click(function(){
                location.href='./member_update.php';
            })

            $("#delete").click(function(){
                if(confirm("정말로 탈퇴 하시겠습니까 ??")) {
                    location.href='./member_delete_process.php';
                }
            })
        });
    </script>
    <style type="text/css">
        html, body { padding: 10px; box-sizing: border-box; }
        table.simple_board tbody tr td {
            text-align: left;
        }
    </style>
</head>
<body>
<div class="user_list">
    <h3>회원 정보</h3>
    <hr>
    <table class="simple_board" style="width: 500px">
        <tbody>
        <tr>
            <th>이름</th>
            <td><?=$row["username"];?></td>
        </tr>
        <tr>
            <th>아이디</th>
            <td><?=$row["userid"];?></td>
        </tr>
        <tr>
            <th>주민번호</th>
            <td><?=substr_replace($row["jumin"], '-', 6, 0);?></td>
        </tr>
        <tr>
            <th>메일주소</th>
            <td><?=$row["email"];?></td>
        </tr>
        <tr>
            <th>핸드폰</th>
            <td><?=$row["phone1"];?>-<?=$row["phone2"];?>-<?=$row["phone3"];?></td>
        </tr>
        <tr>
            <th>소속</th>
            <td><?=$groups_arr[$row["groups"]];?></td>
        </tr>
        <tr>
            <th>등급</th>
            <td><?=$levels_arr[$row["levels"]];?></td>
        </tr>
        <tr>
            <th>등록일</th>
            <td><?=$row["indate"];?></td>
        </tr>
        <tr>
            <th>등록장소</th>
            <td><?=$row["ip"];?></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center;">
                <input type="button" class="btn_major" id="goHome" value="홈으로">
                <input type="button" class="btn_major" id="update" value="정보 수정" />
                <input type="button" class="btn_red" id="delete" value="회원 탈퇴" />
            </td>
        </tr>
        </tbody>
    </table>
</div>
</body>
</html>
