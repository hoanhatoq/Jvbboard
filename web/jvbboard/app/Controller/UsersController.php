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
	var $layout = false;

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
	
}
?>