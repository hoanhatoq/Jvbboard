<h1>Show Member</h1>
<center>
<h2>SEARCH MEMBER</h2>
	<?php    
        //tao form tim kiem
    echo $this->Form->create('Member',array('controller'=>'Members','action'=>'indexmember'));
    echo $this->Form->input('username', array('label'=>'Username'));
    echo $this->Form->input('name',array('label' => 'NameProject'));
    echo $this->Form->end('Search');
?>
</center>

<table border="1">
	<tr>
		<th>NameProject</th>
		<th>UserName</th>
		<th>Create_Time</th>
		<th>Update_Time</th>
		<th>
				<a id = "autoClick" class="btn btn-primary">Delete</a>
	
		</th>
	</tr>			
	<?php foreach ($members as $member):?>
	<tr>
		<td> 
			<?php echo $member['Project']['name'];?>
		</td>
		<td>
			<?php echo $member['User']['username']; ?>
		</td>
		<td> 
			<?php echo $member['Member']['create_time'];?>
		</td>
		<td> 
			<?php echo $member['Member']['update_time'];?>
		</td>
		<td>
			<?php
			echo $this->Form->create('Member',array('action'=>'deletemember')); 
			?>
    		<input type="checkbox" name="id[]" multiple="checkbox" value="<?php echo $member['Member']['member_project_id']; ?>">

		</td>
	</tr>
	<?php endforeach; ?>
	<?php
	echo $this->Form->button('submit',array('id'=>'delete','style'=>'display:none;'));
	echo $this->Form->end();
	  ?>
	<?php unset($member);?>		
	
</table>

<?php echo $this->Html->link('AddMember', array('controller'=>'Members', 'action'=>'addmember'));?>

<script type="text/javascript">
  $(document).ready(function(){
    $("#autoClick").click(function(){
      $("#delete").trigger('click');
    });
  });
</script>
