<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jawaban extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Pernyataan_model');
		$this->load->model('Pelanggan_model');
		$this->load->model('Jawaban_model');
	}

	public function tambah_jawaban()
	{
		$data['pelanggan'] = $this->Pelanggan_model->dapat_satu_pelanggan($this->session->userdata('id_pelanggan'));
		$data['pernyataan'] = $this->Pernyataan_model->dapat_pernyataan($this->input->post('id_kuesioner'));
		$data['title'] = 'Isi Kuesioner';
		$this->load->view('templates/header', $data);
		$this->load->view('pelanggan/kuesioner/tambah_jawaban', $data);
		$this->load->view('templates/footer');
	}

	public function proses_tambah_jawaban()
	{
		$data = $this->Pernyataan_model->dapat_pernyataan($this->input->post('id_kuesioner'));

		$jumlah_pertanyaan = count($data);

		for ($i = 0; $i < $jumlah_pertanyaan; $i++) {
			$key = 'presepsi' . $i + 1;
			$key2 = 'ekspetasi' . $i + 1;
			$this->form_validation->set_rules($key, 'Presepsi', 'required');
			$this->form_validation->set_rules($key2, 'Ekspetasi', 'required');
		}

		if ($this->form_validation->run() == false) {
			$this->tambah_jawaban();
		} else {
			try {

				for ($i = 0; $i < $jumlah_pertanyaan; $i++) {
					$key = 'presepsi' . $i + 1;
					$key2 = 'ekspetasi' . $i + 1;
					$presepsi = $_POST[$key];
					$ekspetasi = $_POST[$key2];

					$data_jawaban = [
						'id_kuesioner' => $this->input->post('id_kuesioner'),
						'id_pernyataan' => $data[$i]->id_pernyataan,
						'presepsi' => $presepsi,
						'ekspetasi' => $ekspetasi,
						'id_pelanggan' => $this->session->userdata('id_pelanggan'),
					];
					$this->Jawaban_model->tambah_jawaban($data_jawaban);

					$this->session->set_flashdata('message', '<strong>Pengisian Kuesioner Berhasil, Terimaksih Atas Waktu Anda</strong>
											<i class="bi bi-check-circle-fill"></i>');
				}
				$data_sudah_isi_kuesioner = [
					'id_kuesioner' => $this->input->post('id_kuesioner'),
					'id_pelanggan' => $this->session->userdata('id_pelanggan')
				];
				$this->db->insert('t_sudah_isi_kuesioner', $data_sudah_isi_kuesioner);
			} catch (Exception $e) {
				$this->session->set_flashdata('message', '<strong>Pengisian Kuesioner Gagal, Silahkan coba ulang</strong>
											<i class="bi bi-exclamation-circle-fill"></i>');
			}
			redirect('pelanggan/kuesioner');
		}
	}
}
