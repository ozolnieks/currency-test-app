<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calculator extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->apikey = '';
	}

	public function index()
	{

		$data['pageTitle'] = 'Currency rate calculator';
		$data['head'] = $this->load->view('head', $data, TRUE);

		$json = file_get_contents("https://api.currconv.com/api/v7/currencies?apiKey={$this->apikey}");
		$currenciesObj = json_decode($json, true);
		$data['currenciesObj'] = $currenciesObj;

		$data['header'] = $this->load->view('header', '', TRUE);
		$data['footer'] = $this->load->view('footer', '', TRUE);
		$data['calculator_scripts'] = $this->load->view('calculator_scripts', '', TRUE);

		$this->load->view('currency_calculator', $data);
	}

	public function getRate()
	{
		$curr1 = $this->input->post('curr1');
		$curr2 = $this->input->post('curr2');

		$json = file_get_contents("https://api.currconv.com/api/v7/convert?q=".$curr1."_".$curr2."&compact=ultra&apiKey={$this->apikey}");

		echo $json;
	}

}
