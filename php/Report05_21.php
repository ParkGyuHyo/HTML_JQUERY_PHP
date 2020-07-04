<?
	$your_bir = $_POST['birth'];

	$bir_month = substr($your_bir, 4, 2);
	$bir_day = substr($your_bir, 6, 2);
	$bir_year = substr($your_bir, 0, 4);

	$now = mktime();
	$myYear = mktime(0,0,0,$bir_month,$bir_day,$bir_year);

	$resultTime = floor(($now-$myYear) / 86400);

	$dayWeek_arr = ['일', '월', '화', '수', '목', '금', '토'];
	$year = date("Y");
	$day = date("z") + 1;
	$dayWeek = $dayWeek_arr[date("w")];
?>

<?=$_POST['name'];?>님의 생존일 : <?=$resultTime;?>일
<br>
금년 <?=$year;?>년 <?=$day;?>일차 <?=$dayWeek;?>요일