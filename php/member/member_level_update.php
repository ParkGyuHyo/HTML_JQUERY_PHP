<!doctype html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="./css/style.css"/>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <?
    session_start();
    if (empty($_SESSION["userLevel"]) || $_SESSION["userLevel"] != 1) {
        echo "<script>alert('권한이 없습니다.'); history.back();</script>";
    }

    include "./dbconfig.php";

    $userNo = $_GET['num'];

    $sql = "SELECT * FROM member1 where num = '".$userNo."'";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($query);

    $groups_arr = array(1=>'재학생', 2=>'졸업생', 3=>'교수', 4=>'일반');
    $levels_arr = array(1=>'관리자', 2=>'정회원', 3=>'준회원', 4=>'승인대기', 5=>'승인불가');
    ?>
    <script type="text/javascript">
        $(function() {
            $("input:radio[name='upLevels']:input[value='<?=$row['levels'];?>']").prop("checked", true);

            $("#submit").click(function(){
                let upLevel = $("input:radio[name='upLevels']:checked").val();
                $.post("./member_level_update_process.php", {userno: '<?=$userNo;?>', upLevel: upLevel}, function(data){
                    if(data.indexOf("변경완료") !== -1) {
                        alert("변경 완료");
                        opener.location.reload();
                        self.close();
                    }
                }, "text");
            });

            $("#cancel").click(function(){
               self.close();
            });
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
    <table class="simple_board">
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
            <td>
                <label><input type="radio" name="upLevels" class="radio" value="1"> 관리자</label>
                <label><input type="radio" name="upLevels" class="radio" value="2"> 정회원</label>
                <label><input type="radio" name="upLevels" class="radio" value="3"> 준회원</label>
                <label><input type="radio" name="upLevels" class="radio" value="4"> 승인대기</label>
                <label><input type="radio" name="upLevels" class="radio" value="5"> 승인불가</label>
            </td>
        </tr>
        <tr>
            <th>등록일</th>
            <td><?=$row["indate"];?></td>
        </tr>
        <tr>
            <th>IP</th>
            <td><?=$row["ip"];?></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center;">
                <input type="button" class="btn_major" id="submit" value="저 장" /> <input type="button" class="btn_red" id="cancel" value="취 소" />
            </td>
        </tr>
        </tbody>
    </table>
</div>
</body>
</html>
