<?php 
class Login extends MY_Controller{
	
	public function index(){
		if($this->session->userdata('user_id')) //preventing loggedin user to access this page
			return redirect('admin/dashboard');
		$this->load->helper('form');
		$this->load->view('public/admin_login');
	}
	
	public function login_form(){
		$this->load->library('form_validation');
		//set rule
		$this->form_validation->set_rules('username','User Name','required|alpha|trim');
		$this->form_validation->set_rules('password','Password','required');
		
		if($this->form_validation->run() ){ //form validation test
			//Passed
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$this->load->model('loginmodel');
			//Getting login user id
			$user_id = $this->loginmodel->login_valid( $username, $password);
			if($user_id){//cradentials valid
				//setting session  user_id variable
				//$this->load->library('session');
				$this->session->set_userdata('user_id',$user_id);
				return redirect('admin/dashboard');
			}else{
				//cradentials not valid
				//flashing invalid login message to login page 
				$this->session->set_flashdata('loggin_invalid', 'Invalid Username and Password ');
				return redirect('login');
				
			}
			
		}else{
			//failed redirected to login page
			
			$this->load->view('public/admin_login');
		}
	}
	
	public function logout(){
		
		$this->session->unset_userdata('user_id');
		return redirect('login');
	}
}