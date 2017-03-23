<html>
<form action="redir.php" method="post">
<input type="submit" name="btnback" value="на Главную"><br>
</form>
</html>
<?php
function printTable($table) {
        printf ("id: %d<br>name: <a href=http://localhost/getauthornews.php?id=%d>%s</a><br>avatar: %s<br>signature: %s<br><br>",
	$table['id'], $table['id'], $table['name'], $table['avatar'], $table['signature']);
}


$connect = mysqli_connect('localhost', 'root', '72836', 'mydb');
if(! $connect ) {
        printf("Couldn't connect: %s", mysqli_connect_error());
}
mysqli_set_charset($connect, "utf8");
$sql = 'SELECT * FROM authors';
$res = mysqli_query($connect, $sql );
if(! $res ) {
        printf("Couldn't get data: %s", mysqli_error($connect));
}
if (mysqli_num_rows($res)>0) {
	printf ("<b>Имена авторов кликабельны. Позволяет вывести все новости этого автора.</b><br>");
	while ($row = mysqli_fetch_assoc($res)) {
		printTable($row);
	}
	printf ("-----------------------------<br>Данные загружены успешно<br>");
} else {
	printf("Не найдено никаких авторов в БД");
}
mysqli_close($connect);


?>
