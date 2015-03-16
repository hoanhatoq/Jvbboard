<div class="EditTeam From">
		<h1>Edit Team</h1>
		<?php echo $this->Form->create('Team'); ?>
		<?php echo $this->Form->input('team_id', array('type'=>'hidden')); ?>
		<?php echo $this->Form->input('leader', array('type'=>'hidden')); ?>							
		<div id="name"><?php echo $this->Form->input('name');?></div>
		<div id="slogan"><?php echo $this->Form->input('slogan');?></div>
		<?php echo $this->Form->input('create_time', array('type'=>'hidden')); ?>
		<?php echo $this->Form->input('update_time', array('type'=>'hidden')); ?>
		<?php echo $this->Form->end(__('Save '));?>
</div>

