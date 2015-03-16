<?php
  class TeamController extends AppController {

  	public $helpers = array('Html', 'Form');
  	public function index() {

	    $data = $this->Team->find('all');
	    $this->set("team_tbl",$data);
	}

  	public function insertTeam(){

    	if ($this->request->is('post')) {
			$team_tbl = $this->request->data;
			// get info name of Team
			$existTeamNameFlg = $this->Team->isTeamAddExits($team_tbl['Team']['name']);
			//check team name
			if ($existTeamNameFlg){
				$this->Session->setFlash(__('The Team is already in use. Please enter a different Team'));
			}
			else {
				// insert successful
				$this->Team->create();
				if ($this->Team->save($team_tbl)) {
					$this->Session->setFlash(__('Your Team has been saved.')); 
					return $this->redirect(array('controller' => 'Team','action' => 'index'));
				}
			}
  		}

	}

	public function deleteTeam($team_id) {

		$team_tbl= $this->Team->findByTeamId($team_id);
		   if ($this->request->is('get')) {
			        throw new MethodNotAllowedException();
		    }

		   if ($this->Team->delete($team_id)) {
			   $this->Session->setFlash(__(' The Team ' .$team_tbl['Team']['name']. ' has been deleted.'));
			   return $this->redirect(array('action' => 'index'));
	    	}
	}	


	public function updateTeam($team_id) {

	    // get team info
		$team_info = $this->Team->findByTeamId($team_id);
		// do exception if team is not exist 
	    if (!$team_info) {
	        throw new NotFoundException(__('The team is not exist'));
	    }

	    // update team info
	    if ($this->request->is(array('post','put'))) {
	    	$updateFlg = $this->Team->save($this->request->data);
	        // if update successful
	        if ($updateFlg) {
	            $this->Session->setFlash(__('The ' .$team_info['Team']['name']. ' team has been updated.'));
	            return $this->redirect(array('controller' => 'Team', 'action' => 'index'));
	        }   
	       
	    }
	    else {
	     	// if updating failed	
			$this->Session->setFlash(__('Unable to update the ' .$team_info['Team']['name']. ' team.'));
		}

	    if (!$this->request->data) {
	        $this->request->data = $team_info;
	    }
  	} 
}