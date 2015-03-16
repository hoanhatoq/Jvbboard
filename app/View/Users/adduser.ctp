<h1><b>Add User<b></h1>
<?php echo $this->Form->create('User');?>
<legend><?php echo __(''); ?></legend>	 
<div><?php echo $this->Form->input('username'); ?></div>
<div><?php echo $this->Form->input('password');?></div>
<div><?php echo $this->Form->input('email_add');?></div>
<div><?php echo $this->Form->input('fullname');?></div>
<div><?php echo $this->Form->input('nickname');?></div>
<div><?php echo $this->Form->input('slogan');?></div>
<div>
	<?php echo $this->Form->input('team_id', array('label' => 'Team', 'options' => $newteam));?>
</div>
<div>
	<?php echo $this->Form->input('role_id', array('label' => 'Role', 'options' => $newrole));?>
</div>
<BR>
<div width="150"> <?php echo $this->Form->end('SAVE POST');?></div>	

	
