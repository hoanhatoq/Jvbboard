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
		echo $this->Html->css('jquery-ui');
		echo $this->Html->css('bootstrap');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->Html->script('jquery-2.1.1.js');
		echo $this->Html->script('jquery-ui.js');
		
		
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
	            <span style="  padding-top: 25px;margin-left: 25px;display: inline-block;font-weight: 600;font-size: 14px;">Bring you a distinctive solution</span>
				<span style="  float: right;margin-top: 52px;"><?php //echo "Today: " . date("l")." - "; echo date("d/m/20y"); ?></span></br>
			</div>
			<div id="right-header">
				<?php if(AuthComponent::user()){echo AuthComponent::user('slogan');}?>
			</div>
				<div  >
					<ul id="accordion" >
							<li class= "menu-li" >
								<div class="link"><?php if(AuthComponent::user()){echo AuthComponent::user('fullname');}?></div>
								<ul class="submenu">
									<li>
										<?php echo $this->Html->link(__('Profile'), array('controller' => 'profile', 'action' => 'index')); ?>
									</li>
									<li>
										<?php echo $this->Html->link(__('Users'), array('controller' => 'Users', 'action' => 'index')); ?>
									</li>
									<li>	
										<?php echo $this->Html->link(__('Times'), array('controller' => 'manageTimes', 'action' => 'index')); ?>
									</li>
									<li>	
										<?php echo $this->Html->link(__('Team'), array('controller' => 'team', 'action' => 'index')); ?>
									</li>
									<li>	
										<?php echo $this->Html->link(__('Projects'), array('controller' => 'projects', 'action' => 'index')); ?>
									</li>
									<li >
									<?php if(AuthComponent::user()){echo $this->Html->link('Logout',array('controller' => 'Users', 'action' => 'logout'));}?>
								</li>	
								</ul>		
								
							</li>	
							
					</ul>			
				</div>	
		
		</div>
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>


	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
  	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  	<link rel="stylesheet" href="/resources/demos/style.css"> 
	<script>
		$(function() {
			var Accordion = function(el, multiple) {
				this.el = el || {};
				this.multiple = multiple || false;
				// Variables privadas
				var links = this.el.find('.link');
				// Evento
				links.on('click', {el: this.el, multiple: this.multiple}, this.dropdown)
			}
			Accordion.prototype.dropdown = function(e) {
				var $el = e.data.el;
					$this = $(this),
					$next = $this.next();
				$next.slideToggle();
				$this.parent().toggleClass('open');

				if (!e.data.multiple) {
					$el.find('.submenu').not($next).slideUp().parent().removeClass('open');
				};
			}	
			var accordion = new Accordion($('#accordion'), false);
		});
	</script>
	
		<div id="footer">
				<?php echo $general['footer'] ;?>
				
		</div>
		
	
</body>
		
</html>
