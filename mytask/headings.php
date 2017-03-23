<html>
<form action="redir.php" method="post">
<input type="submit" name="btnback" value="на Главную"><br>
</form>
</html>
<?php
$connect = mysqli_connect('localhost', 'root', '72836', 'mydb');
if(! $connect ) {
	printf("Couldn't connect: %s", mysqli_connect_error());
}
mysqli_set_charset($connect, "utf8");
//start to build tree from begin with preid=0
$inner = $_GET['inner'];
buildTree(0);

mysqli_close($connect);

function buildTree($preid) {
	global $connect;
	global $inner;
	$sql="SELECT * FROM headings WHERE preid='{$preid}'";
	$res = mysqli_query($connect, $sql );
	if (mysqli_num_rows($res)>0) {
		//Otkrivaem spisok
		printf("<ul>");
		while ($row = mysqli_fetch_assoc($res)) {
			//delaem zapis v spiske
			$myid = $row['id'];
			printf("<li><a href=http://localhost/getheadingnews.php?id=%d&inner=%d>%s (id:%d)</a>",
			$row['id'], $inner, $row['name'], $row['id']);
			//rekursivno vizivaem zapis na poisk vlozheniy dlya etoy zapisi
			buildTree($myid);
		}
		//Zakrivaem kogda vse dannie poluchili
		printf("</ul>");
	} else {
		if ($preid == 0) {
			printf("Не найдено категорий первого уровня в БД<br>");
		}
	}
}
?>
