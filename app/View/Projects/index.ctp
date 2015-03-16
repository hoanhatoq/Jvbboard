<div class="index">
	<table border= "1" >
		<tr>
			<th>Name</th>
			<th>Description</th>
			<th>Option</th>
		</tr>
	  		<?php foreach ($Use_project as $info) : ?>
	  	<tr>	
	  		<td >
            	<?php echo $this->Html->link($info['Project']['name'],array('controller' => 'Projects', 'action' => 'getProject', $info['Project']['project_id'])); ?>

        	</td>

	  		
        	<td><?php echo h($info['Project']['description']); ?></td>	
        	 <td><?php echo $this->Form->postLink('Delete',array('action' => 'deletePro', $info['Project']['project_id']),
                    array('confirm' => 'Are you sure?'));?>
                    <?php echo $this->Html->link('Update',array('controller'=>'Projects', 'action' => 'updateProject',
            $info['Project']['project_id']));?> 
			<?php 
                echo $this->Html->link('Insert Member',array('controller'=>'Projects', 'action' => 'insertMemberproject',$info['Project']['project_id']));?>

             </td>		
	  	</tr>	
		<?php endforeach; ?>
    	</table>
    	<?php echo $this->Html->link('Insert Project',array('controller'=>'Projects', 'action' => 'insertProject',
    							 $info['Project']['project_id']));?>

    	
    	<?php unset($info); ?>
    	
    
</div>
