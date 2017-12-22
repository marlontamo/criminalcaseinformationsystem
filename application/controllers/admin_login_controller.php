<?php
class admin_login_controller extends CI_Controller{
   
   public function __construct(){
        parent::__construct();
		
       //$this->load->model("admin_login_model");
		//$this->admin_login_model->is_logged_in();
		//$this->admin_login_model->select_user();
		$this->load->helper("url");
		$this->load->helper("form");
		$this->load->model("admin_login_model");
		$this->load->model("profile_viewer");
		
		/*=====================
		i autoload my session and database in the autoload.php
		======================*/
	}
	
	public function index(){
		
		$this->load->view('login/admin_login');
		$this->load->view('suspect_management/footer_fragment');
		 
	}
	
	public function test(){
		echo "hello world2";
	}
	public function admin_login(){
		$query = $this->admin_login_model->validate();
	
		if($query){
			$query = $this->admin_login_model->select_type();
		
			
					$data = array(
							'username' => $this->input->post('username'),
							'is_logged_in' => true,
							'type' => $query
							
							);
							$this->session->set_userdata($data);
							$user = $this->session->userdata('type');
							$user_value = $user->type;
							if($user_value == 'admin'){
									redirect('suspect_default/home_page');
							}else
							$this->admin_login_model->select_user();
				
		}else{
			 $this->load->view('login/admin_login');
			 $this->load->view('login/admin_login_error');
			 $this->load->view('suspect_management/footer_fragment');
		}
	
	}
	public function logout()  {  
		$this->session->sess_destroy();  
		$this->index();  
	}  
	
}
?>