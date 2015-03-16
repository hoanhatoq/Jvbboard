<?php
/**
 * @author Đỗ Tùng
 *
 */

App::uses('AppController', 'Controller');

class ProfileController extends AppController{

	/**
	 * Cập nhật thông tin cho user
	 *	 
	 * @param string $id : tên của user
	 * @return void
	 */
	public function index($id = null) {			
		$id = $this->Auth->user('user_id');		
		if (!$this->Profile->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}

		if ($this->request->is(array('post', 'put'))) {
			if ($this->Profile->save($this->request->data)) {				
				$this->Session->setFlash(__('The profile has been saved.'));
				// return $this->redirect(array('action' => ''));
			} else {
				$this->Session->setFlash(__('The profile could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Profile.' . $this->Profile->primaryKey => $id));
			$this->request->data = $this->Profile->find('first', $options);			
		}
		$tTeams = $this->Profile->getTeams();
			
		$teams = array();
		foreach($tTeams as $team){
			$teams[$team['Team']['team_id']] = $team['Team']['name'];
		}		
		$selected = $this->Profile->getTeam($this->Auth->user('user_id'));		
		$this->set('teams', $teams);
		$this->set('selected', $selected);
	}
}