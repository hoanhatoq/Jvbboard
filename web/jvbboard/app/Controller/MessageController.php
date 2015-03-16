<?php
App::uses('AppController', 'Controller');

/**
 * @author Nguyễn Duy Linh
 */
class MessageController extends AppController{
	
	/**
	 * Lấy message khi chọn previous trên trang daily message
	 */
	public function previous () {		
		$pos = ($this->request->is('post')) ? $this->request->data('step') - 1 : 0;		
		$msg = $this->Message->getPreviousMessage($pos);
		if($msg){
			echo $msg['Message']['message'];
		}
		$this->autoRender = false;
	}
}