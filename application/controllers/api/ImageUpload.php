<?php  
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';



class ImageUpload extends REST_Controller{
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
    	$mahasiswa = $this->Model->get_pesans($id);
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
		$gambar = $_FILES['foto']['name'];
		if ($gambar == "") {
			$this->response([
				'status' => 404,
				'data' => 'Gambar Kosong'
			],REST_Controller::HTTP_BAD_REQUEST);
		} else {
			$config['allowed_types'] = "jpg|png|gif";
			$config['upload_path'] = "./asset/img/";
			$this->load->library('upload',$config);
			if ($this->upload->do_upload('foto')) {
				$this->response([
					'status' => 1,
					'data' => 'Image Upload Success'
				],REST_Controller::HTTP_OK);
			} else {
				$this->response([
					'status' => 0,
					'data' => 'Failed Upload Data'
				],REST_Controller::HTTP_NOT_FOUND);
			}

		}
	}


}