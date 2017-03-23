<html>
(*)Список авторов с поиском новостей по определенному автору: <a href='http://localhost/authors.php'><button>Go</button></a><br>
	Реализована бесконечная вложенность категорий<br>
(*.1)Список категорий с поиском новостей по ним (с поиском по дочерним): <a href='http://localhost/headings.php?inner=1'><button>Go</button></a><br>
(*.2)Список категорий с поиском новостей по ним (без поиска по дочерним): <a href='http://localhost/headings.php?inner=0'><button>Go</button></a><br>
<form action="redir.php" method="post">
(*)Показать новость по ID:<input type="text" name="newsId"><input type="submit" name="btnNewsById" value="Go"><br>
Показать новость по названию:<input type="text" name="newsLabel"><input type="submit" name="btnNewsByLabel" value="Go"><br>
</form>

</html>
