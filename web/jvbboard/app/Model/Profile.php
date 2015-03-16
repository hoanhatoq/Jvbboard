<?php
/**
 * @author Đỗ Tùng
 *
 */

App::uses('AppModel', 'Model');

class Profile extends AppModel{
	/**	 
	 * Tên bảng trong cơ sở dữ liệu
	 */
	public $useTable = 'user_tbl';

	/**	 
	 * Tên trường khóa chính của bảng
	 */
	public $primaryKey = 'user_id';

	/**	 
	 * Điều kiện kiểm tra dữ liệu
	 */
	public $validate = array(       
		'email_add' => array(
            'rule' => array('email'),
            'message' => 'Email không đúng'
        ),
		'slogan' => array(
            'rule' => array('between', 0, 50),
            'message' => 'Slogan không quá 50 ký tự'
        )
	);

	/**
	 * Lấy danh sách các Team
	 * 
	 * @return danh sách các team
	 */
	public function getTeams(){
		$db = $this->getDataSource();
		$qry = 'SELECT Team.team_id, Team.name FROM team_tbl AS Team WHERE 1';
		$res = $db->query($qry);				
		return $res;
	}

	/**
	 * Lấy team_id của user
	 * 
	 * @return danh sách các team
	 */
	public function getTeam($user_id){
		$team = $this->find('first', array(
									'conditions' => array(
										'Profile.user_id' => $user_id,										
									),
									'fields' => array(
										'Profile.team_id'
									)
								));	
		return ($team!=null) ? $team['Profile']['team_id'] : null;
	}
}