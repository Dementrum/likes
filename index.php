<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<title>Лайки и дизлайки на сайте</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<?php
		require "lib/db_connection.php";
		
		$userId = 6;
	
		$sql = mysql_query("SELECT * FROM `news`") or die(mysql_query());
		$news = array();
		while($r = mysql_fetch_array($sql, MYSQL_ASSOC)){
			$news[] =$r;
		}
	?>
	<div class="row">
		<?php foreach($news as $oneNews){ ?>
		<div class="col-sm-6">
			<div class="card">
				<input type="hidden" id="id_user" value="<?= $userId;?>">
				<div class="card-body">
					<h5 class="card-title"><?= $oneNews['title']; ?></h5>
					<p class="card-text"><?= $oneNews['small_text']; ?></p>
					<span class="btn btn-primary" id="like"><i class="far fa-thumbs-up"> like </i><b> <?= $oneNews['count_like']?></b></span>
					<span class="btn btn-primary" id="dislike"><i class="far fa-thumbs-down"> dislike</i><b> <?= $oneNews['count_dislike']?></b></span>
					<input type="hidden" id="id_news" value="<?= $oneNews['id']?>">
				</div>
			</div>
		</div>
		<?php } ?>
	</div>
	<script src="js/jquery-1.8.3.min.js"></script>
	<script src="js/main.js"></script>
</body>
</html>