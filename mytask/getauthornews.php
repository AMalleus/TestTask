<html>
<form action="redir.php" method="post">
<input type="submit" name="btnback" value="на Главную"><br>
</form>
</html>
<?php
include 'lib.php';
$authorid = $_GET['id'];

$connect = mysqli_connect('localhost', 'root', '72836', 'mydb');
if(! $connect ) {
        printf("Couldn't connect: %s<br>", mysqli_connect_error());
}
mysqli_set_charset($connect, "utf8");
$sql = "SELECT * FROM news WHERE author ='{$authorid}'";
$res = mysqli_query($connect, $sql );
if(! $res ) {
        printf("Couldn't get data: %s<br>", mysqli_error($connect));
}
if (mysqli_num_rows($res)>0) {
        for ($i=0; $i<mysqli_num_rows($res); ++$i) {
		$row = mysqli_fetch_assoc($res);
        	$row=doNewsParsing($row);
	        printNewsTable($row);
	}
	printf ("-----------------------------<br>Данные загружены успешно.<br>");
} else {
        printf ("Не найдено новостей данного автора.<br>");
}

mysqli_close($connect);

?>

