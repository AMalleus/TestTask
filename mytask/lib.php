<?php
function printNewsTable($table) {
        printf ("id: %d<br>title: %s<br>annonce: %s<br>text: <br>%s<br>author: %s<br>headings (tags): <br>%s<br>",
        $table['id'],$table['title'],$table['annonce'],$table['text'], $table['author'], $table['headings']);
}


function doNewsParsing ($row) {
	global $connect;
	$temp = $row['author'];
        $sql = "SELECT * FROM authors WHERE id ='{$temp}'";
        $res = mysqli_query($connect, $sql );
        $temp = mysqli_fetch_assoc($res);
        $row['author']=$temp['name'];
        //headings by ids
        $temp = $row['headings'];
        str_replace(" ","",$temp);
        $ids = explode(",",$temp);
        $temp = "";
        for ($i=0; $i<count($ids); ++$i) {
                $temp = $temp . $ids[$i];
                if ($i != count($ids)-1) {
                        $temp = $temp . " OR id = ";
                }
        }
        $sql = "SELECT * FROM headings WHERE id =" . $temp;
        $res = mysqli_query($connect, $sql );
        $headingsrow = array();
        while($temp = mysqli_fetch_assoc($res)) {
                array_push($headingsrow,$temp);
        }
        $row['headings']="";
        for ($i=0; $i<count($ids); ++$i) {
                $row['headings'] .=$headingsrow[$i]['name'] . "<br>\n";
        }
	return $row;
        //printNewsTable($row);
}
?>
