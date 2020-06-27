<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dokumentasi extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('upload');
	}
	
	public function index()
	{
		$content = 'admin/dokumentasi';
		$data['dokumentasi'] = $this->db->get('tbl_dokumentasi')->result_array();

		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/navbar');
		$this->load->view('admin/layout/sidebar');
		$this->load->view($content,$data);
	}

	// public function add(){
	// 	// var_dump($_POST);
	// 	// exit();
	//         	$config['upload_path'] = './assets/mockup/core/img/dokumentasi'; //path folder
	//             $config['allowed_types'] = 'jpg|jpeg|png|pdf'; //type yang dapat diakses bisa anda sesuaikan
	//             $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
	//             $this->load->library('upload', $config);
	//             // $this->upload->initialize($config);
	//             if(!empty($_FILES['xfile']['name']))
	//             {
	//             	if ($this->upload->do_upload('xfile'))
	//             	{
	//             		$gbr = $this->upload->data();
	//             		$file=$gbr['file_name'];

	            		// $dt_dokumentasi = array(
	            		// 	'photo_dok' => $file,
	            		// 	'pr_title' => strip_tags($this->input->post('title')),
	            		// 	'pr_desc' => strip_tags($this->input->post('deskripsi')),
	            		// );

	            		// $this->db->insert('tbl_dokumentasi', $dt_dokumentasi);
	//             		echo "<script type='text/javascript'>alert('data berhasil ditambahkan');window.location.replace('./');</script>";
	//             	}else{
	//             		echo "<script type='text/javascript'>alert('gagal ditambahkan');window.location.replace('./');</script>";
	//             	}

	//             }else{
	//             	redirect('admin/dokumentasi');
	//             }
	//         }

	function add(){
		var_dump($_POST);
		exit();
      $config['upload_path'] = './assets/mockup/core/img/dokumentasi/'; //path folder
      $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
      $config['encrypt_name'] = TRUE;

      $this->upload->initialize($config);

      if(!empty($_FILES['xfile']['name'])){
      	if ($this->upload->do_upload('xfile')){
      		$gbr = $this->upload->data();
                  //Compress Image
      		$this->_create_thumbs($gbr['file_name']);
      		$dt_dokumentasi = array(
	            			'file_dok' => $file,
	            			'thumb_file' => $file,
	            			'pr_title' => strip_tags($this->input->post('title')),
	            			'pr_desc' => strip_tags($this->input->post('deskripsi')),
	            		);
      		$this->db->insert('tbl_dokumentasi', $dt_dokumentasi);
      		echo "<script type='text/javascript'>alert('data berhasil ditambahkan');window.location.replace('./');</script>";
      		// redirect('upload');
      	}else{
      		echo $this->upload->display_errors();
      	}

      }else{
      	echo "<script type='text/javascript'>alert('gagal ditambahkan');window.location.replace('./');</script>";
      }
  }

  function _create_thumbs($file_name){
        // Image resizing config
  	$config = array(
  			'image_library' => 'GD2',
  			'source_image'  => './assets/mockup/core/img/dokumentasi/'.$file_name,
  			'maintain_ratio'=> FALSE,
  			'width'         => 100,
  			'height'        => 67,
  			'new_image'     => './assets/mockup/core/img/dokumentasi/thumb_file/'.$file_name
  		);

  	$this->load->library('image_lib',$config);
  	// foreach ($config as $item){
  		// $this->image_lib->initialize($config);
  		$this->image_lib->resize();
  		// if(!$this->image_lib->resize()){
  		// 	return false;
  		// }
  		$this->image_lib->clear();
  	// }
  }

  function addVideo(){
      $config['upload_path'] = './assets/mockup/core/img/dokumentasi/'; //path folder
      $config['allowed_types'] = 'mp4';
      $config['encrypt_name'] = TRUE;

      $this->upload->initialize($config);

      if(!empty($_FILES['xvideo']['name'])){
      	if ($this->upload->do_upload('xvideo')){
      		$gbr = $this->upload->data();
                  //Compress Image
      		$this->_create_thumbs($gbr['file_name']);
      		$dt_dokumentasi = array(
	            			'file_dok' => $file,
	            			'thumb_file' => $file,
	            			'pr_title' => strip_tags($this->input->post('title')),
	            			'pr_desc' => strip_tags($this->input->post('deskripsi')),
	            		);
      		$this->db->insert('tbl_dokumentasi', $dt_dokumentasi);
      		echo "<script type='text/javascript'>alert('data berhasil ditambahkan');window.location.replace('./');</script>";
      		// redirect('upload');
      	}else{
      		echo $this->upload->display_errors();
      	}

      }else{
      	echo "<script type='text/javascript'>alert('gagal ditambahkan');window.location.replace('./');</script>";
      }
  }

  public function hapus(){
	        	// var_dump($_POST);
	        	// exit();
  	$data = $this->input->post('filephoto');
  	$path='./assets/mockup/core/img/dokumentasi/'.$data;
  	unlink($path);
  	$this->db->delete('tbl_dokumentasi', ['id_dokumentasi' => $this->input->post('id')]);
  	echo "<script type='text/javascript'>alert('berhasil dihapus');window.location.replace('./');</script>";
  }
}
