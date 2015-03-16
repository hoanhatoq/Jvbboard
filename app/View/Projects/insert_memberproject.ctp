<div class="Insert MemberProject">
	<?php echo $this->Form->create('Userproject');?>
		<legend><?php echo __(''); ?></legend>	
		<div id="Member"><?php echo $this->Form->input('memberName');?></div>
		<?php echo $this->Form->input('roleName',array('type'=>'hidden')  );?>
		<?php echo $this->Form->input('project_id',array('type'=>'hidden'));?>
		<?php echo $this->Form->input('create_time', array('type'=>'hidden')); ?>
		<?php echo $this->Form->input('update_time', array('type'=>'hidden')); ?>
		<?php echo $this->Form->end('Save ');?>


</div>