<?php
App::uses('AppController', 'Controller'); 

/**
 * @author Nguyễn Duy Linh, Hà Mạnh Linh
 *
 */

class DailyMessagesController extends AppController {
	/**	 
	 * Tên rút gọn của controller
	 */
	var $name = "DailyMessages";

	/**	 
	 * Các helper được sử dụng
	 */
	var $helpers = array("Html", "Common", "Form");
	
	/**
	 * Cập nhật nội dung message do người dùng đăng
	 *	 	 
	 * @return void
	 */
	function  edit(){						
		if($this->request->is('post')){
			$dat = $this->request->data;			
			$cuser = array(
				'user_id' => $this->Auth->user('user_id'),
				'role' => $this->Auth->user('Role')['value'],
			);

			$data = array(
				'user_id' => trim($dat['u']),
				'message' => trim($dat['m'])
			);			
			$this->DailyMessage->update($data, $cuser);			
		}
	}
	
	/**
	 * Hiển thị danh sách daily message
	 *	 	 
	 * @return void
	 */
	function index (){
		$lists = $this->DailyMessage->getMessages();		
		$data = array();
		foreach($lists as $item){
			$tRole = $item['User']['Role']['value'];

			$tUser_id  = $item['User']['user_id'];
			$tUsername = $item['User']['username'];
			$tFullname = $item['User']['fullname'];
			$tNickname = $item['User']['nickname'];

			$tDailyMessage = $item['DailyMessage'];

			if($tRole === 'MEMBERS' || $tRole === 'LEADERS'){
				$tTeam = $item['User']['Team'];								
				
				$tTeamId = $tTeam['team_id'];

				$data['TEAM'][$tTeamId]['name'] = $tTeam['name'];				
				$data['TEAM'][$tTeamId]['slogan'] = $tTeam['slogan'];

				if($tUser_id === $tTeam['leader']){
					$data['TEAM'][$tTeamId]['LEADER']['user_id'] = $tUser_id;
					$data['TEAM'][$tTeamId]['LEADER']['username'] = $tUsername;
					$data['TEAM'][$tTeamId]['LEADER']['fullname'] = $tFullname;
					$data['TEAM'][$tTeamId]['LEADER']['nickname'] = $tNickname;
					$data['TEAM'][$tTeamId]['LEADER']['DailyMessage'] = $tDailyMessage;					
					$data['TEAM'][$tTeamId]['LEADER']['Role'] = $tRole;
					$data['TEAM'][$tTeamId]['LEADER']['Team'] = $tTeamId;
				}else{
					$data['TEAM'][$tTeamId]['MEMBERS'][$tUser_id]['User']['username'] = $tUsername;
					$data['TEAM'][$tTeamId]['MEMBERS'][$tUser_id]['User']['fullname'] = $tFullname;
					$data['TEAM'][$tTeamId]['MEMBERS'][$tUser_id]['User']['nickname'] = $tNickname;
					$data['TEAM'][$tTeamId]['MEMBERS'][$tUser_id]['DailyMessage'] = $tDailyMessage;					
					$data['TEAM'][$tTeamId]['MEMBERS'][$tUser_id]['Role'] = $tRole;
				}				
			}

			if($tRole === 'MANAGERS'){								
				$data['BOM'][$tUser_id]['User']['username'] = $tUsername;
				$data['BOM'][$tUser_id]['User']['fullname'] = $tFullname;
				$data['BOM'][$tUser_id]['User']['nickname'] = $tNickname;
				$data['BOM'][$tUser_id]['DailyMessage'] = $tDailyMessage;		
				$data['BOM'][$tUser_id]['Role'] = $tRole;
			}

			if($tRole === 'ADMINISTRATORS'){
				$data['ALL']['user_id'] = $tUser_id;
				$data['ALL']['username'] = $tUsername;
				$data['ALL']['DailyMessage'] = $tDailyMessage;		
				$data['ALL']['Role'] = $tRole;
			}
		}
		$current_user = array(
			'user_id' => $this->Auth->user('user_id'),
			'role' => $this->Auth->user('Role')['value']
		);
		$this->set('current_user', $current_user);

		$this->set('data', $data);
		$this->set('userRole', $this->Auth->user('Role')['value']);
	}	

}
?>