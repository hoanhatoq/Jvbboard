<!-- add project -->

<h1>Add Member</h1>
<?php echo $this->Form->create('Member'); ?>
<div>
	<?php echo $this->Form->input('project_id',array('label' => 'nameproject', 'options' => $newproject));?>
	</div>
	<div>
		<?php 
			
			echo $this->Form->input('user_id', array('type' => 'select', 'multiple' => true,'size' => '6', 'options' => $newuser));
		?>
	</div>
	<div width="150">
		<?php 
			echo $this->Html->link(
			    'Back Index',
			    array(
			        'controller' => 'Members',
			        'action' => 'index',
			    ),
			    array('class' => 'back')
			);
		?>
	</div>
<div>
	<?php echo $this->Form->end('Add Member') ;?>
</div>

