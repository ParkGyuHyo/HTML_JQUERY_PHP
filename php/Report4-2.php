<style type="text/css">
	table {
		border-collapse: collapse;
	}

	table tr th {
		background: #000;
		color: #fff;
		padding: 7px;
		border: 1px solid #ccc;
	}

	table tr td {
		text-align: center;
		padding: 7px;
		border: 1px solid #ccc;
	}
</style>

<?
	session_start();

	$guk = (int)($_POST["guk"] / 10);
	$eng = (int)($_POST["eng"] / 10);
	$sum = $_POST["guk"] + $_POST["eng"];
	$avg = $sum / 2;

	$hak = [];

	switch($guk) {
		case 10: $hak["guk"] = "A+"; break;
		case 9: $hak["guk"] = "A"; break;
		case 8: $hak["guk"] = "B"; break;
		case 7: $hak["guk"] = "C"; break;
		case 6: $hak["guk"] = "D"; break;
		default: $hak["guk"] = "F";
	}

	switch($eng) {
		case 10: $hak["eng"] = "A+"; break;
		case 9: $hak["eng"] = "A"; break;
		case 8: $hak["eng"] = "B"; break;
		case 7: $hak["eng"] = "C"; break;
		case 6: $hak["eng"] = "D"; break;
		default: $hak["eng"] = "F";
	}

	if($avg >= 60) {
		$hak["tot"] = "합격";
	} else {
		$hak["tot"] = "불합격";
	}

	setcookie("name", $_POST["name"], time() + 3600);
	$_SESSION["result"] = $hak["tot"];
?>

<table>
	<tr>
		<th>이름</th>
		<th>국어</th>
		<th>국어 학점</th>
		<th>영어</th>
		<th>영어 학점</th>
		<th>총점</th>
		<th>평균</th>
		<th>판정</th>
	</tr>
	<tr>
		<td><?=$_POST["name"];?></td>
		<td><?=$_POST["guk"];?></td>
		<td><?=$hak["guk"];?></td>
		<td><?=$_POST["eng"];?></td>
		<td><?=$hak["eng"];?></td>
		<td><?=$sum;?></td>
		<td><?=$avg;?></td>
		<td><?=$hak["tot"];?></td>
	</tr>
	<tr>
		<td colspan="8"><input type="button" value="확인" onclick="location.href='./Report4-3.php'" /></td>
	</tr>
</table>