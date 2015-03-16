<div class="GetInfoProject">
	<table border ="1" >
		<tr>
			<th>Name</th>
			<td><div class="name"><?php echo h($infoProject['Project']['name']);?></div></td>
		</tr>
		<tr>
			<th>Description</th>
			<td><div class=" description"><?php echo h($infoProject['Project']['description']);?></div></td>
		</tr>
		<tr>
			<th>Start_date</th>
			<td><div class="start_date"><?php echo h($infoProject['Project']['start_date']);?></div></td>
		</tr>
		<tr>
			<th>End_date</th>
			<td><div class="end_date"><?php echo h($infoProject['Project']['end_date']);?></div></td>
		</tr>
		
	</table>
	
	<?php echo $this->html->link('Back','index');?>
	<?php echo $this->Html->link('Update',array('action' => 'updateUser', $infoProject['Project']['project_id']));?>
    
</div>