<?php defined('BASEPATH') or exit('No direct script access allowed');

class Surat_model extends CI_Model
{
    private $_table = "tbl_surat_masuk";

    public $no_surat;
    public $tgl_surat;
    public $perihal;
    public $file_surat;

    public function rules()
    {
        return [
            [
                'field' => 'nosurat',
                'label' => 'Nomor Surat',
                'rules' => 'required'
            ],

            [
                'field' => 'tglsurat',
                'label' => 'Tanggal Surat',
                'rules' => 'required'
            ],

            [
                'field' => 'perihal',
                'label' => 'Perihal',
                'rules' => 'required'
            ],

        ];
    }

    public function rules2()
    {
        return [
            [
                'field' => 'nosurat',
                'label' => 'Nomor Surat',
                'rules' => 'required'
            ],

            [
                'field' => 'tglsurat',
                'label' => 'Tanggal Surat',
                'rules' => 'required'
            ],

            [
                'field' => 'perihal',
                'label' => 'Perihal',
                'rules' => 'required'
            ],

            [
                'field' => 'pengirim',
                'label' => 'Pengirim',
                'rules' => 'required'
            ],

        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result_array();
    }
    
    public function getAllKeluar()
    {
        return $this->db->get('tbl_surat_keluar')->result_array();
    }

    public function getById($id_surat)
    {
        return $this->db->get_where($this->_table, ["id_surat" => $id_surat])->row_array();
    }

    public function getByIdKeluar($id_surat)
    {
        return $this->db->get_where('tbl_surat_keluar', ["id_surat" => $id_surat])->row_array();


    }

    function status($idsurat)
    {
        $data = array(
            'status' => '1'
        );
        return $this->db->update('tbl_surat_masuk', $data, array('id_surat' => $idsurat));
    }

    public function saveKeluar()
    {
        error_reporting(0);
        $post = $this->input->post();
        $this->no_surat = $post["nosurat"];
        $this->tgl_surat = $post["tglsurat"];
        $this->perihal = $post["perihal"];
        $this->nip = $post["pengirim"];
        $this->file_surat = $this->_uploadfile();
        $this->db->insert('tbl_surat_keluar', $this);
    }

    public function updateKeluar()
    {
        error_reporting(0);
        $post = $this->input->post();
        $this->id_surat = $post["idsurat"];
        $this->no_surat = $post["nosurat"];
        $this->tgl_surat = $post["tglsurat"];
        $this->perihal = $post["perihal"];
        $this->nip = $post["pengirim"];

        if (!empty($_FILES["file_surat"]["name"])) {
            $this->file_surat = $this->_uploadfile();
        } else {
            $this->file_surat = $post["old_file"];
        }
        $this->tgl_surat = $post["tglsurat"];
        $this->db->update('tbl_surat_keluar', $this, array('id_surat' => $post['idsurat']));
    }

    public function save()
    {
        error_reporting(0);
        $post = $this->input->post();
        $this->no_surat = $post["nosurat"];
        $this->tgl_surat = $post["tglsurat"];
        $this->perihal = $post["perihal"];
        $this->file_surat = $this->_uploadfile();
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        error_reporting(0);
        $post = $this->input->post();
        $this->id_surat = $post["idsurat"];
        $this->no_surat = $post["nosurat"];
        $this->tgl_surat = $post["tglsurat"];
        $this->perihal = $post["perihal"];
        $this->nip = $post["pengirim"];

        if (!empty($_FILES["file_surat"]["name"])) {
            $this->file_surat = $this->_uploadfile();
        } else {
            $this->file_surat = $post["old_file"];
        }
        $this->tgl_surat = $post["tglsurat"];
        $this->db->update($this->_table, $this, array('id_surat' => $post['idsurat']));
    }

    public function delete($idsurat)
    {
        return $this->db->delete($this->_table, array('id_surat' => $idsurat));
    }

    public function deleteKeluar($idsurat)
    {
        return $this->db->delete('tbl_surat_keluar', array('id_surat' => $idsurat));
    }

    private function _uploadfile()
    {
        $this->load->helper('inflector');
        $file_name = underscore($_FILES['file_surat']['name']);
        $config['upload_path']          = './upload/berkas/';
        $config['allowed_types']        = 'pdf|jpg|docx|doc|jpeg|png';
        $config['file_name']            = $file_name;
        $config['overwrite']            = true;
        $config['max_size']             = 25120; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file_surat')) {
            $data = array('error' => $this->upload->display_errors()); //associate view variable $error with upload errors
        } else {
            return $this->upload->data("file_name");
        }
    }

    public function getBlmDisp()
    {
        $post = $this->input->post();
        $tanggal1 = $post['tanggal1'];
        $tanggal2 = $post['tanggal2'];

        $this->db->select('*');
        $this->db->from('tbl_surat_masuk');
        $this->db->where('tgl_surat >=', $tanggal1);
        $this->db->where('tgl_surat <=', $tanggal2);
        $this->db->where('status', '0');
        return $this->db->get()->result_array();
    }

    public function getSuratKeluar()
    {
        $post = $this->input->post();
        $tanggal1 = $post['tanggal1'];
        $tanggal2 = $post['tanggal2'];

        $this->db->select('*');
        $this->db->from('tbl_surat_keluar');
        $this->db->join('tbl_user', 'tbl_user.nip=tbl_surat_keluar.nip');
        $this->db->where('tgl_surat >=', $tanggal1);
        $this->db->where('tgl_surat <=', $tanggal2);
        return $this->db->get()->result_array();
    }

    public function getPegawai()
    {
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where('role_id', '2');
        return $this->db->get()->result_array();
    }

}