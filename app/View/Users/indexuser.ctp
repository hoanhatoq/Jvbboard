
<h1>Show User</h1>
<center>
<h2>SEARCH USER</h2>
	<?php    
        //tao form tim kiem
    echo $this->Form->create('User',array('controller'=>'Users','action'=>'indexuser'));
    echo $this->Form->input('username', array('label'=>'Username'));
    echo $this->Form->end('Search');
 
        //xuat ket qua tim kiem 
    /*if(!empty($user)){
        foreach($users as $user){
            echo "<div>";
            echo "Username: ".$user['User']['username'].'</br>';
            echo "Email: ".$user['User']['email_add'];
            echo "</div>";
            echo "</br>";
        }
    }*/
?>
</center>


<table border="1">
	<tr>
		<th>TeamId</th>
		<th>UserName</th>
		<th>EmailAdd</th>
		<th>FullName</th>
		<th>NickName</th>
		<th>Slogan</th>
		<th>Role</th>
		<th>Action</th>
	</tr>
	<?php foreach ($users as $user) :?>
	<tr>
		<!-- show user-->
		<td> 
			<?php echo $user['Team']['name'];?>
		</td>
		<td> 
			<?php echo $user['User']['username'];?>
		</td>
		<td> 
			<?php echo $user['User']['email_add'];?>
		</td>
		<td> 
			<?php echo $user['User']['fullname'];?>
		</td>
		<td> 
			<?php echo $user['User']['nickname'];?>
		</td>
		<td> 
			<?php echo $user['User']['slogan'];?>
		</td>
		<td> 
			<?php echo $user['Role']['value'];?>
		</td>
		<td>
			<?php  
				echo $this->Form->postLink('DeleteUser',array('action'=>'deleteuser',$user['User']['user_id']),array('comfirm'=>'Are you sure ?')).'&nbsp&nbsp&nbsp&nbsp';

				echo $this->Form->postLink('UpdateUser', array('action'=>'updateuser',$user['User']['user_id']));

			?>
			
		</td>

	</tr>

<?php endforeach; ?>
<?php unset($user);?>
</table>

<?php echo $this->Html->link('AddUser', array('controller'=>'Users', 'action'=>'adduser'));?>