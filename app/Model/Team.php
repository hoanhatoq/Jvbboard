<?php
App::uses('AppModel', 'Model');

/**
 * @author Nguyễn Duy Linh
 */

class Team extends AppModel{
	/**
	 * Tên bảng trong cơ sở dữ liệu
	 */
	public $useTable = 'team_tbl';

	/**
	 * Tên khóa chính của bảng
	 */
	public $primaryKey = 'team_id';

	/**
	 * Định nghĩa quan hệ hasMany giữa bảng team_tbl và bảng team_member_tbl
	 */
	public $hasMany = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'team_id',
		)
	);
	
	
	public $validate = array( 
		'name' => array(
            'rule' =>'notEmpty',
            'message' => 'Hãy nhập tên Team'
        ),
		'slogan' => array(
            'rule' => array('between', 0, 50),
            'message' => 'Slogan không quá 50 ký tự'
        )
	);
	public function isTeamAddExits($name_add){
    	$sql= "select name from team_tbl where name='$name_add'";
    	$this->query($sql);
    	if($this->getNumRows()==0){
    		return false;
    	}
    	else{
    		return true;
    	}
    }
}