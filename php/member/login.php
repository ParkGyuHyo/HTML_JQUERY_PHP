<!doctype html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="./css/style.css"/>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript">
        $(function() {

            $("#login").submit(function(e){
                $(this).parent().find("input").each(function(item) {
                    var errTarget;
                    switch($(this).attr("name")) {
                        case "userid" :
                            errTarget = "아이디";
                            break;
                        case "userpwd" :
                            errTarget = "패스워드";
                            break;
                        default : break;
                    }

                    if ($(this).val() == "" || $(this).val() == null) {
                        alert(errTarget + "를 입력해주세요.");
                        $(this).focus();
                        e.preventDefault();
                        return false;
                    }
                });
            });

            $("input[name='btn_regi']").click(function(){
               location.href='member_input.php';
            });
        });
    </script>
</head>
<body>
    <div class="section_center">
        <div class="login_form">
            <h3>로그인</h3>
            <hr>
            <form id="login" name="login" action="./login_process.php" method="POST">
                <p><input type="text" name="userId" placeholder="ID"></p>
                <p><input type="password" name="userPwd" placeholder="PASSWORD"></p>
                <p><input type="submit" class="btn_major" value="로그인"> <input type="button" class="btn_red" name="btn_regi" value="회원가입"></p>
            </form>
        </div>
        테스트 아이디 : qkrrbgy | 비밀번호 : 1234
    </div>
</body>
</html>
