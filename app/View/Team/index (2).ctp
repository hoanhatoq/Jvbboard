<div class="index">
    <table  border=1>
        <tr>
            <th >name</th>
            <th >Slogan</th>
            <th >Option</th>
            
        </tr>   
        <?php foreach ($team_tbl as $team): ?>
        <tr>  
            <td><?php echo h($team['Team']['name']); ?></td>
            <td><?php echo h($team['Team']['slogan']); ?></td>
            <td>
                <?php echo $this->Form->postLink('Update',array('action' => 'updateTeam', $team['Team']['team_id'])
                    );?>
                <?php echo $this->Form->postLink('Delete',array('action' => 'deleteTeam', $team['Team']['team_id']),
                    array('confirm' => 'Are you sure?'));?>
            </td>
        </tr>    
            <?php endforeach; ?>
            <?php unset($team); ?>
    
    </table>
            <?php echo $this->Html->link('Insert Team',array('controller' => 'Team', 'action' => 'insertTeam')); ?>
</div>