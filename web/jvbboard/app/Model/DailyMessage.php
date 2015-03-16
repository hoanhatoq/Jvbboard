<?php 
App::uses('AppModel', 'Model');

/**
 * @author Nguyễn Duy Linh, Hà Mạnh Linh
 *
 */

class DailyMessage extends AppModel{

	/**	 
	 * Tên bảng trong cơ sở dữ liệu
	 */
	public $useTable = 'daily_message_tbl';

	/**	 
	 * Tên trường khóa chính của bảng
	 */
	public $primaryKey = 'daily_message_id';
	
	/**
	 * Định nghĩa quan hệ belongsTo của bảng daily_message_tbl với bảng user_tbl
	 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'type' => 'RIGHT'
		)
	);

	/**
	 * Cập nhật daily message
	 * 
	 * @param $data : chứa user_id của người đăng message và nội dung message
	 * @param $cuser : thông tin user hiện đăng nhập
	 */

	public function update($data, $cuser){
		$db = $this->getDataSource();
		$chk = $this->find('first', array(
										'conditions' => array(
											'DailyMessage.user_id' => $data['user_id']											
										) 
									));

		if($cuser['role'] === 'ADMINISTRATORS'){
			if($cuser['user_id'] === $data['user_id']){
				if($chk==null){
					$qry = "INSERT INTO daily_message_tbl 
							(daily_message_id, user_id, message, type, create_time, update_time) 
							VALUES (uuid(), :user_id, :message, 1, now(), now())";
				}
				else{
					$qry = "UPDATE daily_message_tbl 
							SET message = :message, update_time = now() 
							WHERE user_id= :user_id";
				}
			}else{
				if($chk==null){
					$qry = "INSERT INTO daily_message_tbl 
							(daily_message_id, user_id, message, type, create_time, update_time) 
							VALUES (uuid(), :user_id, :message, 3, now(), now())";
				}
				else{
					$qry = "UPDATE daily_message_tbl 
							SET message = :message, update_time = now() 
							WHERE user_id= :user_id";
				}
			}		
		}

		if($cuser['role'] === 'MANAGERS'){
			if($cuser['user_id'] === $data['user_id']){
				if($chk==null){
					$qry = "INSERT INTO daily_message_tbl 
							(daily_message_id, user_id, message, type, create_time, update_time) 
							VALUES (uuid(), :user_id, :message, 2, now(), now())";
				}
				else{
					$qry = "UPDATE daily_message_tbl 
							SET message = :message, update_time = now() 
							WHERE user_id= :user_id";
				}
			}else{
				if($chk==null){
					$qry = "INSERT INTO daily_message_tbl 
							(daily_message_id, user_id, message, type, create_time, update_time) 
							VALUES (uuid(), :user_id, :message, 3, now(), now())";
				}
				else{
					$qry = "UPDATE daily_message_tbl 
							SET message = :message, update_time = now() 
							WHERE user_id= :user_id";
				}
			}			
		}

		if($cuser['role'] === 'MEMBERS' || $cuser['role'] === 'LEADERS'){			
			if($chk==null){
				$qry = "INSERT INTO daily_message_tbl 
						(daily_message_id, user_id, message, type, create_time, update_time) 
						VALUES (uuid(), :user_id, :message, 3, now(), now())";
			}
			else{
				$qry = "UPDATE daily_message_tbl 
						SET message = :message, update_time = now() 
						WHERE user_id= :user_id";
			}
		}	

		$res = $db->query($qry, $data);	
	}

	/**
	 * Lấy daily message của tất cả user	 
	 *
	 * @return tất cả daily message ứng với từng user, thông tin của user
	 */
	public function getMessages (){
		return $this->find('all', array(
									'recursive' => 2,
									'conditions' => array(
										'User.status' => 1,										
									),
									'fields' => array(
										'DailyMessage.*',
										'User.*',
									),
									'order' => array(
										'User.fullname ASC'
									),
								));
	}	
}
?>
