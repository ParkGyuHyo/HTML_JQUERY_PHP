<head><meta charset="utf-8">
<?
function alert_fun($msg)
{
    echo("<script>
		alert('$msg'); 
		history.back();
	   </script>");
    exit;
}
$title=$_POST['title'];
$doctype=$_POST['doctype'];
$sender=$_POST['sender'];
$receiver=$_POST['receiver'];
$contents=$_POST['contents'];
// ereg(php 7.0 제거)-->preg_match
if(!preg_match("(^[_0-9a-zA-Z-]+(\.[_0-9a-zA-Z-]+)*@[0-9a-zA-Z-]+(\.[0-9a-zA-Z-]+)*$)", $sender))
{
    alert_fun(" $sender : 보내는 사람의 메일주소가 잘못되었습니다.");
}
if(!preg_match("(^[_0-9a-zA-Z-]+(\.[_0-9a-zA-Z-]+)*@[0-9a-zA-Z-]+(\.[0-9a-zA-Z-]+)*$)", $receiver))
{
    alert_fun("받는사람의 메일주소가 잘못되었습니다.");
}
$header="From:홍길동<$sender>\r\n";
if ($doctype==2)//파일 이름과 첨부파일이 있으면
{
    $header.= "Content-Type: text/html; charset=euc-kr\r\n";
}
else
{
    $header.= "Content-Type: text/plain; charset=euc-kr\r\n";
}
mail($receiver, $title, $contents, "$header" );
alert_fun("메일이 발송되었습니다.");
echo("<meta http-equiv='refresh' content='0; url=./mail_form.php'>");
?>