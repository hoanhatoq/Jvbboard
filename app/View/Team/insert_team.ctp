<div class="InsertTeam Form">
		
		<?php echo $this->Form->create('Team');?>
		<legend><?php echo __(''); ?></legend>	
		<div id="name"><?php echo $this->Form->input('name');?></div>
		<div id="slogan"><?php echo $this->Form->input('slogan');?></div>
		<?php echo $this->Form->end(__('Save '));?>
			
	</div>
