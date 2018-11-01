	<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	class Grading extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->load->model('Grading_Model', 'gm');
			$this->load->helper('form');
		}

		function index(){
			if($this->sessionCheck()==1){
				$this->v_aHome();
			}else if($this->sessionCheck()==2){
				$this->v_sHome();
			}else if($this->sessionCheck()==3){
				$this->v_tHome();
			}else{
				$this->load->view('layout/header2');
				$this->load->view('index/index');
				$this->load->view('layout/footer');
			}
		}
/*-------------------------views-------------------------*/
		
		function v_aLogin(){
			if($this->sessionCheck()==1){
				$this->v_aHome();
			}else if($this->sessionCheck()==2){
				$this->v_sHome();
			}else if($this->sessionCheck()==3){
				$this->v_tHome();
			}else{
			$this->load->view('layout/header2');
			$this->load->view('login/adminlogin');
			$this->load->view('layout/footer');
			}
		}
		function v_sLogin(){
			if($this->sessionCheck()==1){
				$this->v_aHome();
			}else if($this->sessionCheck()==2){
				$this->v_sHome();
			}else if($this->sessionCheck()==3){
				$this->v_tHome();
			}else{
			$this->load->view('layout/header2');
			$this->load->view('login/studentlogin');
			$this->load->view('layout/footer');
			}
		}
		function v_tLogin(){
			if($this->sessionCheck()==1){
				$this->v_aHome();
			}else if($this->sessionCheck()==2){
				$this->v_sHome();
			}else if($this->sessionCheck()==3){
				$this->v_tHome();
			}else{
			$this->load->view('layout/header2');
			$this->load->view('login/teacherlogin');
			$this->load->view('layout/footer');
			}
		}
		function v_sReg(){
			if($this->sessionCheck()==1){
				$this->v_aHome();
			}else if($this->sessionCheck()==2){
				$this->v_sHome();
			}else if($this->sessionCheck()==3){
				$this->v_tHome();
			}else{
			$this->load->view('layout/header');
			$this->load->view('register/studentregister');
			$this->load->view('layout/footer');
			}
		}
		function v_tReg(){
			if($this->sessionCheck()==1){
				$this->v_aHome();
			}else if($this->sessionCheck()==2){
				$this->v_sHome();
			}else if($this->sessionCheck()==3){
				$this->v_tHome();
			}else{
			$this->load->view('layout/header');
			$this->load->view('register/teacherregister');
			$this->load->view('layout/footer');
			}
		}
		function v_aHome(){
			if($this->sessionCheck()==4){
				$this->index();
			}else{
			$this->load->view('layout/header');
			$this->load->view('home/adminhome');
			$this->load->view('layout/footer');
			}
		}
		function v_sHome(){
			if($this->sessionCheck()==4){
				$this->index();
			}else{
			$this->load->view('layout/header');
			$this->load->view('home/studenthome');
			$this->load->view('layout/footer');
			}
		}
		function v_tHome(){
			if($this->sessionCheck()==4){
				$this->index();
			}else{
			$this->load->view('layout/header');
			$this->load->view('home/teacherhome');
			$this->load->view('layout/footer');
			}
		}
		function v_addClass(){
			if($this->sessionCheck()==4){
				$this->index();
			}else{
			$this->load->view('layout/header');
			$this->load->view('add/adminadd');
			$this->load->view('layout/footer');
			}
		}

		function v_addTeacher(){
			if($this->sessionCheck()==4){
				$this->index();
			}else{
			$this->load->view('layout/header');
			$this->load->view('add/adminadd_t');
			$this->load->view('layout/footer');
			}
		}
	
		function v_addStudent(){
			if($this->sessionCheck()==4){
				$this->index();
			}else{
			$this->load->view('layout/header');
			$this->load->view('add/adminadd_s');
			$this->load->view('layout/footer');
			}
		}
		function v_addSubject(){
			if($this->sessionCheck()==4){
				$this->index();
			}else{
			$this->load->view('layout/header');
			$this->load->view('add/adminadd_sb');
			$this->load->view('layout/footer');
			}
		}
		function v_addSection(){
			if($this->sessionCheck()==4){
				$this->index();
			}else{
			$this->load->view('layout/header');
			$this->load->view('add/adminadd_sc');
			$this->load->view('layout/footer');
			}
		}

		function v_tLoad(){
			if($this->sessionCheck()==4){
				$this->index();
			}else{
			$this->load->view('layout/header');
			$this->load->view('displays/teacherload');
			$this->load->view('layout/footer');
			}
		}

		function v_adminView(){
			if($this->sessionCheck()==4){
				$this->index();
			}else{
			$this->load->view('layout/header');
			$this->load->view('displays/adminView');
			$this->load->view('layout/footer');
			}
		}
		function v_Sections(){
			if($this->sessionCheck()==4){
				$this->index();
			}else{
			$this->load->view('layout/header');
			$this->load->view('displays/adminviewSections');
			$this->load->view('layout/footer');
			}
		}

		function v_teacherChange(){
			if($this->sessionCheck()==4){
				$this->index();
			}else{
			$this->load->view('layout/header');
			$this->load->view('changepass/teacherChange');
			$this->load->view('layout/footer');
			}
		}

		function v_studentChange(){
			if($this->sessionCheck()==4){
				$this->index();
			}else{
			$this->load->view('layout/header');
			$this->load->view('changepass/studentChange');
			$this->load->view('layout/footer');
			}
		}
		function v_logview(){
			if($this->sessionCheck()==4){
				$this->index();
			}else{
			$this->load->view('layout/header');
			$this->load->view('displays/logview');
			$this->load->view('layout/footer');
			}
		}

/*-------------------------views-------------------------*/		

/*-------------------------checks-------------------------*/
		function sessionCheck(){
	 	if($this->session->userdata('username')!=''){
	 		if($this->session->userdata('type')=='admin'){
	 		return 1;
	 		}else if($this->session->userdata('type')=='student'){
	 		return 2;
	 		}if($this->session->userdata('type')=='teacher'){
	 		return 3;
	 		}
	 	}else{
	 		return 4;
	 		}

	 	}
	 	function logout(){
	 		$this->gm->logoutLog();
	 		$this->session->unset_userdata('username');
	 		$this->session->unset_userdata('name');
	 		$this->session->unset_userdata('type');
	 		$this->session->unset_userdata('id');
	 		$this->session->unset_userdata('picname');
	 	$this->index();
	 	}
	 
		function validateAccount(){
			$result=$this->gm->validateAccount();
			$msg['success']=false;
			if($result!=false){
				$msg['success']=true;
				
			}
			echo json_encode($msg);
		}
/*-------------------------checks-------------------------*/		

/*-------------------------insert-------------------------*/	
        function regStudent(){
                $config['upload_path']= './assets/uploads';
                $config['allowed_types']= 'jpeg|png|jpg';
              	
                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('userfile')){
                        $error = array('error' => $this->upload->display_errors());              
                }
                else{
                        $data = array('upload_data' => $this->upload->data());
                        $personsData = array(
                            'fname'=>$this->input->post('fname'),
                            'mname'=>$this->input->post('mname'),
                            'lname'=>$this->input->post('lname'),
                            'sc_id'=>$this->input->post('sc_id'),
                            'username'=>$this->input->post('username'),
                            'password'=>$this->input->post('password'),
                            'picname'=>$data['upload_data']['file_name']
                        );
                        $this->gm->regStudent($personsData);
                       echo json_encode($personsData);
                }
        }

        function regTeacher(){
                $config['upload_path']= './assets/uploads';
                $config['allowed_types']= 'jpeg|png|jpg';
              	
                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('userfile')){
                        $error = array('error' => $this->upload->display_errors());
                }
                else{
                        $data = array('upload_data' => $this->upload->data());
                        $personsData = array(
                            'fname'=>$this->input->post('fname'),
                            'mname'=>$this->input->post('mname'),
                            'lname'=>$this->input->post('lname'),
                            'username'=>$this->input->post('username'),
                            'password'=>$this->input->post('password'),
                            'picname'=>$data['upload_data']['file_name']
                        );
                       $this->gm->regTeacher($personsData);
                       echo json_encode($personsData);
                }            
        }   

        function addClass(){
        	$msg['success']=false;
        	$t_id=$this->input->post('t_id');
        	$sc_id=$this->input->post('sc_id');
        	$sb_id=$this->input->post('sb_id');
        	$data=array(
        		't_id'=>$t_id,
        		'sc_id'=>$sc_id,
        		'sb_id'=>$sb_id
        		);
        	$check=$this->gm->checkClassExist($t_id,$sc_id,$sb_id);
        	if($check){
        		$msg[1]['success']=false;
        		$msg[1]['message']="Class Already Exist";
        	}else{
	        	$result=$this->gm->addClass($data);
	        	if($result){
	        		$msg[1]['success']=true;
	        	}
        	}
        	echo json_encode($msg);
        }
        function addSubject(){
        	$msg['success']=false;
        	$sb_name=$this->input->post('sb_name');
        	$data=array('sb_name'=>$sb_name);
        	$check=$this->gm->checkSubjectExist($sb_name);
        	if($check){
        		$msg['success']=false;
        		$msg['message']="Subject Already Exist";
        	}else{
        		$result=$this->gm->addSubject($data);
        		if($result){
        			$msg['success']=true;
        		}
        	}
        	echo json_encode($msg);
        }
        function addSection(){
        	$msg['success']=false;
        	$sc_name=$this->input->post('sc_name');
        	$data=array('sc_name'=>$sc_name);
        	$check=$this->gm->checkSectionExist($sc_name);
        	if($check){
        		$msg['success']=false;
        		$msg['message']="Section Already Exist";
        	}else{
        		$result=$this->gm->addSection($data);
        		if($result){
        			$msg['success']=true;
        		}
        	}
        	echo json_encode($msg);
        }

         function addGrade(){
        	$msg['success']=false;
        	$c_id=$this->input->post('c_id');
        	$grade=$this->input->post('grade');
        	$st_id=$this->input->post('st_id');
        	$remarks='';
        	if($grade<=3){

        		$remarks='Passed';
        	}else{
        		$remarks='Failed';
        	}
        	$data=array(
        		'st_id'=>$st_id,
        		'c_id'=>$c_id,
        		'remarks'=>$remarks,
        		'grade'=>$grade
        		);
        	$check=$this->gm->checkGradeExist($st_id,$c_id);
        	
        	if($check){
        		$msg['success']=false;
        		$msg['message']="Grade Already Exist";
        	}else{
        		$result=$this->gm->addGrade($data);
        		if($result){
        			$msg['success']=true;
        		}
        	}
        	echo json_encode($msg);
        }

     
       
						
/*-------------------------Gets-------------------------*/	


		function getTeachers(){
			$result= $this->gm->getTeachers();
			echo json_encode($result);
		}	
		function myGrades(){
			$result= $this->gm->myGrades();
			echo json_encode($result);
		}	

		function getSections(){
			$result= $this->gm->getSections();
			echo json_encode($result);
		}	

		function getSubjects(){
			$result= $this->gm->getSubjects();
			echo json_encode($result);
		}
		function teacherClasses(){
			$result= $this->gm->teacherClasses();

			echo json_encode($result);
		}	
		function classStudents(){
			$c_id=$this->input->post('c_id');
			$result= $this->gm->classStudents($c_id);

			echo json_encode($result);
		}	
		function allClasses(){
			$result= $this->gm->allClasses();

			echo json_encode($result);
		}
		function getStudentsBySection(){
			$sc_id=$this->input->post('sc_id');
			$result= $this->gm->getStudentsBySection($sc_id);

			echo json_encode($result);
		}	
		function viewLogs(){
			$result=$this->gm->viewLogs();
			echo json_encode($result);
		}

		function studentChangePass(){
			$password=$this->input->post('newpass');
			$oldpass=$this->input->post('oldpass');
			$msg['success']=false;
			
			if($this->session->userdata('sample')==$oldpass){
				$result=$this->gm->studentChangePass($password);
				if($result){
				$msg['success']=true;
			}else $msg['success']=false;
			}else {
				$msg['success']=false;
				$msg['message']='Incorrect password';
			}


			
			echo json_encode($msg);
		}	
		function teacherChangePass(){
			$password=$this->input->post('newpass');
			$oldpass=$this->input->post('oldpass');
			$msg['success']=false;
			
			if($this->session->userdata('sample')==$oldpass){
				$result=$this->gm->teacherChangePass($password);
				if($result){
				$msg['success']=true;
			}else $msg['success']=false;
			}else {
				$msg['success']=false;
				$msg['message']='Incorrect password';
			}


			
			echo json_encode($msg);
		}	


	}

?>