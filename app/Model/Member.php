<?php 

	/**
	* 
	*/
	class Member extends AppModel{
		
		public $useTable = 'member_project_tbl';

		public $primaryKey = 'member_project_id';



		public $validate = array(

			'name'=>array(
			'rule1'=>array(
				'rule'=>'notEmpty',
				'message'=>'Hãy nhập vào name',
				),
			'rule2'=>array(
				'rule'=>array('maxLength',16),
				'message'=>'Độ dài của tên project không quá 16 kí tự',
				),
			),
			'username'=>array(
				'rule1'=>array(
					'rule'=>'notEmpty',
					'message'=>'Hãy nhập vào username',
					),
				'rule2'=>array(
					'rule'=>array('maxLength',20),
					'message'=>'độ dài của username không được quá 20 ký tự',
					),
				),	
			);


		public $belongsTo = array(
			'User' => array(
				'className' => 'User',
				'foreignKey' => 'user_id',			
			),
			'Project' => array(
				'className' => 'Project',
				'foreignKey' => 'project_id',
			),
	 );


		public function getproject(){

		//getDataSource () nhan tham chieu object tu datasource
		$db = $this->getDataSource();

		$sql = 'SELECT Project.project_id,Project.name  FROM  project_tbl  AS Project';

		$result = $db->query($sql);
		
		return $result;
		
	}

	public function getuser(){
		$db = $this->getDataSource();

		$sql = "SELECT User.user_id,User.username  FROM  user_tbl  AS User";

		$result = $db->query($sql);
		return $result;
	}

/*	public function checkusername($user_id){
		$sql = "SELECT user_id FROM user_tbl where user_id='$user_id'";
		$this->query($sql);
		echo "<pre>";
		print_r($sql);
		echo "<pre>";
		if ($this->getNumRows() == 0) {
			return false;
		}else return true;
	}*/
	}
 ?>
	
