<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model("berkas_model");
        $this->load->model("jberkas_model");
        $this->load->model("pengajuan_model");
        $this->load->model("history_model");
        $this->load->model("mcountdown");
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();

        $nip = $this->session->userdata('nip');
        $data['notifikasi'] = $this->pengajuan_model->getNotif_u($nip);
        $data['history'] = $this->history_model->getHistory_u($nip);

        $data['timer'] = $this->mcountdown->select_time($nip);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('dashboard/index', $data);
        $this->load->view('templates/footer');
    }

    public function tWaktu()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('dashboard/t_waktu', $data);
        $this->load->view('templates/footer');
    }

    public function time()
    {
        $tanggal_start =$this->input->post('start');
        $waktu_start = $this->input->post('waktu_start');
        $nip = $this->input->post('nip');
        $s = strtotime("$waktu_start $tanggal_start");
        //$start =array('waktu'=>date('Y:m:d H:i:s', $s));
        $result = $this->mcountdown->time($s, $nip);
        if($result == true){
        redirect(site_url('dashboard'));
        } else {
        redirect(site_url());
        }
    }

    public function reWaktu()
    {
        $nip = $this->session->userdata('nip');
        $this->mcountdown->delete($nip);
        redirect(site_url('dashboard'));
    }
}
