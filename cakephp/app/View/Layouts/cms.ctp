<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Moja strona</title>
		<!-- moje pliki -->
		<link rel="stylesheet" href="/css/cms.css" />
	</head>
	<body>
		<div class="left">
			Tu będzie menu
			<a href="/admin/dashboard">Dashboard</a>
			<a href="/admin/news">Newsy</a>
			<a href="/admin/contacts">Kontakty</a>
			<div class="clearfix"></div>
		</div>
		<div class="right">
			<?php echo $this->Flash->render(); ?>

			<?php echo $this->fetch('content'); ?>
			<div class="clearfix"></div>
		</div>
	</body>
</html>
