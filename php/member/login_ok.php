<!doctype html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="./css/style.css"/>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript">
        $(function() {
            $("#goList").click(function(){
               location.href='./member_list.php';
            });

            $("#goLogout").click(function(){
                location.href='./logout.php';
            });

            $("#goMyInfo").click(function(){
                location.href='./member_view.php';
            });
        });
    </script>
</head>
<body>
<div class="section_center">
    <div class="my_info">
        <h3>회원 정보</h3>
        <hr>
        <?
            include "./dbconfig.php";

            session_start();
            $sql = "SELECT * FROM member1 WHERE num = '".$_SESSION['userNo']."'";
            $query = mysqli_query($conn, $sql);

            $row = mysqli_fetch_array($query);

            $levels = array(1=>'관리자', 2=>'정회원', 3=>'준회원', 4=>'승인대기', 5=>'승인불가');
        ?>
        <p>회원번호 : <?=$row['num'];?></p>
        <p>아이디 : <?=$row['userid'];?></p>
        <p>이름 : <?=$row['username'];?></p>
        <p>회원상태 : <?=$levels[$row['levels']];?></p>
        <hr>
        <p style="text-align: center;">
            <? if($levels[$row['levels']] == "관리자") { ?>
                <input type="button" class="btn_major" id="goList" value="멤버 리스트로 이동">
            <? } ?>
            <input type="button" class="btn_major" id="goMyInfo" value="회원 정보">
            <input type="button" class="btn_red" id="goLogout" value="로그아웃">
        </p>
    </div>
</div>
</body>
</html>
