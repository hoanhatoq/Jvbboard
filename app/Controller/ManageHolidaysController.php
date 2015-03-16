<?php
App::uses('AppController', 'Controller'); 

/**
 * @author Đỗ Văn Quân
 *
 */

class ManageHolidaysController extends AppController{
	
	/**
	 * Danh sách các helper được sử dụng
	 */

	var $helpers = array("Html","Form");

	public function addholiday(){
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$post = $this->request->data;
		if($this->Auth->login()){
			$user = $this->Auth->user();
			if(!empty($post)){
				$holiday = array(
					'user_id' => $user['user_id'],
					'number_day' => $post['ManageHoliday']['number_day'],
					'reason' => $post['ManageHoliday']['reason'],
					'status' => 0,
					'created' => date('Y-m-d')
					);
				if($this->ManageHoliday->save($holiday)){
					$this->redirect(array('controller'=>'ManageTimes','action'=>'index'));
				}
			}
		}
	}

	public function sendrequest($created){
		if($this->Auth->login()){
			$user = $this->Auth->user();
			if(!empty($created)){
				if($this->request->data){
					$object = $this->request->data;
					$holiday = array(
						'user_id' => $user['user_id'],
						'number_day' => $object['ManageHoliday']['number_day'],
						'reason' => $object['ManageHoliday']['reason'],
						'status' => 0,
						'created' => $created
						);
					if($this->ManageHoliday->save($holiday)){
						$this->redirect(array('controller'=>'ManageTimes','action'=>'index'));
					}
				}
			}
		}
	}

}
