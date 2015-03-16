
<h1>Update User</h1>

<?php echo $this->Form->create('User');?>

<div>
	<?php echo $this->Form->input('username');?>
</div>
<div>
	<?php echo $this->Form->input('password');?>
</div>
<div>
	<?php echo $this->Form->input('email_add');?>
</div>
<div>
	<?php echo $this->Form->input('fullname');?>
</div>
<div>
	<?php echo $this->Form->input('nickname');?>
</div>
<div>
	<?php echo $this->Form->input('slogan',array('row'=>'3'));?>
</div>
<div>
	<?php echo $this->Form->input('team_id', array('label' => 'Team', 'options' => $newteam));?>
</div>
<div>
	<?php echo $this->Form->input('role_id', array('label' => 'Role', 'options' => $newrole));?>
</div>
<div> <?php echo $this->Form->end('SAVE USER');?> </div>


