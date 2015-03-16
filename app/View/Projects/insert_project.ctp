
	<div class="Insert Project Form">
		
		<?php echo $this->Form->create('Project');?>
		<legend><?php echo __(''); ?></legend>	
		<div id="name"><?php echo $this->Form->input('name');?></div>
		<div id="description"><?php echo $this->Form->input('description');?></div>
		<div id="start_date"><?php echo $this->Form->input('start_date');?></div>
		<div id="end_date"><?php echo $this->Form->input('end_date');?></div>
		<?php echo $this->Form->end('Save ');?>
			
	</div>
