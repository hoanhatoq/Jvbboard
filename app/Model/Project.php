<?php
 App::uses('AppModel', 'Model');

 class Project extends AppModel{
 	//name of table in database
 	public $useTable = 'project_tbl';

 	// pprimary key of table
 	public $primaryKey = 'project_id';

 	//check validation
 	public $validate = array(
		'name' => array(
                'rule1' => array(
                    'rule' => 'notEmpty',
                    'message' => 'Hãy nhập vào ten Project !'
                )
                
        ),		
		'description' => array(
			'rule' => array('between', 0, 5000),
			'message' => 'Description không quá 50 ký tự'
		),
		
	);
	
 	// check Exits project in database
 	public function isNameProjectExits($name_project){
 		$sql= "select name from project_tbl where name='$name_project'";
 		$this->query($sql);
 		if($this->getNumRows()==0){
 			return false;
 		}
 		else{
 			return true;
 		}
 	}
 	public function getTeams(){              
		$db = $this->getDataSource();       
		$qry = 'SELECT Team.team_id, Team.name  FROM  team_tbl  AS Team WHERE 1';
		$res = $db->query($qry);				
		return $res;
	}
	public function getMembers(){
		$db=$this->getDataSource();
		$qry= 'SELECT Mem.user_id,Mem.username FROM user_tbl as Mem where 1 ';
		$res= $db->query($qry);
		return $res;
	}

 }