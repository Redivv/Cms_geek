<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Moja strona</title>
		<!-- moje pliki -->
		<link rel="stylesheet" href="/css/main.css" />
	</head>
	<body>
		<?php echo $this->element('header');?>  <!-- wklejenie elementu -->
		<?php echo $this->Flash->render(); ?>

		<?php echo $this->fetch('content'); ?>
		<?php echo $this->element('footer');?>
	</body>
</html>
