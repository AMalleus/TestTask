<html>
<form action="redir.php" method="post">
<input type="submit" name="btnback" value="на Главную"><br>
</form>
</html>
<?php
include 'lib.php';
$inner = $_GET['inner'];
$id=$_GET['id'];
$allid=array();
$num=0;

$connect = mysqli_connect('localhost', 'root', '72836', 'mydb');
if(! $connect ) {
	printf("Couldn't connect: %s", mysqli_connect_error());
}
mysqli_set_charset($connect, "utf8");
$sql="SELECT * FROM headings WHERE id='{$id}'";
$res = mysqli_query($connect, $sql );
if(! $res ) {
        printf("Couldn't get data: %s<br>", mysqli_error($connect));
}
if (mysqli_num_rows($res)>0) {
	$row=mysqli_fetch_assoc($res);
	//esli nuzhno vlozhenno iskat
	if ($inner == 1) {
		findInner($row['id']);
		//v allid soderzhatsya vse id headingov. ishem novosti po nim
	}
	$sql="SELECT * FROM news";
	$res = mysqli_query($connect, $sql );
	if(! $res ) {
        	printf("Couldn't get data: %s<br>", mysqli_error($connect));
	}
	if (mysqli_num_rows($res)>0) {
		while ($row = mysqli_fetch_assoc($res)) {
			$temp = $row['headings'];
			str_replace(" ","",$temp);
	        	$ids = explode(",",$temp);//news heading ids
			//esli s vlozheniyami
			if ($inner == 1) {
				for ($j=0; $j<count($allid); ++$j) {
					for ($i=0; $i<count($ids); ++$i) {
						if ($ids[$i] == $allid[$j]) {
							//Tekushiy row podhodit po id headinga
							$row=doNewsParsing($row);
							printNewsTable($row);
							++$num;
						}
						break;
					}
				}
			//esli bez vlozheniy
			} else {
				for ($i=0; $i<count($ids); ++$i) {
                                	if ($ids[$i] == $id) {
                                        	//Tekushiy row podhodit po id headinga
                                                $row=doNewsParsing($row);
                                                printNewsTable($row);
                                                ++$num;
                                        }
                                }
			}
	        }
	}
	if ($num == 0) {
		printf("Нет новостей по данной категории<br>");
	} else {
		printf ("-----------------------------<br>Данные загружены успешно.<br>");
	}
} else {
	printf ("Передан не существующий ID категории.<br>");
}
mysqli_close($connect);

function findInner($id) {
	global $connect, $allid;
	//tekushiy id podhodit;
	if (! in_array($allid,  $id)) {
		array_push($allid, $id);
        }
	$sql="SELECT * FROM headings WHERE preid ='{$id}'";
	$res = mysqli_query($connect, $sql );
	if(! $res ) {
        	printf("Couldn't get data: %s<br>", mysqli_error($connect));
	}
	if (mysqli_num_rows($res)>0) {
		//naideni inner katalogi
		while ($row=mysqli_fetch_assoc($res)) {
			//dlya kazhdogo kataloga ishem dochernie
                	findInner($row['id']);
		}
	}
}
?>
