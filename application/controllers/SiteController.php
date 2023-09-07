<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once './vendor/autoload.php';
use \PhpOffice\PhpSpreadsheet\IOFactory;

class SiteController extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */

	public $menu;
	public $data;
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('MenuModel');
		$this->menu = json_decode($this->MenuModel->load_menu(), 3);
		$this->data['menu'] = $this->menu;
	}
	public function index()
	{
		$this->load->view('pages/index', $this->data);
	}

	public function data()
	{
		$filename = FCPATH . "uploads/ayushakti-ayurved_visitors.xls";
		$fileType = IOFactory::identify($filename);
		$reader = IOFactory::createReader($fileType);
		$spreadsheet = $reader->load($filename);
		$sheet = $spreadsheet->getSheetByName('Seniority');
		$count = 0;
		$data['headers'] = [];
		$data['data'] = [];
		foreach ($sheet->getRowIterator(2) as $row) {
			array_push($data['headers'],$sheet->getCell('A'.$row->getRowIndex())->getValue());
		}
		foreach ($sheet->getRowIterator(2) as $row) {
			array_push($data['data'],$sheet->getCell('B'.$row->getRowIndex())->getValue());
		}
		echo "<pre>";
		print_r($data);
	}
}
