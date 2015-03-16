<?php
App::uses('AppController', 'Controller'); 

/**
 * @author Đỗ Văn Quân
 *
 */

class ManageTimesController extends AppController{
	
	/*Sử dụng nhiều bảng trong cùng một controller*/
	var $uses = array('ManageTime','ManageHoliday','User');
	/**
	 * Danh sách các helper được sử dụng
	 */

	var $helpers = array("Html","Form");

	
	/**
	 * Xử lý login cho user, đúng user, password thì chuyển sang trang DailyMessage
	 * Nếu không thì thông báo lỗi
	 *	 	 
	 * @return void
	 */	

	public function index(){
		// $month = $_POST['month'];
		// echo $month;
		if($this->Auth->login()){

			//Lấy tháng hiện tại hoặc tháng được chọn.
			if($this->request->data){
				$monthCurrent = $this->request->data['ManageTime']['month'];
			}else{
				$monthCurrent = date('m');
			}

			//Lấy thông tin của user đang đăng nhập.
			$userId = $this->Auth->user();

			//Lay thong tin cua user dang dang nhap trong bang ManageTime
			$userInfo = $this->ManageTime->find('all',array(
				'conditions' => array(
					'AND' => array(
						array('ManageTime.user_id' => $userId['user_id']),
						array('MONTH(ManageTime.created)' => $monthCurrent),
						array('ManageTime.status' => 1)
						)
					
					)
				));			

			//lấy thông tin của bảng manageholiday thêm điều kiện status = 1 dể hiển thị thống kê của một tháng
			$userInfo2 = $this->ManageTime->find('all',array(
				'conditions' => array(
					'ManageTime.user_id' => $userId['user_id'],
					'MONTH(ManageTime.created)' => $monthCurrent
					)
				));

			if(!empty($this->Session->read('ManageTime.Id'))){
				$manageId = $this->Session->read('ManageTime.Id');
			}

			//lấy thông tin của bảng manageholiday
			$holiday = $this->ManageHoliday->find('all',array(
				'conditions' => array(
					'ManageHoliday.user_id' => $userId['user_id'],
					'MONTH(ManageHoliday.created)' => $monthCurrent
					)
				));

			//lấy thông tin những ngày đi làm muộn của bảng manageholiday
			$late = $this->ManageTime->find('all',array(
				'conditions' => array(
					'AND' => array(
						array('ManageTime.user_id' => $userId['user_id']),
						array('MONTH(ManageTime.created)' => $monthCurrent),
						array('ManageTime.status' => 1),
						array('ManageTime.late' => 1)
						)
					)
				));

			//lấy thông tin của bảng manageholiday thêm điều kiện status = 1 dể hiển thị thống kê của một tháng
			$holiday2 = $this->ManageHoliday->find('all',array(
				'conditions' => array(
					'ManageHoliday.user_id' => $userId['user_id'],
					'ManageHoliday.status' => 1
					)
				));

			//Lấy thông tin từ bảng user
			$listUser = $this->User->find('list',array(
				'fields' => array('User.user_id','User.username')
				));
	
			$this->set(compact('userId','userInfo','userInfo2','manageId','holiday','listUser','holiday2','monthCurrent','late'));
		}

	}

	public function displaydetail(){

		//Lấy thông tin của user đang đăng nhập.
		$roleId = $this->Auth->user();

		if($this->request->data){
			$this->Session->write('data',$this->request->data);
		}
		if($this->Session->check('data')){
			$post = $this->Session->read('data');
		}

		$this->Session->write('SelectId',$post['ManageTime']['user_id']);
		$username = $this->User->find('first',array(
			'conditions' => array(
				'User.user_id' => $post['ManageTime']['user_id']
				)
			));
		$listTime = $this->ManageTime->find('all',array(
			'conditions' => array(
				'ManageTime.user_id' => $post['ManageTime']['user_id'],
				'MONTH(ManageTime.created)' => date('m')
				)
			));

		$listHoliday = $this->ManageHoliday->find('all',array(
			'conditions' => array(
				'ManageHoliday.user_id' => $post['ManageTime']['user_id'],
				'MONTH(ManageHoliday.created)' => date('m')
				)
			));			

		$listHoliday2 = $this->ManageHoliday->find('all',array(
			'conditions' => array(
				'ManageHoliday.user_id' => $post['ManageTime']['user_id'],
				'MONTH(ManageHoliday.created)' => date('m'),
				'ManageHoliday.status' => 1
				)
			));

		//lấy thông tin những ngày đi làm muộn của bảng manageholiday
		$late = $this->ManageTime->find('all',array(
			'conditions' => array(
				'AND' => array(
					array('ManageTime.user_id' => $post['ManageTime']['user_id']),
					array('MONTH(ManageTime.created)' => date('m')),
					array('ManageTime.status' => 1),
					array('ManageTime.late' => 1)
					)
				)
			));

		//Lấy thông tin từ bảng user
		$listUser = $this->User->find('list',array(
			'fields' => array('User.user_id','User.username')
			));

		$this->set(compact('username','listTime','listHoliday','listHoliday2','late','listUser','roleId'));
	}

	public function viewmonths(){

		//Lấy thông tin của user đang đăng nhập.
		$roleId = $this->Auth->user();

		if($this->Session->check('SelectId')){
			$userId = $this->Session->read('SelectId');
		}

		if($this->request->data){
			$this->Session->write('data',$this->request->data);
		}
		if($this->Session->check('data')){
			$post = $this->Session->read('data');
		}

		$currentMonth = $post['ManageTime']['month'];

		$username = $this->User->find('first',array(
			'conditions' => array(
				'User.user_id' => $userId
				)
			));
		$listTime = $this->ManageTime->find('all',array(
			'conditions' => array(
				'ManageTime.user_id' => $userId,
				'MONTH(ManageTime.created)' => $post['ManageTime']['month']
				)
			));

		$listHoliday = $this->ManageHoliday->find('all',array(
			'conditions' => array(
				'ManageHoliday.user_id' => $userId,
				'MONTH(ManageHoliday.created)' => $post['ManageTime']['month']
				)
			));			

		$listHoliday2 = $this->ManageHoliday->find('all',array(
			'conditions' => array(
				'ManageHoliday.user_id' => $userId,
				'MONTH(ManageHoliday.created)' => $post['ManageTime']['month'],
				'ManageHoliday.status' => 1
				)
			));

		//lấy thông tin những ngày đi làm muộn của bảng manageholiday
		$late = $this->ManageTime->find('all',array(
			'conditions' => array(
				'AND' => array(
					array('ManageTime.user_id' => $userId),
					array('MONTH(ManageTime.created)' => $post['ManageTime']['month']),
					array('ManageTime.status' => 1),
					array('ManageTime.late' => 1)
					)
				)
			));

		//Lấy thông tin từ bảng user
		$listUser = $this->User->find('list',array(
			'fields' => array('User.user_id','User.username')
			));

		$this->set(compact('username','listTime','listHoliday','listHoliday2','currentMonth','late','listUser','roleId'));

	}

	public function accept($id){
		if(!empty($id)){
			$this->ManageHoliday->id=$id;
			if($this->ManageHoliday->saveField('status',1)){
				$this->redirect(array('action'=>'index'));
			}
		}
	}

	public function cancel($id){
		if(!empty($id)){
			$this->ManageHoliday->id=$id;
			if($this->ManageHoliday->saveField('status',2)){
				$this->redirect(array('action'=>'index'));
			}
		}
	}

	public function setting($created){
		if(!empty($created)){
			if(!empty($this->Session->read('time.id'))){
				$timeId = $this->Session->read('time.id');
			}
			$this->set(compact('created','timeId'));
		}
	}

	public function start($created){
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		if($this->Auth->login()){
			$user = $this->Auth->user();
			if(!empty($user)){
				$data = array(
					'user_id' => $user['user_id'],
					'username' => $user['username'],
					'start_time' => date('H:i:s'),
					'end_time' => 'chưa cập nhật',
					'total_time_of_day' => 'chưa cập nhật',
					'created' => date($created)
					);
				if($this->ManageTime->save($data)){

					//Lấy id của bản ghi vừa mới được lưu vào trong cơ sở dữ liệu
					$this->Session->write('time.id',$this->ManageTime->getLastInsertId());

					$object = $this->ManageTime->find('first',array(
						'conditions' => array(
							'ManageTime.manage_time_id' => $this->ManageTime->getLastInsertId()
							)
						));

					//Kiểm tra xem nhân viên có đi muộn hay không,nếu thời gian start mà lớn hơn thời gian quy định thì
					//cập nhật trường late = 1
					$date1 = "08:00:00";
					$date2 = $object['ManageTime']['start_time'];
					$timestamp1 = strtotime($date1);
					$timestamp2 = strtotime($date2);
					if($timestamp2 > $timestamp1){
						$this->ManageTime->id = $object['ManageTime']['manage_time_id'];
						$this->ManageTime->saveField('late',1);
					}

					$this->redirect(array('action'=>'index'));
				}
			}
		}
	}	

	public function end($timeId){
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		if(!empty($timeId)){

			$this->ManageTime->id=$timeId;
			if($this->ManageTime->saveField("end_time",date('H:i:s'))){

					$object = $this->ManageTime->find('all',array(
					'conditions' => array(
						'manage_time_id' => $timeId
						)
					));

					$firstTime = $object[0]['ManageTime']['start_time'];
					$firstTime = new DateTime($firstTime);

					$lastTime = $object[0]['ManageTime']['end_time'];
					 
					$last = new DateTime($lastTime);
					 
					$sinceThen = $firstTime->diff($last);

					//Đếm số ký tự của giờ,phút,giây,nếu có 1 ký tự thì thêm số 0 đằng trước,ví dụ: 8:02:2 -> 08:02:02
					$h = strlen($sinceThen->h);
					$i = strlen($sinceThen->i);
					$s = strlen($sinceThen->s);
					if($h<2){
						$h1 = '0'.$sinceThen->h;
					}else{
						$h1 = $sinceThen->h;	
					}
					if($i<2){
						$i1 = '0'.$sinceThen->i;
					}else{
						$i1 = $sinceThen->i;
					}	
					if($s<2){
						$s1 = '0'.$sinceThen->s;
					}else{
						$s1 = $sinceThen->s;
					}
					$total = $h1.$i1.$s1;

					$t = strtotime($total);
					$total_time = date('H:i:s',$t);

				if($this->ManageTime->saveField('total_time_of_day',$total_time)){
					$this->ManageTime->saveField('status',1);
					$this->Session->delete('time.id');
					$this->redirect(array('action'=>'index'));
				}
			}
		}
	}

	public function edittime($created){
		if($this->Session->check('SelectId')){
			$userId = $this->Session->read('SelectId');
		}
		if(!empty($created)){
			$object = $this->ManageTime->find('first',array(
				'conditions' => array(
					'ManageTime.user_id' => $userId,
					'ManageTime.created' => $created
					)
				));
			$this->set('editime',$object);
			if(!empty($object)){
				if($this->request->data){
					$this->ManageTime->id = $object['ManageTime']['manage_time_id'];
					if($this->ManageTime->saveField('start_time',$this->request->data['ManageTime']['start_time']) && $this->ManageTime->saveField('end_time',$this->request->data['ManageTime']['end_time'])){
						
						//Kiểm tra xem nhân viên có đi muộn hay không,nếu thời gian start mà lớn hơn thời gian quy định thì
						//cập nhật trường late = 1
						$date1 = "08:00:00";
						$date2 = $this->request->data['ManageTime']['start_time'];
						$timestamp1 = strtotime($date1);
						$timestamp2 = strtotime($date2);
						if($timestamp2 > $timestamp1){
							// $this->ManageTime->id = $object['ManageTime']['manage_time_id'];
							$this->ManageTime->saveField('late',1);
						}else{
							$this->ManageTime->saveField('late',0);
						}

						//tinh so thoi gian giua start tim va end time
						$firstTime = new DateTime($this->request->data['ManageTime']['start_time']);
						$lastTime = new DateTime($this->request->data['ManageTime']['end_time']);
						 
						$sinceThen = $firstTime->diff($lastTime);

						//Đếm số ký tự của giờ,phút,giây,nếu có 1 ký tự thì thêm số 0 đằng trước,ví dụ: 8:02:2 -> 08:02:02
						$h = strlen($sinceThen->h);
						$i = strlen($sinceThen->i);
						$s = strlen($sinceThen->s);
						if($h<2){
							$h1 = '0'.$sinceThen->h;
						}else{
							$h1 = $sinceThen->h;	
						}
						if($i<2){
							$i1 = '0'.$sinceThen->i;
						}else{
							$i1 = $sinceThen->i;
						}	
						if($s<2){
							$s1 = '0'.$sinceThen->s;
						}else{
							$s1 = $sinceThen->s;
						}
						$total = $h1.$i1.$s1;

						$t = strtotime($total);
						$total_time = date('H:i:s',$t);

						if($this->ManageTime->saveField('total_time_of_day',$total_time)){
							$this->redirect(array('action'=>'index'));
						}
					}
				}
			}else{
				if($this->request->data){

					//tinh so thoi gian giua start tim va end time
					$firstTime = new DateTime($this->request->data['ManageTime']['start_time']);
					$lastTime = new DateTime($this->request->data['ManageTime']['end_time']);
					 
					$sinceThen = $firstTime->diff($lastTime);

					//Đếm số ký tự của giờ,phút,giây,nếu có 1 ký tự thì thêm số 0 đằng trước,ví dụ: 8:02:2 -> 08:02:02
					$h = strlen($sinceThen->h);
					$i = strlen($sinceThen->i);
					$s = strlen($sinceThen->s);
					if($h<2){
						$h1 = '0'.$sinceThen->h;
					}else{
						$h1 = $sinceThen->h;	
					}
					if($i<2){
						$i1 = '0'.$sinceThen->i;
					}else{
						$i1 = $sinceThen->i;
					}	
					if($s<2){
						$s1 = '0'.$sinceThen->s;
					}else{
						$s1 = $sinceThen->s;
					}
					$total = $h1.$i1.$s1;

					$t = strtotime($total);
					$total_time = date('H:i:s',$t);

					//kiem tra xem user da dang nhap chua
					$user = $this->Auth->user();
					if(!empty($user)){
						if ($this->ManageTime->validates()) {

							//Chỉ định id của user nào muốn thêm dữ liệu
							if($this->Session->check('SelectId')){
								$userId = $this->Session->read('SelectId');
								$username = $this->User->find('first',array(
									'conditions' => array('User.user_id' => $userId)
									));
							}
						    // validate dữ liệu trước khi lưu vào trong cơ sở dữ liệu
							$data = array(
								'user_id' => $userId,
								'username' => $username['User']['username'],
								'start_time' => $this->request->data['ManageTime']['start_time'],
								'end_time' => $this->request->data['ManageTime']['end_time'],
								'total_time_of_day' => $total_time,
								'status' => 1,
								'created' => date($created)
								);
							if($this->ManageTime->save($data)){

								//Kiểm tra xem nhân viên có đi muộn hay không,nếu thời gian start mà lớn hơn thời gian quy định thì
								//cập nhật trường late = 1
								$date1 = "08:00:00";
								$date2 = $this->request->data['ManageTime']['start_time'];
								$timestamp1 = strtotime($date1);
								$timestamp2 = strtotime($date2);
								if($timestamp2 > $timestamp1){
									$this->ManageTime->id = $this->ManageTime->getLastInsertId();
									$this->ManageTime->id = $object['ManageTime']['manage_time_id'];
									$this->ManageTime->saveField('late',1);
								}
					
								$this->redirect(array('action'=>'index'));
							}
						} else {
						    // Thông báo lỗi khi không validate được dữ liệu
						    $errors = $this->ModelName->validationErrors;
						}
					}
				}
			}
		}
	}

	public function test(){
		if($this->Auth->login()){

			//Lấy tháng hiện tại hoặc tháng được chọn.
			if($this->request->data){
				$monthCurrent = $this->request->data['ManageTime']['month'];
			}else{
				$monthCurrent = date('m');
			}

			//Lấy thông tin của user đang đăng nhập.
			$userId = $this->Auth->user();

			//Lay thong tin cua user dang dang nhap trong bang ManageTime
			$userInfo = $this->ManageTime->find('all',array(
				'conditions' => array(
					'AND' => array(
						array('ManageTime.user_id' => $userId['user_id']),
						array('MONTH(ManageTime.created)' => $monthCurrent),
						array('ManageTime.status' => 1)
						)
					
					)
				));			

			//lấy thông tin của bảng manageholiday thêm điều kiện status = 1 dể hiển thị thống kê của một tháng
			$userInfo2 = $this->ManageTime->find('all',array(
				'conditions' => array(
					'ManageTime.user_id' => $userId['user_id'],
					'MONTH(ManageTime.created)' => $monthCurrent
					)
				));

			if(!empty($this->Session->read('ManageTime.Id'))){
				$manageId = $this->Session->read('ManageTime.Id');
			}

			//lấy thông tin của bảng manageholiday
			$holiday = $this->ManageHoliday->find('all',array(
				'conditions' => array(
					'ManageHoliday.user_id' => $userId['user_id'],
					'MONTH(ManageHoliday.created)' => $monthCurrent
					)
				));

			//lấy thông tin những ngày đi làm muộn của bảng manageholiday
			$late = $this->ManageTime->find('all',array(
				'conditions' => array(
					'AND' => array(
						array('ManageTime.user_id' => $userId['user_id']),
						array('MONTH(ManageTime.created)' => $monthCurrent),
						array('ManageTime.status' => 1),
						array('ManageTime.late' => 1)
						)
					)
				));

			//lấy thông tin của bảng manageholiday thêm điều kiện status = 1 dể hiển thị thống kê của một tháng
			$holiday2 = $this->ManageHoliday->find('all',array(
				'conditions' => array(
					'ManageHoliday.user_id' => $userId['user_id'],
					'ManageHoliday.status' => 1
					)
				));

			//Lấy thông tin từ bảng user
			$listUser = $this->User->find('list',array(
				'fields' => array('User.user_id','User.username')
				));
	
			$this->set(compact('userId','userInfo','userInfo2','manageId','holiday','listUser','holiday2','monthCurrent','late'));
		}

	}

	public function process(){
		$month = $_POST['month'];
		echo $month;
	}

}