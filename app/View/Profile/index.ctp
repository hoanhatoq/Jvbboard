<div class="Profile form">
<?php echo $this->Form->create('Profile'); ?>	
	<legend><?php echo __(''); ?></legend>	
	<?php echo $this->Form->input('user_id', array('type'=>'hidden')); ?>

	<div id="email"><?php echo $this->Form->input('email_add'); ?></div>	
	<div id="nickname"><?php echo $this->Form->input('nickname'); ?></div>
	<div id="fullname"><?php echo $this->Form->input('fullname'); ?></div>
	
	<div id="team"><?php echo $this->Form->input('team_id', array('label' => 'Team <br>', 'options' => $teams, 'selected' => $selected)); ?></div>

	<div id="slogan"><?php echo $this->Form->input('slogan'); ?></div>
	
	<?php echo $this->Form->input('role_id', array('type'=>'hidden')); ?>
	<?php echo $this->Form->input('status', array('type'=>'hidden')); ?>
	<?php echo $this->Form->input('create_time', array('type'=>'hidden')); ?>
	<?php echo $this->Form->input('update_time', array('type'=>'hidden')); ?>
<?php echo $this->Form->end(__('Save')); ?>
</div>
