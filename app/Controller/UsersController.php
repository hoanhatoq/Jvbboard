<?php
App::uses('AppController', 'Controller'); 

/**
 * @author Nguyễn Duy Linh, Hà Mạnh Linh
 *
 */

class UsersController extends AppController{
	
	/**
	 * Không sử dụng layout
	 */
	// var $layout = false;

	/**
	 * Tên rút gọn của controller
	 */
	var $name = "Users";

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
	public function login(){
		$error="";		
		if($this->request->is('post')){
			if($this->Auth->login()){				
				if($this->request->data['User']['keeplogin'] == 1 ){
					$cookieTime = "12 months";
					$this->request->data['User']['password'] = $this->Auth->password($this->request->data['User']['password']);
                 
				    $this->Cookie->write('rememberMe', $this->request->data['User'], true, $cookieTime);
				}				
				$this->redirect($this->Auth->redirectUrl());				
			}
			else{
				$error = "Sai username hoặc mật khẩu. Hãy nhập lại !";
			}
		}
		$this->set('error',$error);
		if(AuthComponent::user() || $this->Cookie->check('keeplogin') == 1){
				$this->redirect($this->Auth->redirectUrl());
		}
	}

	/**
	 * Xử lý logout cho user
	 *	 	 
	 * @return void
	 */		
	public function logout(){						
    	$this->Cookie->delete('rememberMe');	
		$this->redirect($this->Auth->logout());
	}	


	public function indexuser(){
		$this ->set('users',$this->User->find('all'));

    //kiem tra xem co du lieu dc goi tu view ve controller hay khong
	    if(!empty($this->data)&&$this->data['User']['username']!=null){
	        //neu co thi truy van du lieu dua vao bien $users
	        $users=$this->User->find('all',array('conditions'=>array('username LIKE '=>'%'.$this->data['User']['username'].'%')));
	        //goi du lieu tu controller len view
	        $this->set('users',$users);
    }
	}

	public function adduser(){

		if ($this->request->is('post')) {

			$users_tbl = $this->request->data;
			echo "<pre>";
			print_r($users_tbl);
			echo "</pre>";
			die();

			// check username and email
			$exitsUsernameFlg = $this->User->checkUsername($users_tbl['User']['username']);
			$exitsEmailFlg = $this->User->checkEmail($users_tbl['User']['email_add']);

			if ($exitsUsernameFlg) {
				$this->Session->setFlash(__('username da ton tai'));
			}
			else
			if ($exitsEmailFlg) {
				$this->Session->setFlash(__('email da ton tai'));
			}

			else{

				$this->User->create();

				if($this->User->save($users_tbl))
				{
					$this->Session->setFlash(__('add user succeed!'));
					return $this->redirect(array('controller'=> 'Users','action' => 'indexuser'));
				}
				$this->Session->setFlash(__('Unable to add user'));
			}

			
		}



		// tro den function getTeam de lay data
		$teamname = $this->User->getTeam();
		$newteam = array();

		foreach ($teamname as $name) {
			 $newteam[$name['Team']['team_id']]=$name['Team']['name'];
		}

		$this->set('newteam',$newteam);
		

		// tro den function getRole de lay data
		$rolevalue = $this->User->getRole();
		$newrole = array();

		foreach ($rolevalue as $value) {
			$newrole[$value['Role']['role_id']]=$value['Role']['value'];
		}

		$this->set('newrole',$newrole);
	}

	public function deleteuser($user_id){

		if ($this->request->is('get')) {
			throw new MethodNotAllowedException();		
		}
		if ($this->User->delete($user_id)) {
			$this->Session->setFlash(__('data was delete'));
			return $this->redirect(array('action'=>'indexuser'));
		}

	}

	public function updateuser($user_id)
	{
			$user = $this->User->findByUserId($user_id);
	
			// process notFound exception khi khong ton tai bai viet
			if (!$user) {
					
				throw new NotFoundException(__('Invalid user'));
				
			}
			if ($this->request->is(array('post','put'))) {
				
				$update = $this->User->save($this->request->data);

				if ($update) {
					$this->Session->setFlash(__('your user has been updated.'));
					return $this->redirect(array('controller'=> 'Users','action' => 'indexuser'));
				}
				$this->Session->setFlash('Unable to update your user.');

				}
						
			if (!$this->request->data)
			{
				$this->request->data= $user;
			}
		$teamname = $this->User->getTeam();
		$newteam = array();

		foreach ($teamname as $name) {
			 $newteam[$name['Team']['team_id']]=$name['Team']['name'];
		}

		$this->set('newteam',$newteam);
		

		// tro den function getRole de lay data
		$rolevalue = $this->User->getRole();
		$newrole = array();

		foreach ($rolevalue as $value) {
			$newrole[$value['Role']['role_id']]=$value['Role']['value'];
		}

		$this->set('newrole',$newrole);
	}


}
?>