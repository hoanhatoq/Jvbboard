<html>
	<head>
		<title>JVB Login Page</title>
		<?php echo $this->Html->css("login"); ?>
		<meta http-equiv="content-type" content="text/html;charset=UTF-8" />		 
	</head>
	<body>
		<div id="form">
			<div id="h1">JVB Account System</div>
				<?php echo $this->Form->create('User'); ?>
				
				<div class="name"><?php echo $this->Form->input('username'); ?></div>
				<div class="pass"><?php echo $this->Form->input('password'); ?></div>
				<div class="check">
					<?php echo $this->Form->checkbox('keeplogin')."Keep Login"; ?>
				</div>
				<div id="button"><?php echo $this->Form->end('Login');?></div>
				<span style="color:red"><?php echo $error ?></span>
		</div>
	</body>
</html>