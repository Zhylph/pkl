<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model("data_model");
        $this->load->model("berkas_model");
        $this->load->model("jberkas_model");
        $this->load->model("pengajuan_model");
        $this->load->model("jpengajuan_model");
        $this->load->model("history_model");
        $this->load->model("surat_model");
        $this->load->model("disposisi_model");
        $this->load->model("kegiatan_model");
        $this->load->model("alat_model");
        $this->load->model("panitia_model");
        $this->load->model("hasil_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Informasi Pegawai';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();

        $data['pegawai'] = $this->data_model->getPeg();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('data/pegawai', $data);
        $this->load->view('templates/footer');
    }

    public function berkas()
    {
        $data['title'] = 'Informasi Berkas';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();


        $data['berkas'] = $this->berkas_model->getJBerkas();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('data/berkas', $data);
        $this->load->view('templates/footer');
    }

    public function pengajuan()
    {
        $data['title'] = 'Informasi Pengajuan';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();

        $data['pengajuan'] = $this->pengajuan_model->getPengajuan();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('data/pengajuan', $data);
        $this->load->view('templates/footer');
    }

    public function jenisberkas()
    {
        $data['title'] = 'Daftar Berkas';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();

        $data['jenisb'] = $this->jberkas_model->getAll();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('data/jenisberkas', $data);
        $this->load->view('templates/footer');
    }

    public function jenispengajuan()
    {
        $data['title'] = 'Daftar Pengajuan';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();

        $data['jenisp'] = $this->jpengajuan_model->getAll();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('data/jenispengajuan', $data);
        $this->load->view('templates/footer');
    }

    public function addpegawai()
    {
        $data['title'] = 'Data Pegawai';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();

        $pegawai = $this->data_model;
        $validation = $this->form_validation;
        $validation->set_rules($pegawai->rules());

        if ($validation->run()) {
            $pegawai->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view("data/t_pegawai");
        $this->load->view('templates/footer');
    }

    public function addberkas()
    {
        $data['title'] = 'Data Berkas';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['jberkas'] = $this->db->get('tbl_jenis_berkas')->result_array();
        $data['jpengajuan'] = $this->db->get('tbl_jenis_pengajuan')->result_array();

        $berkas = $this->berkas_model;
        $validation = $this->form_validation;
        $validation->set_rules($berkas->rules());

        if ($validation->run()) {
            $berkas->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect('data/berkas');
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view("data/t_berkas", $data);
        $this->load->view('templates/footer');
    }

    /* public function tambahberkas()
    {
        $data['title'] = 'Data Berkas';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['jberkas'] = $this->db->get('tbl_jenis_berkas')->result_array();
        $data['jpengajuan'] = $this->db->get('tbl_jenis_pengajuan')->result_array();
        $this->load->model('Berkas_model', 'Berkas');

        $this->form_validation->set_rules('nip', 'NIP', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view("data/t_berkas", $data, array('error' => ' '));
            $this->load->view('templates/footer');
        } else {
            $this->load->helper('inflector');
            $file_name = underscore($_FILES['file_var_name']['name']);
            $config['upload_path']          = './upload/berkas/';
            $config['allowed_types']        = 'pdf';
            $config['file_name']            = $file_name;
            $config['overwrite']            = true;
            $config['max_size']             = 5120; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file_berkas')) {
            $error = array('error' => $this->upload->display_errors()); //associate view variable $error with upload errors

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view("data/t_berkas", $data, $error);
            $this->load->view('templates/footer');
        } else {
            $data = [

            ]
            return $this->upload->data("file_name");
        }
        }
        
    } */

    public function addjberkas()
    {
        $data['title'] = 'Data Jenis Berkas';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();

        $jberkas = $this->jberkas_model;
        $validation = $this->form_validation;
        $validation->set_rules($jberkas->rules());

        if ($validation->run()) {
            $jberkas->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view("data/t_jenisberkas");
        $this->load->view('templates/footer');
    }

    public function addjpengajuan()
    {
        $data['title'] = 'Data Jenis Pengajuan';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();

        $jpengajuan = $this->jpengajuan_model;
        $validation = $this->form_validation;
        $validation->set_rules($jpengajuan->rules());

        if ($validation->run()) {
            $jpengajuan->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view("data/t_jenispengajuan");
        $this->load->view('templates/footer');
    }

    public function editpeg($idpegawai = null)
    {
        $data['title'] = 'Data Pegawai';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();

        $peg = $this->data_model;
        $validation = $this->form_validation;
        $validation->set_rules($peg->rules());

        if ($validation->run()) {
            $peg->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect('data');
        }

        $data["peg"] = $peg->getById($idpegawai);
        if (!$data["peg"]) show_404();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view("data/e_pegawai", $data);
        $this->load->view('templates/footer');
    }

    public function editberkas($idberkas = null)
    {
        $data['title'] = 'Data Berkas';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['jberkas'] = $this->db->get('tbl_jenis_berkas')->result_array();

        $berkas = $this->berkas_model;
        $validation = $this->form_validation;
        $validation->set_rules($berkas->rules());

        if ($validation->run()) {
            $berkas->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect('data/berkas');
        }

        $data["berkas"] = $berkas->getById($idberkas);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view("data/e_berkas", $data);
        $this->load->view('templates/footer');
    }

    public function editjberkas($idjb = null)
    {
        $data['title'] = 'Data Jenis Berkas';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();


        $jenisb = $this->jberkas_model;
        $validation = $this->form_validation;
        $validation->set_rules($jenisb->rules());

        if ($validation->run()) {
            $jenisb->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect('data/jenisberkas');
        }

        $data["jenisb"] = $jenisb->getById($idjb);
        if (!$data["jenisb"]) show_404();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view("data/e_jenisberkas", $data);
        $this->load->view('templates/footer');
    }

    public function editjpengajuan($idjp = null)
    {
        $data['title'] = 'Data Jenis Pengajuan';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();


        $jenisp = $this->jpengajuan_model;
        $validation = $this->form_validation;
        $validation->set_rules($jenisp->rules());

        if ($validation->run()) {
            $jenisp->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect('data/jenispengajuan');
        }

        $data["jenisp"] = $jenisp->getById($idjp);
        if (!$data["jenisp"]) show_404();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view("data/e_jenispengajuan", $data);
        $this->load->view('templates/footer');
    }

    public function deletepegawai($idpegawai = null)
    {
        if (!isset($idpegawai)) show_404();

        if ($this->data_model->delete($idpegawai)) {
            $this->session->set_flashdata('success', 'Berhasil dihapus');
            redirect(site_url('data'));
        }
    }

    public function deleteberkas($idberkas = null)
    {
        if (!isset($idberkas)) show_404();

        if ($this->berkas_model->delete($idberkas)) {
            $this->session->set_flashdata('success', 'Berhasil dihapus');
            redirect(site_url('data/berkas'));
        }
    }

    public function deletejberkas($idjb = null)
    {
        if (!isset($idjb)) show_404();

        if ($this->jberkas_model->delete($idjb)) {
            $this->session->set_flashdata('success', 'Berhasil dihapus');
            redirect(site_url('data/jenisberkas'));
        }
    }

    public function deletejpengajuan($idjp = null)
    {
        if (!isset($idjp)) show_404();

        if ($this->jpengajuan_model->delete($idjp)) {
            $this->session->set_flashdata('success', 'Berhasil dihapus');
            redirect(site_url('data/jenispengajuan'));
        }
    }

    public function approve1($id_pengajuan)
    {
        $post['pengajuan'] = $this->pengajuan_model->getById($id_pengajuan);

        if ($this->pengajuan_model->approve($id_pengajuan)) { ?>
            <script>
                alert("Data Berhasil Dihapus");
            </script>
        <?php
            redirect('data/approve_kp', 'refresh');
        } else {
            die("Data Berhasil Dihapus");
        }
    }

    public function approve2($id_pengajuan)
    {
        $post['pengajuan'] = $this->pengajuan_model->getById($id_pengajuan);

        if ($this->pengajuan_model->approve($id_pengajuan)) { ?>
            <script>
                alert("Data Berhasil Dihapus");
            </script>
        <?php
            redirect('data/approve_kg', 'refresh');
        } else {
            die("Ada masalah Approve data");
        }
    }

    public function approve3($id_pengajuan)
    {
        $post['pengajuan'] = $this->pengajuan_model->getById($id_pengajuan);

        if ($this->pengajuan_model->approve($id_pengajuan)) { ?>
            <script>
                alert("Data Berhasil Dihapus");
            </script>
        <?php
            redirect('data/approve_p', 'refresh');
        } else {
            die("Terjadi Kesalahan");
        }
    }

    public function approve4($id_pengajuan)
    {
        $post['pengajuan'] = $this->pengajuan_model->getById($id_pengajuan);

        if ($this->pengajuan_model->approve($id_pengajuan)) { ?>
            <script>
                alert("Data Berhasil Dihapus");
            </script>
<?php
            redirect('data/approve_c', 'refresh');
        } else {
            die("Terjadi Kesalahan");
        }
    }

    public function print()
    {
        $data['user'] = $this->data_model->getAll()->result();
        $this->load->view('p_pegawai', $data);
    }

    public function pdf()
    {
        $this->load->library('dompdf_gen');
        $data['pegawai'] = $this->data_model->getPeg();
        $this->load->view('laporan/l_pegawai', $data);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("Laporan_Pegawai.pdf", array('Attachment' => 0));
    }

    public function pdfberkas()
    {
        $this->load->library('dompdf_gen');
        $data['berkas'] = $this->berkas_model->getJBerkas();
        $this->load->view('laporan/l_berkas', $data);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("Laporan_Berkas.pdf", array('Attachment' => 0));
    }

    public function pdfpengajuankp()
    {
        $this->load->library('dompdf_gen');
        $data['pengajuan'] = $this->pengajuan_model->getKP1();
        $this->load->view('laporan/l_pengajuankp', $data);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("Laporan_Kenaikan_Pangkat.pdf", array('Attachment' => 0));
    }

    public function pdfpengajuankg()
    {
        $this->load->library('dompdf_gen');
        $data['pengajuan'] = $this->pengajuan_model->getKG1();
        $this->load->view('laporan/l_pengajuankg', $data);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("Laporan_Kenaikan_Gaji.pdf", array('Attachment' => 0));
    }

    public function pdfpengajuanpensi()
    {
        $this->load->library('dompdf_gen');
        $data['pengajuan'] = $this->pengajuan_model->getP1();
        $this->load->view('laporan/l_pengajuanpensi', $data);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("Laporan_Pensiun.pdf", array('Attachment' => 0));
    }

    public function pdfpengajuancuti()
    {
        $this->load->library('dompdf_gen');
        $data['pengajuan'] = $this->pengajuan_model->getC();
        $this->load->view('laporan/l_pengajuancuti', $data);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("Laporan_cuti.pdf", array('Attachment' => 0));
    }

    public function pdfpengajuan()
    {
        $this->load->library('dompdf_gen');
        $data['pengajuan'] = $this->pengajuan_model->getPengajuan();
        $this->load->view('laporan/l_pengajuan', $data);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("Laporan_Pengajuan.pdf", array('Attachment' => 0));
    }

    public function laporan()
    {
        $data['title'] = 'List Laporan';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('laporan/listlaporan', $data);
        $this->load->view('templates/footer');
    }

    public function terimaPengajuan_kp()
    {
        $id = $this->input->post('id');
        $nip = $this->input->post('nip');
        $nama = $this->input->post('nama');
        $id_jns_peng = $this->input->post('id_jns_peng');
        $golongan_lama = $this->input->post('golongan_lama');
        $golongan = $this->input->post('golongan');
        $this->pengajuan_model->addNotif($nip, urldecode($nama));

        $this->pengajuan_model->terimaPengajuan_kp($id, $golongan, $golongan_lama);
        $this->pengajuan_model->golonganBaru($nip, $golongan);
        $this->history_model->addHistory($nip, $id_jns_peng);

        $this->session->set_flashdata('success', 'Pengajuan berhasil diterima!');
        redirect('data/approve_kp');
    }

    public function tolakPengajuan()
    {
        $id = $this->input->post('id');
        $nip = $this->input->post('nip');
        $nama = $this->input->post('nama');
        $id_jns_peng = $this->input->post('id_jns_peng');
        $alasan = $this->input->post('alasan');
        $this->pengajuan_model->notifTolak($nip, $nama, $alasan);

        $this->pengajuan_model->tolakPengajuan($id, $alasan);
        $this->history_model->addHistoryTolak($nip, $id_jns_peng, $alasan);

        $this->session->set_flashdata('success', 'Pengajuan berhasil ditolak!');
        redirect('data/approve_kp');
    }

    public function accPengajuan_kg($id, $nip, $nama, $id_jns_peng)
    {
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();

        $this->pengajuan_model->addNotif($nip, urldecode($nama));
        $this->pengajuan_model->terimaPengajuan($id);
        $this->history_model->addHistory($nip, $id_jns_peng);
        $this->session->set_flashdata('success', 'Pengajuan telah diterima!');
        redirect('data/approve_kg');
    }

    public function terimaPengajuan_kg()
    {
        $id = $this->input->post('id');
        $nip = $this->input->post('nip');
        $nama = $this->input->post('nama');
        $id_jns_peng = $this->input->post('id_jns_peng');
        $gaji_lama = $this->input->post('gaji_lama');
        $gaji_baru = $this->input->post('gaji_baru');
        
        $this->pengajuan_model->addNotif($nip, urldecode($nama));
        $this->pengajuan_model->terimaPengajuan_kg($id, $gaji_baru, $gaji_lama);
        $this->pengajuan_model->gajiBaru($nip, $gaji_baru);
        $this->history_model->addHistory($nip, $id_jns_peng);

        $this->session->set_flashdata('success', 'Pengajuan berhasil diterima!');
        redirect('data/approve_kg');
    }

    public function tolakPengajuan_kg()
    {
        $id = $this->input->post('id');
        $nip = $this->input->post('nip');
        $nama = $this->input->post('nama');
        $id_jns_peng = $this->input->post('id_jns_peng');
        $alasan = $this->input->post('alasan');
        $this->pengajuan_model->notifTolak($nip, $nama, $alasan);

        $this->pengajuan_model->tolakPengajuan($id, $alasan);
        $this->history_model->addHistoryTolak($nip, $id_jns_peng, $alasan);


        $this->session->set_flashdata('success', 'Pengajuan berhasil ditolak!');
        redirect('data/approve_kg');
    }

    public function accPengajuan_p($id, $nip, $nama, $id_jns_peng)
    {
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();

        $this->pengajuan_model->addNotif($nip, urldecode($nama));
        $this->pengajuan_model->terimaPengajuan_p($id);
        $this->history_model->addHistory($nip, $id_jns_peng);
        $this->session->set_flashdata('success', 'Pengajuan telah diterima!');
        redirect('data/approve_p');
    }

    public function tolakPengajuan_p()
    {
        $id = $this->input->post('id');
        $nip = $this->input->post('nip');
        $nama = $this->input->post('nama');
        $id_jns_peng = $this->input->post('id_jns_peng');
        $alasan = $this->input->post('alasan');
        $this->pengajuan_model->notifTolak($nip, $nama, $alasan);

        $this->pengajuan_model->tolakPengajuan($id, $alasan);
        $this->history_model->addHistoryTolak($nip, $id_jns_peng, $alasan);

        $this->session->set_flashdata('success', 'Pengajuan berhasil ditolak!');
        redirect('data/approve_p');
    }

    public function accPengajuan_c($id, $nip, $nama)
    {
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();

        $this->pengajuan_model->addNotif($nip, urldecode($nama));
        $this->pengajuan_model->terimaPengajuan($id);
        $this->session->set_flashdata('success', 'Pengajuan telah diterima!');
        redirect('data/approve_c');
    }

    public function tolakPengajuan_c()
    {
        $id = $this->input->post('id');
        $nip = $this->input->post('nip');
        $nama = $this->input->post('nama');
        $alasan = $this->input->post('alasan');
        $this->pengajuan_model->notifTolak($nip, $nama, $alasan);

        $this->pengajuan_model->tolakPengajuan($id, $alasan);

        $this->session->set_flashdata('success', 'Pengajuan berhasil ditolak!');
        redirect('data/approve_c');
    }

    public function terimaBerkas($id_berkas, $nip, $nama_berkas)
    {
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();

        $this->berkas_model->addNotif($nip, urldecode($nama_berkas));
        $this->berkas_model->accBerkas($id_berkas);
        $this->session->set_flashdata('success', 'Data telah diterima!');
        redirect('data/approve_b');
    }

    public function tolakBerkas()
    {
        $id_berkas = $this->input->post('id_berkas');
        $nip = $this->input->post('nip');
        $nama_berkas = $this->input->post('nama_berkas');
        $alasan = $this->input->post('alasan');
        $this->berkas_model->notifTolakBerkas($nip, $nama_berkas, $alasan);

        $this->berkas_model->tolakBerkas($id_berkas);

        $this->session->set_flashdata('success', 'Berkas berhasil ditolak!');
        redirect('data/approve_b');
    }

    public function approve_b()
    {
        $data['title'] = 'Data Berkas Baru';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();


        $data['berkas'] = $this->berkas_model->getBerkasBaru();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('approve/berkasbaru', $data);
        $this->load->view('templates/footer');
    }

    //Hapus Notif
    public function hapusNotif_kp($id_notif)
    {
        $this->berkas_model->hapusNotif($id_notif);
        redirect('data/approve_kp');
    }

    public function approve_kp()
    {
        $data['title'] = 'Kenaikan Pangkat';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();

        $nip = $this->session->userdata('nip');
        $data['notifikasi'] = $this->pengajuan_model->getNotif_p($nip);

        $data['pengajuan'] = $this->pengajuan_model->getKP();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('approve/kenaikanpangkat', $data);
        $this->load->view('templates/footer');
    }

    public function approve_kg()
    {
        $data['title'] = 'Kenaikan Gaji';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();

        $nip = $this->session->userdata('nip');
        $data['notifikasi'] = $this->pengajuan_model->getNotif_p($nip);

        $data['pengajuan'] = $this->pengajuan_model->getKG();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('approve/kenaikangaji', $data);
        $this->load->view('templates/footer');
    }

    public function approve_p()
    {
        $data['title'] = 'Pensiun';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();

        $nip = $this->session->userdata('nip');
        $data['notifikasi'] = $this->pengajuan_model->getNotif_p($nip);

        $data['pengajuan'] = $this->pengajuan_model->getP();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('approve/pensiun', $data);
        $this->load->view('templates/footer');
    }

    public function approve_c()
    {
        $data['title'] = 'Izin Cuti';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();

        $data['pengajuan'] = $this->pengajuan_model->getC();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('approve/izincuti', $data);
        $this->load->view('templates/footer');
    }

    public function cetak_kp($nip)
    {
        $data['title'] = 'Kenaikan Pangkat';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();

        $nip = $this->uri->segment(3);
        $data['pengajuan'] = $this->berkas_model->getPengajuanKP($nip);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('approve/cetak_kp', $data);
        $this->load->view('templates/footer');
    }

    public function cetak_kg($nip)
    {
        $data['title'] = 'Kenaikan Gaji';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();

        $nip = $this->uri->segment(3);
        $data['pengajuan'] = $this->berkas_model->getPengajuanKG($nip);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('approve/cetak_kp', $data);
        $this->load->view('templates/footer');
    }

    public function cetak_pensiun($nip)
    {
        $data['title'] = 'Pensiun';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();

        $nip = $this->uri->segment(3);
        $data['pengajuan'] = $this->berkas_model->getPengajuanP($nip);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('approve/cetak_kp', $data);
        $this->load->view('templates/footer');
    }

    public function cetak_cuti($nip)
    {
        $data['title'] = 'Izin Cuti';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();

        $nip = $this->uri->segment(3);
        $data['pengajuan'] = $this->berkas_model->getPengajuanC($nip);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('approve/cetak_kp', $data);
        $this->load->view('templates/footer');
    }

    public function listSurat()
    {
        $data['title'] = 'List Surat';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('data/listsurat', $data);
        $this->load->view('templates/footer');
    }

    public function suratKeluar()
    {
        $data['title'] = 'Surat Masuk';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();

        $data['surat'] = $this->surat_model->getAllKeluar();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('data/suratkeluar', $data);
        $this->load->view('templates/footer');
    }

    public function addSuratKeluar()
    {
        $data['title'] = 'Tambah Surat Keluar';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();

        $data['pegawai'] = $this->surat_model->getPegawai();
        $smasuk = $this->surat_model;
        $validation = $this->form_validation;
        $validation->set_rules($smasuk->rules2());

        if ($validation->run()) {
            $smasuk->saveKeluar();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect('data/suratkeluar');
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view("data/t_suratKeluar", $data);
        $this->load->view('templates/footer');
    }

    public function edSuratKeluar($id_surat = null)
    {
        $data['title'] = 'Ubah Data Surat';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();

        $data['pegawai'] = $this->surat_model->getPegawai();
        $smasuk = $this->surat_model;
        $validation = $this->form_validation;
        $validation->set_rules($smasuk->rules2());

        if ($validation->run()) {
            $smasuk->updateKeluar();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect('data/suratkeluar');
        }

        $data["surat"] = $smasuk->getByIdKeluar($id_surat);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view("data/e_suratkeluar", $data);
        $this->load->view('templates/footer');
    }

    public function delSuratKeluar($idsurat)
    {
        $this->surat_model->deleteKeluar($idsurat);
        $this->session->set_flashdata('success', 'Berhasil dihapus');
        redirect('data/suratkeluar');
        
    }

    public function lapSuratKeluar()
    {
        $data['title'] = 'Laporan Surat Keluar';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('laporan/l_suratkeluar', $data);
        $this->load->view('templates/footer');
    }

    public function cetakSuratKeluar()
    {
        $data['title'] = 'Laporan Use';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();

        $surat = $this->surat_model;
        $data['surat'] = $surat->getSuratKeluar();

        $data['tanggal1'] = $this->input->post('tanggal1');
        $data['tanggal2'] = $this->input->post('tanggal2');

        $this->load->library('dompdf_gen');
        $this->load->view('laporan/c_suratkeluar', $data);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("Surat Keluar.pdf", array('Attachment' => 0));
    }

    public function suratMasuk()
    {
        $data['title'] = 'Surat Masuk';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();

        $data['surat'] = $this->surat_model->getall();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('data/suratmasuk', $data);
        $this->load->view('templates/footer');
    }

    public function addSuratMasuk()
    {
        $data['title'] = 'Tambah Surat Masuk';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();

        $smasuk = $this->surat_model;
        $validation = $this->form_validation;
        $validation->set_rules($smasuk->rules());

        if ($validation->run()) {
            $smasuk->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect('data/suratmasuk');
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view("data/t_suratmasuk", $data);
        $this->load->view('templates/footer');
    }

    public function edSuratMasuk($id_surat = null)
    {
        $data['title'] = 'Ubah Data Surat';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();

        $smasuk = $this->surat_model;
        $validation = $this->form_validation;
        $validation->set_rules($smasuk->rules());

        if ($validation->run()) {
            $smasuk->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect('data/suratmasuk');
        }

        $data["surat"] = $smasuk->getById($id_surat);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view("data/e_suratmasuk", $data);
        $this->load->view('templates/footer');
    }

    public function delSuratmasuk($idsurat)
    {
        $this->surat_model->delete($idsurat);
        $this->disposisi_model->delete($idsurat);
        $this->session->set_flashdata('success', 'Berhasil dihapus');
        redirect('data/suratmasuk');
        
    }

    public function disposisi($id_surat = null)
    {
        $data['title'] = 'Disposisi Surat Masuk';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();


        $smasuk = $this->surat_model;
        $disposisi = $this->disposisi_model;
        $validation = $this->form_validation;
        $validation->set_rules($disposisi->rules());

        if ($validation->run()) {
            $idsurat = $this->input->post('idsurat');
            $smasuk->status($idsurat);
            $disposisi->disposisikan();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect('data/suratmasuk');
        }

        $data["surat"] = $smasuk->getById($id_surat);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view("data/t_disposisi", $data);
        $this->load->view('templates/footer');
    }

    public function liatDisposisi($id_surat)
    {
        $data['title'] = 'Disposisi';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();


        $disposisi = $this->disposisi_model;

        $data["surat"] = $disposisi->getById($id_surat);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view("data/l_disposisi", $data);
        $this->load->view('templates/footer');
    }

    public function lapDiposisi()
    {
        $data['title'] = 'Laporan Surat Sudah Disposisi';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('laporan/l_disposisi', $data);
        $this->load->view('templates/footer');
    }

    public function cetakDisposisi()
    {
        $data['title'] = 'Laporan Use';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();

        $disposisi = $this->disposisi_model;
        $data['disposisi'] = $disposisi->getLapDisp();

        $data['tanggal1'] = $this->input->post('tanggal1');
        $data['tanggal2'] = $this->input->post('tanggal2');

        $this->load->library('dompdf_gen');
        $this->load->view('laporan/c_disposisi', $data);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("Disposisi.pdf", array('Attachment' => 0));
    }

    public function lapBlmDis()
    {
        $data['title'] = 'Laporan Surat Belum Disposisi';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('laporan/l_blmdisposisi', $data);
        $this->load->view('templates/footer');
    }

    public function cetakBlmDis()
    {
        $data['title'] = 'Laporan Use';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();

        $surat = $this->surat_model;
        $data['surat'] = $surat->getBlmDisp();

        $data['tanggal1'] = $this->input->post('tanggal1');
        $data['tanggal2'] = $this->input->post('tanggal2');

        $this->load->library('dompdf_gen');
        $this->load->view('laporan/c_blmdisposisi', $data);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("Belum Terdisposisi.pdf", array('Attachment' => 0));
    }

    public function kegiatan()
    {
        $data['title'] = 'Data Kegiatan';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();

        $data['kegiatan'] = $this->kegiatan_model->getKegiatan();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('data/kegiatan', $data);
        $this->load->view('templates/footer');
    }

    public function addkegiatan()
    {
        $data['title'] = 'Data Kegiatan';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();

        $kegiatan = $this->kegiatan_model;
        $validation = $this->form_validation;
        $validation->set_rules($kegiatan->rules());

        if ($validation->run()) {
            $kegiatan->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view("data/t_kegiatan");
        $this->load->view('templates/footer');
    }

    public function addalat()
    {
        $data['title'] = 'Data Kegiatan';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['kegiatan'] = $this->db->get('tbl_kegiatan')->result_array();
        $nip = $this->session->userdata('nip');

        $alat = $this->alat_model;
        $validation = $this->form_validation;
        $validation->set_rules($alat->rules());

        if ($validation->run()) {
            $alat->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan!');
            redirect('data/kegiatan');
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view("data/t_alat");
        $this->load->view('templates/footer');
    }

    public function addpanitia()
    {
        $data['title'] = 'Data Kegiatan';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['kegiatan'] = $this->db->get('tbl_kegiatan')->result_array();
        $nip = $this->session->userdata('nip');

        $panitia = $this->panitia_model;
        $validation = $this->form_validation;
        $validation->set_rules($panitia->rules());

        if ($validation->run()) {
            $panitia->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan!');
            redirect('data/kegiatan');
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view("data/t_panitia");
        $this->load->view('templates/footer');
    }

    public function addhasil()
    {
        $data['title'] = 'Data Kegiatan';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['kegiatan'] = $this->db->get('tbl_kegiatan')->result_array();
        $nip = $this->session->userdata('nip');

        $hasil = $this->hasil_model;
        $validation = $this->form_validation;
        $validation->set_rules($hasil->rules());

        if ($validation->run()) {
            $hasil->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan!');
            redirect('data/kegiatan');
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view("data/t_hasil");
        $this->load->view('templates/footer');
    }

    public function detailalat($id_kegiatan)
    {
        $data['title'] = 'Data Kegiatan';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();

        $nip = $this->uri->segment(3);
        $data['detail'] = $this->kegiatan_model->getDetailAlat($id_kegiatan);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('data/detail_alat', $data);
        $this->load->view('templates/footer');
    }

    public function detailpanitia($id_kegiatan)
    {
        $data['title'] = 'Data Kegiatan';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();

        $nip = $this->uri->segment(3);
        $data['detail'] = $this->kegiatan_model->getDetailPanitia($id_kegiatan);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('data/detail_panitia', $data);
        $this->load->view('templates/footer');
    }

    public function pdfhasil($id_kegiatan)
    {
        $this->load->library('dompdf_gen');
        $data['hasil'] = $this->hasil_model->getHasil($id_kegiatan);
        $this->load->view('laporan/l_hasil', $data);
        //var_dump($data);
        //die;
        $paper_size = 'A4';
        $orientation = 'potrait';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("Laporan_Hasil_Kegiatan.pdf", array('Attachment' => 0));
    }

    public function pdfhasilk($id_kegiatan)
    {
        $this->load->library('dompdf_gen');
        $data['kegiatan'] = $this->kegiatan_model->getLKegiatan($id_kegiatan);
        $data['panitia'] = $this->kegiatan_model->getLPanitia($id_kegiatan);
        $data['alat'] = $this->kegiatan_model->getLAlat($id_kegiatan);
        $this->load->view('laporan/l_kegiatan', $data);
        //var_dump($data);
        //die;
        $paper_size = 'A4';
        $orientation = 'potrait';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("Laporan_Kegiatan.pdf", array('Attachment' => 0));
    }

    public function editkegiatan($id_kegiatan = null)
    {
        $data['title'] = 'Data Kegiatan';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();

        $kegiatan = $this->kegiatan_model;
        $validation = $this->form_validation;
        $validation->set_rules($kegiatan->rules());

        if ($validation->run()) {
            $kegiatan->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect('data/kegiatan');
        }

        $data["kegiatan"] = $kegiatan->getById($id_kegiatan);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view("data/e_kegiatan", $data);
        $this->load->view('templates/footer');
    }

    public function editalat($id_alat = null)
    {
        $data['title'] = 'Data Kegiatan';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();

        $alat = $this->alat_model;
        $validation = $this->form_validation;
        $validation->set_rules($alat->rules());

        if ($validation->run()) {
            $alat->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect('data/kegiatan');
        }

        $data["alat"] = $alat->getById($id_alat);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view("data/e_alat", $data);
        $this->load->view('templates/footer');
    }

    public function editpanitia($id_panitia = null)
    {
        $data['title'] = 'Data Kegiatan';
        $data['user'] = $this->db->get_where('tbl_user', ['nip' => $this->session->userdata('nip')])->row_array();

        $panitia = $this->panitia_model;
        $validation = $this->form_validation;
        $validation->set_rules($panitia->rules());

        if ($validation->run()) {
            $panitia->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect('data/kegiatan');
        }

        $data["panitia"] = $panitia->getById($id_panitia);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view("data/e_panitia", $data);
        $this->load->view('templates/footer');
    }

    public function deletekegiatan($id_kegiatan = null)
    {
        if (!isset($id_kegiatan)) show_404();

        if ($this->kegiatan_model->delete($id_kegiatan)) {
            $this->session->set_flashdata('success', 'Berhasil dihapus');
            redirect(site_url('data/kegiatan'));
        }
    }

    public function deletealat($id_alat = null)
    {
        if (!isset($id_alat)) show_404();

        if ($this->alat_model->delete($id_alat)) {
            $this->session->set_flashdata('success', 'Berhasil dihapus');
            redirect(site_url('data/kegiatan'));
        }
    }

    public function deletepanitia($id_panitia = null)
    {
        if (!isset($id_panitia)) show_404();

        if ($this->panitia_model->delete($id_panitia)) {
            $this->session->set_flashdata('success', 'Berhasil dihapus');
            redirect(site_url('data/kegiatan'));
        }
    }
}
