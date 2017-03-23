<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if (isset($_POST['btnNewsById'])) {
		$id = $_POST['newsId'];
	      	header("location: http://localhost/getnews.php?id=$id");
	}
	if (isset($_POST['btnback'])) {
	        header("location: http://localhost");
	}
	if (isset($_POST['btnNewsByLabel'])) {
                $label = $_POST['newsLabel'];
                header("location: http://localhost/getnewslabel.php?label=$label");
        }
	exit;
}
?>
