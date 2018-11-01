<?php
	class Grading_Model extends CI_Model{
			function validateAccount(){
			$username=$this->input->post('username');
			$password=$this->input->post('password');
			$type=$this->input->post('type');
			$this->db->where('username',$username);
			$this->db->where('password',$password);
			if($type=='admin'){
			$query = $this->db->get('admin');
			}else if($type=='student'){
			$query = $this->db->get('student');
			}else{
			$query = $this->db->get('teacher');
			}
			if($query->num_rows() >0){
				$data=$query->row();
				$id=$data->id;
				$username=$data->username;
				$name=$data->fname.' '.$data->mname.' '.$data->lname ;
				$sample=$data->password;
				$picname=$data->picname;


		 		$session_data=array(
		 			'id'=>$id,
		 			'name'=>$name,
		 			'username'=>$username,
		 			'type'=>$type,
		 			'picname'=>$picname,
		 			'sample'=>$sample
		 			);
		 		$this->session->set_userdata($session_data);
		 		$log=array(
		 			'action'=>'login',
		 			'acc_id'=>$id,
		 			'type'=>$type
		 			);
		 		$this->db->insert('log',$log);
            	return $query->result();
        }else return false;
		}

		function regStudent($data){
			$this->db->insert('student', $data);

			$log=array(
		 			'action'=>'Student Inserted',
		 			'acc_id'=>$this->session->userdata('id'),
		 			'type'=>'admin'
		 			);
		 		$this->db->insert('log',$log);
			return $this->db->insert_id();

		}
		function regTeacher($data){
			$this->db->insert('teacher', $data);
			$log=array(
		 			'action'=>'Teacher Inserted',
		 			'acc_id'=>$this->session->userdata('id'),
		 			'type'=>'admin'
		 			);
		 		$this->db->insert('log',$log);
			return $this->db->insert_id();

		}
		function addClass($data){
			$this->db->insert('class', $data);
			$log=array(
		 			'action'=>'Class Added',
		 			'acc_id'=>$this->session->userdata('id'),
		 			'type'=>'admin'
		 			);
		 		$this->db->insert('log',$log);

			return $this->db->insert_id();
		}
		function addSubject($data){
			$this->db->insert('subject', $data);
			$log=array(
		 			'action'=>'Subject Added',
		 			'acc_id'=>$this->session->userdata('id'),
		 			'type'=>'admin'
		 			);
		 		$this->db->insert('log',$log);
			return $this->db->insert_id();
		}
		function addSection($data){
			$this->db->insert('section', $data);
			$log=array(
		 			'action'=>'Section Added',
		 			'acc_id'=>$this->session->userdata('id'),
		 			'type'=>'admin'
		 			);
		 		$this->db->insert('log',$log);
			return $this->db->insert_id();
		}
		function addGrade($data){
			$this->db->insert('grade', $data);
			$log=array(
		 			'action'=>'Grade Added',
		 			'acc_id'=>$this->session->userdata('id'),
		 			'type'=>'admin'
		 			);
		 		$this->db->insert('log',$log);
			return $this->db->insert_id();
		}



		
		function checkClassExist($t_id,$sc_id,$sb_id){
			$this->db->where('t_id',$t_id);
			$this->db->where('sc_id',$sc_id);
			$this->db->where('sb_id',$sb_id);
			$query=$this->db->get('class');
			if($query->num_rows()>0){
				return true;
			}else return false;	
		}
		function checkGradeExist($st_id,$c_id){
			$this->db->where('st_id',$st_id);
			$this->db->where('c_id',$c_id);
			$query=$this->db->get('grade');
			if($query->num_rows()>0){
				return true;
			}else return false;	
		}
		function checkSubjectExist($sb_name){
			$this->db->where('sb_name',$sb_name);
			
			$query=$this->db->get('subject');
			if($query->num_rows()>0){
				return true;
			}else return false;	
		}
		function checkSectionExist($sc_name){
			$this->db->where('sc_name',$sc_name);
			
			$query=$this->db->get('section');
			if($query->num_rows()>0){
				return true;
			}else return false;	
		}
	

		function getTeachers(){
			$query=$this->db->get('teacher');
			if($query->num_rows()>0){
				return $query->result();
			}else {
				return false;
			}
		}

		function getSections(){
			$query=$this->db->get('section');
			if($query->num_rows()>0){
				return $query->result();
			}else {
				return false;
			}
		}

		function getSubjects(){
			$query=$this->db->get('subject');
			if($query->num_rows()>0){
				return $query->result();
			}else {
				return false;
			}
		}

		function getClasses(){
			$query=$this->db->get('class');
			if($query->num_rows()>0){
				return $query->result();
			}else {
				return false;
			}
		}
		function getStudentsBySection($sc_id){
			$this->db->where('sc_id',$sc_id);
			$query=$this->db->get('student');
			if($query->num_rows()>0){
				return $query->result();
			}else {
				return false;
			}


		}


		function teacherClasses(){
			$this->db->select("*");
			$this->db->from('class');
			$this->db->join('teacher', 'teacher.id =class.t_id');
			$this->db->join('subject', 'subject.sb_id =class.sb_id');
			$this->db->join('section', 'section.sc_id =class.sc_id');
      		$this->db->where('teacher.id', $this->session->userdata('id'));
     		$query = $this->db->get();

		    if($query->num_rows() != 0){
		        return $query->result();
		    }
		    else{
		        return false;
		    }
				}
		function classStudents($c_id){
			$this->db->select("*");
			$this->db->from('student');
			$this->db->join('grade', 'grade.st_id =student.id', 'left');
			$this->db->join('class', 'class.sc_id =student.sc_id', 'left');
      		$this->db->where('class.c_id', $c_id);
     		$query = $this->db->get();

		    if($query->num_rows() != 0){
		        return $query->result();
		    }
		    else{
		        return false;
		    }
				}

		function allClasses(){
			$this->db->select("*");
			$this->db->from('class');
			$this->db->join('teacher', 'teacher.id =class.t_id');
			$this->db->join('subject', 'subject.sb_id =class.sb_id');
			$this->db->join('section', 'section.sc_id =class.sc_id');
     		$query = $this->db->get();

		    if($query->num_rows() != 0){
		        return $query->result();
		    }
		    else{
		        return false;
		    }
				}

		function myGrades(){
			$this->db->select("*");
			$this->db->from('grade');
			$this->db->join('class', 'class.c_id =grade.c_id');
			$this->db->join('subject', 'subject.sb_id =class.sb_id');
			$this->db->where('grade.st_id', $this->session->userdata('id'));
     		$query = $this->db->get();

		    if($query->num_rows() != 0){
		        return $query->result();
		    }
		    else{
		        return false;
		    }
				}
		function viewLogs(){
			$query=$this->db->get('log');
			return $query->result();

		}


	function studentChangePass($password){
			$this->db->set('password',$password);
			$this->db->where('id', $this->session->userdata('id'));
			$this->db->update('student');
			$log=array(
		 			'action'=>'Updated Password',
		 			'acc_id'=>$this->session->userdata('id'),
		 			'type'=>'Student'
		 			);
		 		$this->db->insert('log',$log);
			return true;
		}
		function teacherChangePass($password){
			$this->db->set('password',$password);
			$this->db->where('id', $this->session->userdata('id'));
			$this->db->update('teacher');
			$log=array(
		 			'action'=>'Updated Password',
		 			'acc_id'=>$this->session->userdata('id'),
		 			'type'=>'Teacher'
		 			);
		 		$this->db->insert('log',$log);
			return true;
		}
		function logoutLog(){
			$log=array(
		 			'action'=>'logout',
		 			'acc_id'=>$this->session->userdata('id'),
		 			'type'=>$this->session->userdata('type')
		 			);
		 		$this->db->insert('log',$log);
		}

	}
?>