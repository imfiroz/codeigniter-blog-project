<?php

class Admin extends MY_Controller{
	public function index(){
		echo 'Admin Controller';
	}
	public function dashboard(){
		$this->load->library('pagination');
		$config = [
			'base_url'			=> base_url('admin/dashboard'),
			'per_page'			=> 5,
			'total_rows'		=> $this->articlesmodel->num_rows(),
			'full_tag_open'		=> "<ul class='pagination'>",
			'full_tag_close'	=> "</ul>",
			'first_tag_open'	=> '<li>',
			'first_tag_close'	=> '</li>',
			'last_tag_open'		=> '<li>',
			'last_tag_close'	=> '</li>',
			'next_tag_open'		=> '<li>',
			'next_tag_close'	=> '</li>',
			'prev_tag_open'		=> '<li>',
			'prev_tag_close'	=> '</li>',
			'num_tag_open'		=>	'<li>',
			'num_tag_close'		=> '</li>',
			'cur_tag_open'		=>	"<li class='active'><a>",
			'cur_tag_close'		=>	"</a></li>",
		];
		$this->pagination->initialize($config);
		$articles = $this->articlesmodel->articles_list($config['per_page'],$this->uri->segment(3));
		$this->load->view('admin/admindashboard', ['articles'=>$articles]);
	}
	public function add_article(){
		
		$this->load->view('admin/add_article'); 
	}
	public function save_article(){
		$this->load->library('form_validation');
		if($this->form_validation->run('add_article_rules')){
			//inserting data
			$post = $this->input->post();
			unset($post['submit']);
			
			$this->_falshAndRedirect($this->articlesmodel->add_article($post), 'Data Added Succcessfully', 'Data not Inserted');
			
		}else{
			$this->load->view('admin/add_article');
		}
	}
	public function edit_article($article_id){
		
		$article = $this->articlesmodel->find_article($article_id);
		$this->load->view('admin/edit_article', ['article' => $article]);
	}
	public function update_article($article_id){
		
		$this->load->library('form_validation');
		if($this->form_validation->run('add_article_rules')){
			//inserting data
			$post = $this->input->post();  
			unset($post['submit']);
			$this->_falshAndRedirect($this->articlesmodel->update_article($article_id, $post), 'Data updated Succcessfully', 'Data not Updated');
			 
		}else{
			
			$this->load->view('admin/edit_article');
		}
		
	}
	public function delete_article(){
			$article_id = $this->input->post('article_id');
			$this->_falshAndRedirect($this->articlesmodel->delete_article($article_idq), 'Data deleted Succcessfully', 'Data not deleted');
	}
	//Creating constructer for checking user logged
	public function __construct(){
		parent::__construct();
		if(! $this->session->userdata('user_id'))
			return redirect('login');
			$this->load->model('articlesmodel');
			$this->load->helper('form');
	}
	private function _falshAndRedirect($successful, $successMessage, $failureMessage){
		if($successful){
			$this->session->set_flashdata('feedback', $successMessage);
			$this->session->set_flashdata('feedback_class','alert-success');
		}else{
			$this->session->set_flashdata('feedback', $failureMessage);
			$this->session->set_flashdata('feedback_class','alert-danger');
		}
		return redirect('admin/dashboard');
	}
	
}