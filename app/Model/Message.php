<?php
App::uses('AppModel', 'Model');

/**
 * @author Nguyễn Duy Linh
 */

class Message extends AppModel{
	/**
	 * Tên bảng trong cơ sở dữ liệu
	 */
	public $useTable = 'message_tbl';

	/**
	 * Tên trường khóa chính của bảng
	 */
	public $primaryKey = 'message_id';

	/**
	 * Lấy từng message theo yêu cầu previous trên trang daily message
	 * 
	 * @param $position: lấy bản ghi thứ mấy
	 * @return Nội dung message
	 */
	public function getPreviousMessage($position){		
		return $this->find('first', array(
										'conditions' =>(
											'Message.type=1'
										),										
										'fields' => array(
											'Message.*'
										),										
										'order' => array(
											'Message.create_time DESC'
										),
										'limit' => 1,
										'offset' => $position
									));
	} 
}