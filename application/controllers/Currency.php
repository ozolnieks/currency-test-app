<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Currency extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->apikey = '0851277c261a481199ff19d438b98fcb';
	}
	
	public function index()
	{

		$data['pageTitle'] = 'List of currencies';
		$data['head'] = $this->load->view('head', $data, TRUE);

		$json = file_get_contents("https://api.currconv.com/api/v7/currencies?apiKey={$this->apikey}");
		$currenciesObj = json_decode($json, true);
		$data['currenciesObj'] = $currenciesObj;
		
		$data['header'] = $this->load->view('header', '', TRUE);
		$data['footer'] = $this->load->view('footer', '', TRUE);

		$this->load->view('currency_list', $data);
	}

}
