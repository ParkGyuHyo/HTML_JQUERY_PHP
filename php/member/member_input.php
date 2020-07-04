<!doctype html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="./css/style.css"/>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript">
        $(function() {

            let idChk = false;
            let pwdChk = false;

            $("input[name='userId'], input[name='userPwdChk']").on("change", function() {
                switch($(this).attr("name")) {
                    case "userId":
                        $.post("idchk.php", {chkId: $(this).val()}, function(data){
                            if(data.result == 1) {
                                idChk = false;
                                $("#idErrMsg").show();
                            } else {
                                idChk = true;
                                $("#idErrMsg").hide();
                            }
                        }, "json");
                        break;
                    case "userPwdChk":
                        if ($(this).val() != $("input[name='userPwd']").val()) {
                            pwdChk = false;
                            $("#pwdErrMsg").show();
                        } else {
                            pwdChk = true;
                            $("#pwdErrMsg").hide();
                        }

                    default : break;
                }
            });

            $("#register").submit(function(e){
               const chkArr = [
                {inputName: 'userName', targetName: '이름'},
                {inputName: 'userId', targetName: '아이디'},
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

               if (!idChk) {
                   alert("아이디를 확인해주세요.");
                   e.preventDefault();
                   return false;
               }

                if (!pwdChk) {
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

            });

            $("input[type='reset']").click(function(){
               if(confirm("로그인 페이지로 이동하시겠습니까 ?")) {
                   location.href='./login.php';
               }
            });
        });
    </script>
</head>
<body>
    <div class="section_center">
        <div class="regi_form">
            <h3>회원가입</h3>
            <hr>
            <form id="register" name="register" action="./member_input_process.php" method="POST">
                <table>
                    <tr>
                        <th>이름</th>
                        <td><input type="text" name="userName" /></td>
                    </tr>
                    <tr>
                        <th>아이디</th>
                        <td>
                            <input type="text" name="userId" />
                            <p id="idErrMsg">아이디가 존재합니다.</p>
                        </td>
                    </tr>
                    <tr>
                        <th>비밀번호</th>
                        <td><input type="password" name="userPwd" /></td>
                    </tr>
                    <tr>
                        <th>비밀번호 확인</th>
                        <td>
                            <input type="password" name="userPwdChk" />
                            <p id="pwdErrMsg">비밀번호가 일치하지 않습니다.</p>
                        </td>
                    </tr>
                    <tr>
                        <th>주민등록번호</th>
                        <td><input type="text" name="userJumin1" maxlength="6"/> - <input type="text" name="userJumin2" maxlength="7"/></td>
                    </tr>
                    <tr>
                        <th>핸드폰</th>
                        <td><input type="text" name="userPhone1" maxlength="3"/> - <input type="text" name="userPhone2" maxlength="4"/> - <input type="text" name="userPhone3" maxlength="4"/></td>
                    </tr>
                    <tr>
                        <th>이메일</th>
                        <td><input type="text" name="userEmail" /></td>
                    </tr>
                    <tr>
                        <th>소속</th>
                        <td>
                            <label><input type="radio" name="userGroups" value="1" checked/> 재학생</label>
                            <label><input type="radio" name="userGroups" value="2"/> 졸업생</label>
                            <label><input type="radio" name="userGroups" value="3"/> 교수</label>
                            <label><input type="radio" name="userGroups" value="4"/> 일반</label>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" class="btn_major" value="회원가입" /> <input type="reset" class="btn_red" value="취 소" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</body>
</html>
