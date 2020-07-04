<!doctype html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="./css/style.css"/>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript">
        $(function() {
            $(".edit_txt").click(function(){
                let item_idx = $(this).closest('tr').index();
                let userNo = $(".user_list table.simple_board tbody").find("tr").eq(item_idx).find("td").eq(0).text();
                window.open('member_level_update.php?num='+userNo,'level_up_win','resizable=yes,scrollbars=yes,width=500,height=500');
            });
        });
    </script>
</head>
<body>
<?
    session_start();
    if (empty($_SESSION["userLevel"]) || $_SESSION["userLevel"] != 1) {
        echo "<script>alert('권한이 없습니다.'); history.back();</script>";
    }

    include "./lib.php";

    $member = new Select("member1");
    $count = $member->getCount();
?>
<div class="user_list_section_center">
    <div class="user_list">
        <h3>회원 명부</h3>
        <hr>
        <table class="simple_board tbw800">
            <colgroup>
                <col width="3%">
                <col width="9%">
                <col width="10%">
                <col width="10%">
                <col width="20%">
                <col width="12%">
                <col width="5%">
                <col width="5%">
                <col width="10%">
                <col width="*">
            </colgroup>
            <thead>
            <tr>
                <th colspan="3" class="left">총 회원수 : <?=$count;?>명</th>
                <th colspan="5"></th>
                <th colspan="2" class="right">현재 페이지 : </th>
            </tr>
            <tr>
                <th>번호</th>
                <th>이름</th>
                <th>아이디</th>
                <th>생년월일</th>
                <th>메일주소</th>
                <th>핸드폰</th>
                <th>소속</th>
                <th>등급</th>
                <th>등록일</th>
                <th>IP</th>
            </tr>
            </thead>
            <tbody>
            <?
                $groups_arr = array(1=>'재학생', 2=>'졸업생', 3=>'교수', 4=>'일반');
                $levels_arr = array(1=>'관리자', 2=>'정회원', 3=>'준회원', 4=>'승인대기', 5=>'승인불가');
            ?>
        <? foreach($member->getArray() as $row) { ?>
            <tr>
                <td><?=$row["num"];?></td>
                <td><?=$row["username"];?></td>
                <td><?=$row["userid"];?></td>
                <td><?=substr($row["jumin"], 0, 6);?></td>
                <td><?=$row["email"];?></td>
                <td><?=$row["phone1"];?>-<?=$row["phone2"];?>-<?=$row["phone3"];?></td>
                <td><?=$groups_arr[$row["groups"]];?></td>
                <td class="edit_txt"><?=$levels_arr[$row["levels"]];?></td>
                <td><?=substr($row["indate"], 0, 10);?></td>
                <td><?=$row["ip"];?></td>
            </tr>
        <? } $member->connectClose(); ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
