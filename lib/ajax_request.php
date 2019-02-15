<?php
	require_once "db_connection.php";

	$error = false;

	$userId = (int) $_POST['id_user'];
	$userId = (int) $_POST['id_news'];
	$type = $_POST['type'];


	$sql = mysql_query("SELECT count(*) FROM `votes_news2user` WHERE `id_user` = $userId AND `id_news` = $newsId") or die(mysql_error());
	$result = mysql_fetch_array($sql);

	