<html>
<form action="redir.php" method="post">
<input type="submit" name="btnback" value="на Главную"><br>
</form>
</html>
<?php
include 'lib.php';
$label = $_GET['label'];

$connect = mysqli_connect('localhost', 'root', '72836', 'mydb');
if(! $connect ) {
        printf("Couldn't connect: %s", mysqli_connect_error());
}
mysqli_set_charset($connect, "utf8");
$sql = "SELECT * FROM news WHERE title ='{$label}'";
$res = mysqli_query($connect, $sql );

if(! $res ) {
        printf("Couldn't get data: %s", mysqli_error($connect));
}

if (mysqli_num_rows($res)>0) {
	$row = mysqli_fetch_assoc($res);
	$row=doNewsParsing($row);
	printNewsTable($row);
	printf ("-----------------------------<br>Данные загружены успешно.<br>");
} else {
	printf ("Не найдено новости с данным названием.<br>");
}
mysqli_close($connect);
?>

