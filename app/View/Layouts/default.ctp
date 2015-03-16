<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php $general = $this->Common->general(); ?>

	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');
		echo $this->Html->css('jvbboard');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		// echo $this->fetch('script');
		echo $this->Html->script('jquery-2.1.1.js');
	?>	
</head>
<body>
	<div id="container">
		<div id="header">
			<div id="logo">
		        <?php $url =  Router::url('/');?>
		        <a href="<?php echo $url ?>DailyMessages/index">
		            <img src="<?php echo $url ?>img/logo_JVB.png" alt="">
		        </a>
			</div>
			<div id="mid-header">
	            <span style="  padding-top: 25px;margin-left: 5px;display: inline-block;font-weight: 600;font-size: 14px;">Bring you a distinctive solution</span>
				<span style="  float: right;margin-top: 52px;"><?php echo "Today: " . date("l")." - "; echo date("d/m/20y"); ?></span></br>
			</div>
			<div id="right-header">Have a nice day !
				<div id='cssmenu'>
					<li class='active has-sub'>
					
						<?php
							if(AuthComponent::user()){
								echo AuthComponent::user('username');
							}
						?>
					
					<ul>
						<li class='has-sub'>
						<?php echo $this->Html->link(__('Profile'), array('controller' => 'profile', 'action' => 'index')); ?>
						<?php echo $this->Html->link(__('Users'), array('controller' => 'Users', 'action' => 'indexuser')); ?>
						<?php echo $this->Html->link(__('Members'), array('controller' => 'members', 'action' => 'index')); ?>
						<?php echo $this->Html->link(__('ManageTimes'), array('controller' => 'manageTimes', 'action' => 'index')); ?>
						<?php echo $this->Html->link(__('Projects'), array('controller' => 'projects', 'action' => 'index')); ?>

						</li>
						<li class='has-sub'>
								<?php 
									if(AuthComponent::user()){
										echo $this->Html->link('Logout',array('controller' => 'Users', 'action' => 'logout'));
									}
									else{
										//echo $this->Html->link('Login',array('controller' => 'Users', 'action' => 'login'));
									}
								?>
						</li>
					</ul>
					</li>
				</div>
			</div>
			
		</div>


		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
				<?php echo $general['footer'] ?>
		</div>		
	</div>
</body>
</html>
