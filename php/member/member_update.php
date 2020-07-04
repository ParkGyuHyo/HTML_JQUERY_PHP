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
            $("input:radio[name='userGroups']:input[value='<?=$row['levels'];?>']").prop("checked", true);
            let pwdChk = false;

            $("input[name='userPwdChk']").on("change", function() {
                if ($(this).val() != $("input[name='userPwd']").val()) {
                    pwdChk = false;
                    $("#pwdErrMsg").show();
                } else {
                    pwdChk = true;
                    $("#pwdErrMsg").hide();
                }
            });

            $("#register").submit(function(e){
                const chkArr = [
                    {inputName: 'userName', targetName: '이름'},
                    {inputName: 'userPwd', targetName: '패스워드'},
                    {inputName: 'userPwdChk', targetName: '패스워드 확인'},
                    {inputName: 'userJumin1', targetName: '주민번호 앞자리'},
                    {inputName: 'userJumin2', targetName: '주민번호 뒷자리'},
                    {inputName: 'userPhone1', targetName: '휴대폰 앞 번호'},
                    {inputName: 'userPhone2', targetName: '휴대폰 중간 번호'},
                    {inputName: 'userPhone3', targetName: '휴대폰 뒷 번호'},
                    {inputName: 'userEmail', targetName: '이메일'},
                    {inputName: 'userGroups', targetName: '소속'}
                ];

                $(chkArr).each(function(idx, row) {
                    let targetVal = $("input[name='" + row['inputName'] + "']").val();

                    if (targetVal == "" || targetVal == null) {
                        alert(row['targetName'] + "란을 입력해주세요.");
                        $("input[name='" + row['inputName'] + "']").focus();
                        e.preventDefault();
                        return false;
                    }
                });

                if ($("input[name='userPwdChk']").val() != $("input[name='userPwd']").val()) {
                    alert("비밀번호를 확인해주세요.");
                    e.preventDefault();
                    return false;
                }

                var chk =0;
                var chksum =0;
                var sex = $("input[name='userJumin2']").val().substring(0,1);

                if ($("input[name='userJumin1']").val().length!=6)
                {
                    alert ('주민등록번호 앞부분이 잘못되었습니다.');
                    $("input[name='userJumin1']").select();
                    e.preventDefault();
                    return false;
                }

                // sex : 1, 3 = male / 2, 4 = female
                if ((sex > 4)||($("input[name='userJumin2']").val().length != 7 ))
                {
                    alert ('주민등록번호 뒷부분이 잘못되었습니다.');
                    $("input[name='userJumin2']").select();
                    e.preventDefault();
                    return false;
                }

                for (var i = 0; i <=5 ; i++)
                {
                    chksum = chksum + ((i%8+2) * parseInt($("input[name='userJumin1']").val().substring(i,i+1)));
                }
                for (var i = 6; i <=11 ; i++)
                {
                    chksum = chksum + ((i%8+2) * parseInt($("input[name='userJumin2']").val().substring(i-6,i-6+1)));//i-6+1=i-5
                }
                chk = 11 - (chksum % 11);
                chk = chk % 10;
                if (chk != $("input[name='userJumin2']").val().substring(6,7))
                {
                    alert ('유효하지 않은 주민등록번호입니다.' +chk);
                    $("input[name='userJumin1']").select();
                    $("input[name='userJumin1']").focus();
                    e.preventDefault();
                    return false;
                }

                $("input[name='userId']").prop("disabled", false);
            });

            $("input[type='reset']").click(function(){
                if(confirm("이전 페이지로 이동하시겠습니까 ??")) {
                    history.back(-1);
                }
            });

        });
    </script>
</head>
<body>
<div class="section_center">
    <div class="regi_form">
        <h3>정보수정</h3>
        <hr>
        <form id="register" name="register" action="./member_update_process.php" method="POST">
            <table>
                <tr>
                    <th>이름</th>
                    <td><input type="text" name="userName" value="<?=$row['username'];?>"/></td>
                </tr>
                <tr>
                    <th>아이디</th>
                    <td>
                        <input type="text" name="userId" value="<?=$row['userid'];?>" disabled/>
                    </td>
                </tr>
                <tr>
                    <th>비밀번호</th>
                    <td><input type="password" name="userPwd" value="<?=$row['psword'];?>"/></td>
                </tr>
                <tr>
                    <th>비밀번호 확인</th>
                    <td>
                        <input type="password" name="userPwdChk" value="<?=$row['psword'];?>"/>
                        <p id="pwdErrMsg">비밀번호가 일치하지 않습니다.</p>
                    </td>
                </tr>
                <tr>
                    <th>주민등록번호</th>
                    <td>
                        <input type="text" name="userJumin1" maxlength="6" value="<?=substr($row['jumin'], 0, 6);?>"/> -
                        <input type="text" name="userJumin2" maxlength="7" value="<?=substr($row['jumin'], 6, 7);?>"/>
                    </td>
                </tr>
                <tr>
                    <th>핸드폰</th>
                    <td>
                        <input type="text" name="userPhone1" maxlength="3" value="<?=$row['phone1'];?>"/> -
                        <input type="text" name="userPhone2" maxlength="4" value="<?=$row['phone2'];?>"/> -
                        <input type="text" name="userPhone3" maxlength="4" value="<?=$row['phone3'];?>"/>
                    </td>
                </tr>
                <tr>
                    <th>이메일</th>
                    <td><input type="text" name="userEmail" value="<?=$row['email'];?>"/></td>
                </tr>
                <tr>
                    <th>소속</th>
                    <td>
                        <label><input type="radio" name="userGroups" value="1"/> 재학생</label>
                        <label><input type="radio" name="userGroups" value="2"/> 졸업생</label>
                        <label><input type="radio" name="userGroups" value="3"/> 교수</label>
                        <label><input type="radio" name="userGroups" value="4"/> 일반</label>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" class="btn_major" value="수정" /> <input type="reset" class="btn_red" value="취 소" />
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
</body>
</html>
