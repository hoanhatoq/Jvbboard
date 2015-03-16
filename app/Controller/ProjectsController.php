<?php
 App::uses('AppController', 'Controller');
 class ProjectsController extends AppController {
 	public $helpers = array('Html','Form');
 	public $uses =array('Project','Userproject');

 	public function index(){
 			 $data = $this->Project->find('all');

 			 $this->set('Use_project',$data); 			
 	}
 	public function getProject($project_id= Null){
 			//get info Project
 			$infoProject= $this->Project->findByProjectId($project_id);
 			// echo '<pre>';
 			// print_r($infoProject);
 			// echo '</pre>';
 			if(!$infoProject){
 				throw new NotFoundException(__("Can not get infomation Project"));
 			}
 			$this->set('infoProject',$infoProject);

 	}
 	public function insertProject(){


 			if($this->request->is('Post')){
 				$project_tbl= $this->request->data;
 				// echo '<pre>';
 				// print_r($project_tbl);
 				// echo '</pre>';
  				$isNameProjectExitsFlg = $this->Project->isNameProjectExits($project_tbl['Project']['name']);
  			// 	echo '<pre>';
 				// print_r($project_tbl['Project']['name']);
 				// echo '</pre>';
 				if($isNameProjectExitsFlg){
 					$this->Session->setFlash(__('The name Project is use. please try one'));

 				}
 				else{
					if ($this->Project->save($project_tbl)){

						$this->Session->setFlash(__('Your Project has been saved.')); 
						return $this->redirect(array('controller' => 'Projects','action' => 'index'));
					}
				}
 			
 			}
		
 	}
 	public function  insertMemberproject(){
  
 			if($this->request->is('Post')){

 				$Member = $this->request->data;
 				 // explode () string input.
 				 $memberName = String::tokenize($Member['Userproject']['memberName'], ',');
 				 //get url.
 				$project_id = $this->params['pass'][0]; 
 				 		// echo '<pre>';
		 				 // print_r($memberName);
		 				 // echo '</pre>';
		 				 
 				// get userId 
 				//$user = $this->Userproject->getUserId($Member['Userproject']['memberName']);
 				 
 				//$role = $this->Userproject->getRoleId($Member['Userproject']['roleName']);
 				//$userId =  $user[0]['user_tbl']['user_id'];
 		
 				//$roleId = $role[0]['role_mst']['role_id']; 	
 						// echo '<pre>';
		 				//  print_r($memberName);
		 				//  echo '</pre>';
 				
 				$userProject = array();
 				
 				foreach ($memberName as $name){
 					$userId= $this->Userproject->getUserId($name);
 						 $userProject['user_id'] = $userId[0]['user_tbl']['user_id'];
 						 echo '<pre>';
		 				 print_r($userProject['user_id']);
		 				 echo '</pre>';
 					 	 $userProject['project_id'] = $project_id;
		 				 $userNameflg=$this->Userproject->isMemberNameEixst($userProject['user_id']);
		 				 // echo '<pre>';
		 				 // print_r($userNameflg);
		 				 // echo '</pre>';

 					if($userNameflg){
 						$this->Session->setFlash(__("Your member is use. please try one"));
 					}
					else {
						if ($this->Userproject->save($userProject)){

							$this->Session->setFlash(__('Your member has been saved.')); 
							//return $this->redirect(array('controller' => 'Projects','action' => 'index'));
						}

 				}	
 					//$userNameIsExists = $userProject['user_id'];
 					
	 				
 				//$userProject['role'] = $roleId;
 					 
					}		
					
 			
 			}
 			
 	}
 	
 	public function deletePro($project_id) {
		if ($this->request->is('get')) {
		    throw new MethodNotAllowedException();
		}
		if ($this->Project->delete($project_id)) {
		    $this->Session->setFlash(__('The Project has been deleted.'));
		    return $this->redirect(array('action' => 'index'));
    	}

    }

    public function updateProject($project_id=null){

    		$pro_info = $this->Project->findByProjectId($project_id);
		if (!$pro_info) {
			throw new NotFoundException(__('The project is not exist'));
		}

		if ($this->request->is(array('post','put'))) {
			// update successful
			$updateFlg = $this->Project->save($this->request->data);
			if ($updateFlg) {
				$this->Session->setFlash(__('Your Project ' .$pro_info['Project']['name']. ' has been updated.'));
				return $this->redirect(array('controller' => 'Projects', 'action' => 'index'));
			}
			else {
				$this->Session->setFlash(__('Unable to update the ' .$pro_info['Project']['name']. ' Project.'));
			}
		}

		if (!$this->request->data) {
			$this->request->data = $pro_info;
		
		}
			
    }
}
