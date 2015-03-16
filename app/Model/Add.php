<?php

App::uses('AppModel', 'Model');

class Them extends AppModel
{

	public $useTable = 'user_tbl';

	public $primaryKey = 'user_id';

	//test data input
	public $validate = array('email_add' => array('rule' => array('email'), 'message' => 'Email invalid'),'slogan' => array(
            'rule' => array('between', 0, 50),
            'message' => 'Slogan no more than 50 '));

	// get list team
	public function getTeams()
	{
		$db = $this->getDataSource();
		$qry = 'SELECT Team.team_id, Team.name FROM team_tbl AS Team WHERE 1';
		$res = $db->query($qry);
		return $res;
	}

	//get user_id of team
	public function getTeam($user_id)
	{
		$team = $this->find('first', array('conditions' => array('Them.user_id' => $user_id,),'fields' => array('Them.team_id')));	
		return ($team!=null) ? $team['Them']['team_id'] : null;
	}
}
