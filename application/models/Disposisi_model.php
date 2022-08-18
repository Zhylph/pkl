<?php defined('BASEPATH') or exit('No direct script access allowed');

class Disposisi_model extends CI_Model
{
    private $_table = "tbl_disposisi";

    public $d_id_surat;
    public $tgl_disposisi;
    public $perintah;
    public $file_disposisi;

    public function rules()
    {
        return [
            [
                'field' => 'tgldisposisi',
                'label' => 'Tanggal Disposisi',
                'rules' => 'required'
            ],

            [
                'field' => 'perintah',
                'label' => 'Perintah',
                'rules' => 'required'
            ],


        ];
    }

    public function getById($id_surat)
    {
        $this->db->select('*');
        $this->db->from('tbl_disposisi');
        $this->db->join('tbl_surat_masuk', 'tbl_surat_masuk.id_surat=tbl_disposisi.d_id_surat');
        $this->db->where_in('d_id_surat', $id_surat);
        return $this->db->get()->row_array();
    }

    public function disposisikan()
    {
        error_reporting(0);
        $post = $this->input->post();
        $this->d_id_surat = $post["idsurat"];
        $this->tgl_disposisi = $post["tgldisposisi"];
        $this->perintah = $post["perintah"];
        $this->file_disposisi = $this->_uploadfile();
        $this->db->insert($this->_table, $this);
    }

    public function delete($idsurat)
    {
        return $this->db->delete($this->_table, array('id_surat' => $idsurat));
    }

    private function _uploadfile()
    {
        $this->load->helper('inflector');
        $file_name = underscore($_FILES['file_disposisi']['name']);
        $config['upload_path']          = './upload/berkas/';
        $config['allowed_types']        = 'pdf|jpg|docx|doc|jpeg|png';
        $config['file_name']            = $file_name;
        $config['overwrite']            = true;
        $config['max_size']             = 25120; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file_disposisi')) {
            $data = array('error' => $this->upload->display_errors()); //associate view variable $error with upload errors
        } else {
            return $this->upload->data("file_name");
        }
    }

    public function getLapDisp()
    {
        $post = $this->input->post();
        $tanggal1 = $post['tanggal1'];
        $tanggal2 = $post['tanggal2'];

        $this->db->select('*');
        $this->db->from('tbl_surat_masuk');
        $this->db->join('tbl_disposisi', 'tbl_disposisi.d_id_surat=tbl_surat_masuk.id_surat');
        $this->db->where('tgl_surat >=', $tanggal1);
        $this->db->where('tgl_surat <=', $tanggal2);
        $this->db->where('status', '1');
        return $this->db->get()->result_array();
    }

}