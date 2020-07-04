<?
    include "./dbconfig.php";
?>
<?
    $querytxt = (empty($_POST['querytxt'])) ? "" : $_POST['querytxt'];
?>
<!doctype html>
<html>
    <head>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <style type="text/css">
            textarea {
                width: 500px;
                height: 100px;
            }

            table {
                border-collapse: collapse;
            }

            table tr th {
                border:1px solid black;
                text-align: center;
                padding: 7px;
            }

            table tr td {
                border:1px solid black;
                text-align: center;
                padding: 7px;
                background: #fff;
            }
        </style>
        <script type="text/javascript">
            function queryCheck(target) {
                let query_txt = $(target).find("#querytxt").val();

                const result_x = (query_txt.indexOf("drop") !== -1 || query_txt.indexOf("delete") !== -1 || query_txt.indexOf("update") !== -1);

                if (result_x) {
                    alert("사용할 수 없는 Query 입니다.");
                    return false;
                }
            }
        </script>
    </head>
    <body>
        <h3>QUERY TEST</h3>
        <hr />
        <form action="./Report_0611.php" method="POST" onsubmit="return queryCheck(this);">
            <textarea name="querytxt" id="querytxt"><?=$querytxt;?></textarea>
            <br>
            <input type="submit" value="확인">
        </form>
        <hr />
        <h3>Result</h3>
        <?
            if($querytxt != "") {
                $query = $querytxt;
                $result = mysqli_query($conn, $query) or die("Query 오류");

				$rows =@mysqli_num_fields($result);

                if ($rows > 0) {

        ?>
        <table>
            <tr>
            <?
                while($field_list = mysqli_fetch_field($result)) {
                    echo "<th>$field_list->name</th>";
                }
            ?>
            </tr>
        <? while($rst = mysqli_fetch_array($result)) { ?>
			<tr>
		<? for($i=0; $i<$rows; $i++) { ?>
				<td><?=$rst[$i];?></td>
        <? } ?>
			</tr>
		<? } ?>
        </table>
        <?
                }
            }
        ?>
    </body>
</html>