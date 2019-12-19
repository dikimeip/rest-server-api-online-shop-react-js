<?php  
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

/**
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array
 *
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Phil Sturgeon, Chris Kacerguis
 * @license         MIT
 * @link            https://github.com/chriskacerguis/codeigniter-restserver
 */

class AdminController extends REST_Controller
{
	public function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->model('ModelMaster','Model');
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        $method = $_SERVER['REQUEST_METHOD'];
        if($method == "OPTIONS") {
            die();
        }
    }


	public function index_get()
	{
		$id = $this->get('id');
		if ($id == null) {
			$mahasiswa = $this->Model->get_admin();
		} else {
			$mahasiswa = $this->Model->get_admin($id);
		}

		if ($mahasiswa) {
			$this->response([
				'status' => 1,
				'data' => $mahasiswa
			],REST_Controller::HTTP_OK);
		} else {
			$this->response([
				'status' => 0,
				'data' => 'Data Not Found'
			],REST_Controller::HTTP_NOT_FOUND);
		}

	}

	public function index_post()
	{
		$data = [
			'nama_admin' => $this->post('nama'),
			'username_admin' => $this->post('username'),
			'email_admin' => $this->post('email'),
			'password_admin' => $this->post('password'),
			'foto_admin' => "admin.png"
		];

		if ($this->Model->post_admin($data) > 0 ) {
			$this->response([
				'status' => 1,
				'data' => 'Succes Post data'
			],REST_Controller::HTTP_OK);
		} else {
			$this->response([
				'status' => 0,
				'data' => 'Failed Post Data'
			],REST_Controller::HTTP_NOT_FOUND);
		}
	}


	public function index_delete()
	{
		$id = $_GET['id'];
		if ($id == null) {
			$this->response([
				'id' => 404,
				'data' => 'id_not found'
			],REST_Controller::HTTP_BAD_REQUEST);
		} else {
			if($this->Model->delete_admin($id) > 0){
					$this->response([
					'status' => 1,
					'data' => 'Succes Delete data'
				],REST_Controller::HTTP_OK);
			} else {
				$this->response([
					'status' => 0,
					'data' => 'Failed Delete Data'
				],REST_Controller::HTTP_NOT_FOUND);
			}
		} 
	}

	public function index_put()
	{
		$id = $this->put('id');
		$data = [
			'nama_admin' => $this->put('nama'),
			'username_admin' => $this->put('username'),
			'email_admin' => $this->put('email'), 
			'password_admin' => $this->put('password'),
			'foto_admin' => $this->put('foto')
		];

		//$this->response(['data'=>$data ,'id'=>$id]);

		if ($this->Model->put_admin($id,$data) > 0) {
			$this->response([
				'status' => 1,
				'data' => 'Succes Update data'
			],REST_Controller::HTTP_OK);
		} else {
			$this->response([
				'status' => 0,
				'data' => 'Failed Update Data'
			],REST_Controller::HTTP_NOT_FOUND);
		}

	}
}