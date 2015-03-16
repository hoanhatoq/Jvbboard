<div class="EditPro">
		<h1><b>Edit Project</b></h1>
		<?php echo $this->Form->create('Project'); ?>
		<?php echo $this->Form->input('project_id', array('type'=>'hidden')); ?>		
		<div id="name"><?php echo $this->Form->input('name');?></div>		
		<div id="description"><?php echo $this->Form->input('description');?></div>
		<div id="start_date"><?php echo $this->Form->input('start_date');?></div>
		<div id="end_date"><?php echo $this->Form->input('end_date');?></div>
		<?php echo $this->Form->input('status', array('type'=>'hidden')); ?>
		<?php echo $this->Form->input('create_time', array('type'=>'hidden')); ?>
		<?php echo $this->Form->input('update_time', array('type'=>'hidden')); ?>
		<?php echo $this->Form->end(__('Save '));?>
</div>

