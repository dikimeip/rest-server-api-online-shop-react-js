<?php  
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class PemesananController extends REST_Controller{
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
		//$this->response(['id'=> $id]);


		if ($id == null) {
			$this->response(['id'=> 'kosong']);
			// $mahasiswa = $this->Model->get_pesan();
		} else {
			//$this->response(['id'=> 'ada']);
			 $mahasiswa = $this->Model->get_pesan($id);
		}


		if ($mahasiswa > 0) {
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
			'id_user' => $this->post('user'),
			'id_produk' => $this->post('produk'),
			'count_produk' => $this->post('count'),
			'desk_pemesanan' => $this->post('desk'),
			'namaproduk' => $this->post('namap'),
			'hargaproduk' => $this->post('hargap'),
			'namauser' => $this->post('namau'),
			'jumlahp' => $this->post('jml'),
		];

		if ($this->Model->post_pemesanan($data) > 0 ) {
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
				'status' => 404,
				'data' => 'id_not found'
			],REST_Controller::HTTP_BAD_REQUEST);
		} else {
			if($this->Model->delete_pesan($id) > 0){
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
			'desk_pemesanan' => $this->put('ket')
		];

		if ($this->Model->put_pemesanan($id,$data) > 0) {
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