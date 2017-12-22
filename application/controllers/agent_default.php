<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Agent_default extends CI_Controller {

	private $limit = 10;
	
	function __construct()
	{
		parent::__construct();
		
		$this->load->model("admin_login_model");
		$this->admin_login_model->is_logged_in();
		$this->admin_login_model->select_user();
		$this->load->model("agent_page_model");
		
		// load library
		$this->load->library(array('table','form_validation'));
		$this->load->library('image_lib'); 
		
		// load helper
		$this->load->helper('url');
		$this->load->helper('HTML');
		
		// load model
		$this->load->model('Agent_model','',TRUE);
	}
	
	function index($offset = 0){
		// offset
		$uri_segment = 3;
		$offset = $this->uri->segment($uri_segment);
		// index should handle agent no for edit and delete
		// load data
		$agents = $this->Agent_model->get_paged_list($this->limit, $offset)->result();
		
		// generate pagination
		$this->load->library('pagination');
		$config['base_url'] = site_url('agent_default/index/');
 		$config['total_rows'] = $this->Agent_model->count_all();
 		$config['per_page'] = $this->limit;
		$config['uri_segment'] = $uri_segment;
		
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		
		// generate table data
		$tmpl = array (
                    'table_open'          => '<table border="1" cellpadding="2" cellspacing="1" class="table table-responsive table-striped table-hover">',

                    'heading_row_start'   => '<tr>',
                    'heading_row_end'     => '</tr>',
                    'heading_cell_start'  => '<th style="text-align:center;">',
                    'heading_cell_end'    => '</th>',

                    'row_start'           => '<tr>',
                    'row_end'             => '</tr>',
                    'cell_start'          => '<td style="text-align:center;">',
                    'cell_end'            => '</td>',

                    'row_alt_start'       => '<tr>',
                    'row_alt_end'         => '</tr>',
                    'cell_alt_start'      => '<td style="text-align:center;">',
                    'cell_alt_end'        => '</td>',

                    'table_close'         => '</table>'
              );

$this->table->set_template($tmpl); 
		$this->load->library('table');
		$this->table->set_empty("&nbsp;");
		$this->table->set_heading('Photo', 'Name', 'Phone Number', 'Gender', 'Rank', 'Tasks');
		$i = 0 + $offset;
		foreach ($agents as $agent)
		{
		
		$image_properties = array(
          'src' => 'images/'.$agent->photo,
          'class' => 'img-thumbnail',
		  'style' => 'height:50px; width:50px;'
		);
			$this->table->add_row(img($image_properties), $agent->firstName.' '.$agent->middleName.' '.$agent->lastName, $agent->contactNo, $agent->gender, $agent->rank, 
				'<i class="glyphicon glyphicon-eye-open">'.anchor('agent_default/view/'.$agent->agentNo,'view',array('class'=>'viewprofile')).'</i><br /> '.
				'<i class="glyphicon glyphicon-pencil">'.anchor('agent_edit/edit/'.$agent->agentNo,'edit',array('class'=>'edit')).'</i><br /> '.
				'<i class="glyphicon glyphicon-trash">'.anchor('agent_delete/delete/'.$agent->agentNo,'del',array('class'=>'delete','onclick'=>"return confirm('Delete this Agent?')")).'</i>'
			);
		}
		$data['table'] = $this->table->generate();
		
		// load view
		$this->load->view('suspect_management/header_fragment');
		$this->load->view('suspect_management/sidebar_fragment');
		$this->load->view('agent_management/agent_view', $data);
		$this->load->view('suspect_management/footer_fragment');
		
	}
	
	// index should be here
	function view($agentNo = null){
			if($agentNo == null){
			redirect('suspect_default/home_page');
			return;
		}
			
		$data['title'] = 'Agent Profile';
		// set common properties
		
		// get person details
		$data['agent'] = $this->Agent_model->get_by_id($agentNo)->row();
		
		// load view
		$this->load->view('suspect_management/header_fragment');
		$this->load->view('suspect_management/sidebar_fragment');
		$this->load->view('agent_management/detailed_agent_view', $data);
		$cases['case'] = $this->agent_page_model->get_assigned_case($agentNo);
		$this->load->view('agent_management/agent_all_case_view', $cases);
		$this->load->view('suspect_management/footer_fragment');
		
	}
}
?>