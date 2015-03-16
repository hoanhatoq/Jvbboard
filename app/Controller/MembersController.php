<?php 

App::uses('AppController', 'Controller'); 
App::uses('DboSource', 'Model/DataSource');

/**
* 
*/
class MembersController extends AppController{
	
	var $name = "Members";

	var $helpers = array("Html","Form");

	var$actsAs = array('Search');
	public $components = array('Session');

	function getinfo(){
		$username = $this->Member->getuser();
		$newuser = array();
		foreach ($username as $name) {
			 $newuser[$name['User']['user_id']]=$name['User']['username'];
		}
		$this->set('newuser',$newuser);

		$nameproject= $this->Member->getproject();
		$newproject = array();
		foreach ($nameproject as $project) {
			 $newproject[$project['Project']['project_id']]=$project['Project']['name'];
		}
		$this->set('newproject',$newproject);
	}
	
	
	//hiển thị project_tbl
	public function index()
	{

		$this->set('members',$this->Member->find('all'));
		$this->getinfo();

		//kiem tra xem co du lieu dc goi tu view ve controller hay khong
    	if(!empty($this->data)&&$this->data['Member']['username']!=null){
        //neu co thi truy van du lieu dua vao bien $members
        $members=$this->Member->find('all',array('conditions'=>array('username LIKE '=>'%'.$this->data['Member']['username'].'%','name LIKE'=>'%'.$this->data['Member']['name'].'%')));
        //goi du lieu tu controller len view
        $this->set('members',$members);
   		}

   	}

	public function addmember(){

		// lay project_id va user_id tu bang member_project_tbl(thuc hien o model)
		$mem = $this->Member->getuserid(); 
		// echo "<pre>";
		// print_r($mem);
		// echo "</pre>";

		// convert array project_id va user_id sang string
		for ($i = 0; $i <= 10000; $i++) {
			if (isset($mem[$i])){

				$mem[$i]['Member']= serialize ($mem[$i]['Member']);
				$mem[$i]=$mem[$i]['Member'];
			}
		}
		//serialize dùng để ghép 2 mảng thành 1 mảng, muốn trở lại từ 1 mảng thành 2 mảng chỉ cần unserialize 
		// echo "<pre>";
		// print_r($mem);
		// echo "</pre>";
		// echo "------------------------------------------------------------------";

		// khi thuc hien an nut "ADD MEMBER"
		if ($this->request->is('post')) {

			//lay du lieu da chon
			$member_project = $this->request->data;
			// echo "<pre>";
			// print_r ($member_project);
			// echo "</pre>";
			// echo "------------------------------------------------------------------";

			for ($a = 0; $a <= 10000; $a++) {

				if (isset($member_project['Member']['user_id'][$a])){
					// tao bang moi de convert array thanh string
					$member_project[$a]['Member']['project_id']=$member_project['Member']['project_id'];
					$member_project[$a]['Member']['user_id']=$member_project['Member']['user_id'][$a];
					// convert du lieu da chon: array project_id va user_id sang string
					$member_project[$a]['Member']= serialize ($member_project[$a]['Member']);
					$member_project[$a]=$member_project[$a]['Member'];

				}
			}
			// echo "<pre>";
			// print_r ($member_project);
			// echo "</pre>";
			// echo "------------------------------------------------------------------";
			// xoa du lieu cu
			unset($member_project['Member']);
			// echo "<pre>";
			// print_r ($member_project);
			// echo "</pre>";
			// echo "------------------------------------------------------------------"

			// so sanh 2 array moi tao o tren
			$new = array_diff($member_project, $mem);

			foreach ($new as $key => $value) {
				// convert lai thanh array de luu du lieu
				$f=unserialize($value);
				// echo "<pre>";
				// print_r ($f);
				// echo "</pre>";
				// echo "------------------------------------------------------------------"

				// SAVE
				$this->Member->saveAll($f);
				return $this->redirect(array('action'=>'index'));
			}
		}
		$this->getinfo();
	}
	public function deletemember(){
		
		// pr($this->Member->find('all'));die();
		if($this->request->data){
            $data = $this->request->data;
            $count = count($data['id']);
            for ($i=0; $i < $count; $i++) { 
                foreach ($data as $news) {
	                $this->Member->delete($news[$i]);	 
	                // pr($news[$i]);    
                }        
            }
            $this->redirect(array('action'=>'index'));
		}
	}
	public function member(){
		$this->set('projects',$this->Member->find('all'));
		$this->getinfo();

	}

}
?>