
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trabalho teste Table</title>
	<link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<!-- <link rel="stylesheet" href="style.css"> -->
</head>
<body>
<header class="container-header">
	<h1>Hello</h1>
</header>
<div id="container">
		
	

			<?php echo $this->Flash->render(); ?>

			<?php echo $this->fetch('content'); ?>
		
	
</div
<?php echo $this->Html->script('jquery-3.7.1.min.js'); ?>

<?php echo $this->Html->css('cake.novolayout'); ?>
<?php echo $this->Js->writeBuffer(); ?>
</body>
</html>

