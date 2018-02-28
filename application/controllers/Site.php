<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->init();

	}
	public function init()
	{
		$this->load->model('site_m');
		$this->load->model('user_m');
		$this->load->model('post_m');
		$this->load->model('pages_m');
	}
	public function index()
	{
		$data['is_index'] = true;
		$limit = 5;
		$start = $this->input->get('row') ? $this->input->get('row') : 0;
		$total_rows = count($this->post_m->get_site_post());

		$data['posts'] = $this->post_m->get_site_post(false,$limit,$start);
		$data['pagination'] = $this->paging($total_rows,$limit,$start);



		$data['site_title'] = 'Bohol Island State University - Bilar Campus';
		$this->template->load(false,'site/index',$data);
	}

	public function paging($total=0,$limit=0,$start=0)
	{
		
						$config['base_url'] = site_url();
			            $config['total_rows']=$total;
			            $config['per_page'] = $limit;			            
				        $choice = $config["total_rows"]/$config["per_page"];
				        $config["num_links"] = floor($choice);             
             
			            $this->pagination->initialize($config);
			                 
			            return $this->pagination->create_links();
	}

	public function subpaging($total=0,$limit=0,$start=0,$page='')
	{
		
						$config['base_url'] = site_url($page);
			            $config['total_rows']=$total;
			            $config['per_page'] = $limit;			            
				        $choice = $config["total_rows"]/$config["per_page"];
				        $config["num_links"] = floor($choice);             
             
			            $this->pagination->initialize($config);
			                 
			            return $this->pagination->create_links();
	}
	public function sites($sites='home'){

		if(empty($sites)){
			$site = $this->site_m->getSiteName(false,1);
		}else{
			if(is_numeric($sites)){
			$site = $this->site_m->getSiteName(false,1);
			}else{

			$site = $this->site_m->getSiteName($sites);
			}
		}
		$siteName = "Coloftech Multiblog";
		//var_dump($site);exit();
			if($site){

			$siteName = isset($site[0]->site_name) ? $site[0]->site_name : '' ;
			$siteId = isset($site[0]->site_id) ? $site[0]->site_id : 1 ;

				$limit = 5;
				$start = $this->input->get('row') ? $this->input->get('row') : 0;
				$total_rows = count($this->post_m->get_site_post($siteId));
				$data['pagination'] = $this->subpaging($total_rows,$limit,$start,$sites);
				$data['posts'] = $this->post_m->get_site_post($siteId,$limit,$start);
	
			}

		$data['site_title'] = $siteName;
		$data['list_pages'] = $this->pages_m->list_pages($siteId,3);
		$data['sidebar_pages'] = $this->pages_m->list_pages($siteId);

		$this->template->load(false,'site/indexSite',$data);
	}
	
	public function sites_pages($site='',$p=false,$page=''){

		

			$site = $this->site_m->getSiteName($site);
			$siteName = isset($site[0]->site_name) ? $site[0]->site_name : '' ;
			$siteId = isset($site[0]->site_id) ? $site[0]->site_id : 1 ;

			$info = $this->uri->segment(2);
			if($info == 'p'){
				$page = urldecode($this->uri->segment(3));

				if($sitesetting = $this->site_m->getSettings($page,$siteId)){

				$data['about'] = $sitesetting[0]->page_content;

				$info_v = 'site/settingInfo';

				$siteName = urldecode($page);

			}

		}

		$data['page'] = $page;
		$this->template->load(false,'site/settingInfo',$data);
	}
	public function read($page='home',$info='')
	{	

		if(!empty($info)){
				if(!empty($info)){

					if($site_id =  $this->site_m->getSiteId($page)){

						$info = $this->post_m->get_postBySlug($info,$site_id);
						$data['sidebar_pages'] = $this->pages_m->list_pages($site_id);

					}
				}
			}
			else{
				return false;
		}
		if(is_array($info)){
			$data['site_title'] = $info[0]->post_title;
			$data['post'] = $info;
		}else{
			$data['site_title'] = 'Read post';
		}
		$data['site_path'] = $page;

		if($info){

		$data['link'] = site_url(''.$page.'/'.$info[0]->slug);
		$data['meta_title'] = $info[0]->post_title;
		$data['description'] = $this->auto_m->limit_300($info[0]->post_content);
		$data['featured_image'] = $this->post_m->get_featuredImg($info[0]->post_id);
		}


		$this->template->load(false,'site/read',$data);

	}

	public function login($page='home')
	{
	
		if($this->permission->is_loggedIn()){

			redirect($page);
		}

		$data['site_title'] = 'Login';
		$this->template->load(false,'site/login',$data);

	}
	public function check_login($value='')
	{
		if ($this->input->post()) {
			$user = $this->input->post('user_name');
			$pass = $this->input->post('user_pass');

			if($is_found = $this->permission->login($user,$pass)){

				echo json_encode(array('stats'=>true,'msg'=>'Login successful.'));
			}else{
				$this->session->userdata['is_logged_in'] = false;
				echo json_encode(array('stats'=>false,'msg'=>'Login unsuccessful.'));

			}



		}
	}
	public function logout($value='')
	{
		$this->permission->logout();
		redirect();
	}

	public function search($q=''){

	}



}
