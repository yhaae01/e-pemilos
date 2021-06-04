<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Datapeng extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_pengawas', 'mp');
	}

	public function index()
	{
		$x['data'] = $this->mp->show_pengawas();
		$this->load->view('templates/admin/header');
		$this->load->view('datapengawas', $x);
		$this->load->view('templates/admin/footer');
	}

	function insert()
	{
		$result = $this->mp->insert_data();
		if ($result) {
			$this->session->set_flashdata('success_msg', 'Data berhasil ditambah');
		} else {
			$this->session->set_flashdata('error_msg', 'Gagal menambah data');
		}
		redirect(base_url('Datapeng'));
	}

	public function edit($id)
	{
		$result = $this->mp->editpengawas($id);
		if ($result) {
			$this->session->set_flashdata('success_msg', 'Data berhasil diubah');
		} else {
			$this->session->set_flashdata('error_msg', 'Gagal mengubah data');
		}
		redirect(base_url('Datapeng'));
	}

	public function delete($id)
	{
		$result = $this->mp->deletepengawas($id);
		if ($result) {
			$this->session->set_flashdata('success_msg', 'Data berhasil dihapus');
		} else {
			$this->session->set_flashdata('error_msg', 'Gagal menghapus data');
		}
		redirect(base_url('Datapeng'));
	}

	public function hapussemua()
	{
		$result = $this->mp->truncate();
		redirect(base_url('Datapeng'));
	}
}
