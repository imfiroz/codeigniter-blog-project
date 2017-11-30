<?php

class User extends MY_Controller{
	
	public function index(){
		$this->load->helper('form');
		$this->load->model('articlesmodel');
		$this->load->library('pagination');
		$config = [
			'base_url'			=> base_url('user/index'),
			'per_page'			=> 5,
			'total_rows'		=> $this->articlesmodel->num_rows_all(),
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
		$articles = $this->articlesmodel->all_articles_list($config['per_page'],$this->uri->segment(3));
		$this->load->view('public/articles_list', compact('articles'));
	}
	public function search(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('search','search', 'required');
		if(! $this->form_validation->run())
		return $this->index();
		$query = $this->input->post('search');
		return redirect("user/search_results/$query");
		//$this->load->model('articlesmodel');
//		$articles = $this->articlesmodel->search($query);
//		$this->load->view('public/search_articles_list', compact('articles'));
//		
	}
	public function search_results($query){
		$this->load->helper('form');
		$this->load->model('articlesmodel');
		$this->load->library('pagination');
		$config = [
			'base_url'			=> base_url("user/search_results/$query"),
			'per_page'			=> 5,
			'total_rows'		=> $this->articlesmodel->count_search_results($query),
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
		$articles = $this->articlesmodel->search_results($query,$config['per_page'],$this->uri->segment(4,0));
		$this->load->view('public/search_articles_list', compact('articles'));
	}
}