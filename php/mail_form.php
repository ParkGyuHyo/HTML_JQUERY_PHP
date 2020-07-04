<HTML>
<HEAD>
    <head><meta charset="utf-8">
        <script language='javascript'>
            function chk()
            {
                if(document.mail.sender.value=="")
                    alert ("보내는 사람의 이름이 없군요");
                else  if(document.mail.receiver.value=="")
                    alert ("받는 사람의 이름이 없군요");
                else  if(document.mail.title.value=="")
                    alert ("제목이 없군요");
                else  if(document.mail.contents.value.length < 5)
                    alert ("내용 5자이상");
                else   document.mail.submit();
            }
        </script>
        <TITLE>폼메일</TITLE>
    </HEAD>
<BODY BGCOLOR=#EEEEEE >
    <FORM METHOD=POST name="mail" ACTION="mail_process.php" >
        <table border="1"  cellspacing="0"  bgcolor="#DDDDDD"
               bordercolordark="white" bordercolorlight="black" width="543">
            <TR>
                <TD ALIGN=CENTER COLSPAN=4 width="540" >
                    <font face="굴림"  SIZE=5>폼 메일 </font></td>
            </TR>
            <TR ALIGN=CENTER>
                <TD width="100"> <font face="굴림"  SIZE=2>보내는사람 </font></TD>
                <TD width="170"><INPUT TYPE=TEXT  NAME=sender value="" ></TD>
                <TD width="100" ><FONT SIZE=3>받는사람</FONT></TD>
                <TD width="170" ><INPUT TYPE=TEXT NAME=receiver size="23" value=""></TD>
            </TR>
            <TR ALIGN=CENTER>
                <TD  ><FONT SIZE=3>제 &nbsp;&nbsp;&nbsp;&nbsp;목</FONT></TD>
                <TD COLSPAN=3   >
                    <INPUT NAME=title size="63" ></TD>
            </TR>
            <TR ALIGN=CENTER>
                <TD width="72"  ><FONT SIZE=3>내 &nbsp;&nbsp;&nbsp; 용</FONT></TD>
                <TD COLSPAN=3 width="461"  >
                <TEXTAREA NAME=contents ROWS=10 COLS="62">

                </TEXTAREA>
                </TD>
            </TR>
            <TR ALIGN=CENTER>
                <TD  >문서종류</TD>
                <TD COLSPAN=3   >
                    <input type="radio" name="doctype" value="1" checked>text
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="doctype" value="2">html</TD>
            </TR>
            <TR ALIGN=CENTER>
                <TD ALIGN=CENTER COLSPAN=4 width="537"  >
                    <INPUT TYPE=button VALUE='보내기' onclick='chk();' style="background-color:rgb(102,102,102);">
                    <INPUT TYPE=RESET  VALUE='새로작성' style="background-color:rgb(102,102,102);">
                    <INPUT TYPE=BUTTON VALUE='닫기' onclick='javascript:windows.close();'
                           style="background-color:rgb(102,102,102);">
                </td>
            </TR>
        </TABLE>
    </FORM>
</BODY>
</HTML>
