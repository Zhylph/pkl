<?php defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Hasil_model extends CI_Model
{
    private $_table = "tbl_hasil";

    public $id_hasil;
    public $id_kegiatan;
    public $hasil_kegiatan;
    public $file_hasil;

    public function rules()
    {
        return [

            [
                'field' => 'hasil_kegiatan',
                'label' => 'Hasil Kegiatan',
                'rules' => 'required'
            ]
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($idp)
    {
        return $this->db->get_where($this->_table, ["id_pengajuan" => $idp])->row();
    }

    public function getHasil($id_kegiatan)
    {
        $query = "SELECT `tbl_hasil`.*, `tbl_kegiatan`.*
            FROM `tbl_hasil` JOIN `tbl_kegiatan`
            ON `tbl_hasil`.`id_kegiatan` = `tbl_kegiatan`.`id_kegiatan` WHERE  tbl_kegiatan.id_kegiatan = $id_kegiatan";
        //var_dump($query);
        //die;
        return $this->db->query($query)->result_array();
    }

    public function getPengajuanUser($nip)
    {
        $query = "SELECT `tbl_pengajuan`.*, `tbl_jenis_pengajuan`.`jenis_pengajuan`, `tbl_user`.`nama_pegawai`
                  FROM `tbl_pengajuan` JOIN `tbl_jenis_pengajuan`
                  ON `tbl_pengajuan`.`id_jenis_pengajuan` = `tbl_jenis_pengajuan`.`id_jenis_pengajuan` JOIN  `tbl_user` ON `tbl_pengajuan`.`nip` = `tbl_user`.`nip` 
                  AND `tbl_pengajuan`.`penyetujuan` = 0 AND `tbl_pengajuan`.`nip` = $nip
                ";
        return $this->db->query($query)->result_array();
    }

    public function getPengajuan()
    {
        $query = "SELECT `tbl_pengajuan`.*, `tbl_jenis_pengajuan`.`jenis_pengajuan`, `tbl_user`.`nama_pegawai`
                  FROM `tbl_pengajuan` JOIN `tbl_jenis_pengajuan`
                  ON `tbl_pengajuan`.`id_jenis_pengajuan` = `tbl_jenis_pengajuan`.`id_jenis_pengajuan` JOIN  `tbl_user` ON `tbl_pengajuan`.`nip` = `tbl_user`.`nip` 
                  AND `tbl_pengajuan`.`penyetujuan` = 0
                ";
        return $this->db->query($query)->result_array();
    }

    public function getKP()
    {
        $query = "SELECT `tbl_pengajuan`.*, `tbl_jenis_pengajuan`.`jenis_pengajuan`, `tbl_user`.`nama_pegawai`, `tbl_user`.`golongan`
                  FROM `tbl_pengajuan` JOIN `tbl_jenis_pengajuan`
                  ON `tbl_pengajuan`.`id_jenis_pengajuan` = `tbl_jenis_pengajuan`.`id_jenis_pengajuan` JOIN  `tbl_user` ON `tbl_pengajuan`.`nip` = `tbl_user`.`nip` 
                  AND `tbl_pengajuan`.`id_jenis_pengajuan` = 'JP1' AND `tbl_pengajuan`.`status2` = 'Verifikasi' AND `tbl_pengajuan`.`penyetujuan` = 0
                ";
        return $this->db->query($query)->result_array();
    }

    public function getKG()
    {
        $query = "SELECT `tbl_pengajuan`.*, `tbl_jenis_pengajuan`.`jenis_pengajuan`, `tbl_user`.`nama_pegawai`, `tbl_user`.`gaji`
                  FROM `tbl_pengajuan` JOIN `tbl_jenis_pengajuan`
                  ON `tbl_pengajuan`.`id_jenis_pengajuan` = `tbl_jenis_pengajuan`.`id_jenis_pengajuan` JOIN  `tbl_user` ON `tbl_pengajuan`.`nip` = `tbl_user`.`nip` 
                  AND `tbl_pengajuan`.`id_jenis_pengajuan` = 'JP2' AND `tbl_pengajuan`.`status2` = 'Verifikasi' AND `tbl_pengajuan`.`penyetujuan` = 0
                ";
        return $this->db->query($query)->result_array();
    }

    public function getP()
    {
        $query = "SELECT `tbl_pengajuan`.*, `tbl_jenis_pengajuan`.`jenis_pengajuan`, `tbl_user`.`nama_pegawai`
                  FROM `tbl_pengajuan` JOIN `tbl_jenis_pengajuan`
                  ON `tbl_pengajuan`.`id_jenis_pengajuan` = `tbl_jenis_pengajuan`.`id_jenis_pengajuan` JOIN  `tbl_user` ON `tbl_pengajuan`.`nip` = `tbl_user`.`nip` 
                  AND `tbl_pengajuan`.`id_jenis_pengajuan` = 'JP3' AND `tbl_pengajuan`.`penyetujuan` = 0
                ";
        return $this->db->query($query)->result_array();
    }

    public function getC()
    {
        $query = "SELECT `tbl_pengajuan`.*, `tbl_jenis_pengajuan`.`jenis_pengajuan`, `tbl_user`.`nama_pegawai`
                  FROM `tbl_pengajuan` JOIN `tbl_jenis_pengajuan`
                  ON `tbl_pengajuan`.`id_jenis_pengajuan` = `tbl_jenis_pengajuan`.`id_jenis_pengajuan` JOIN  `tbl_user` ON `tbl_pengajuan`.`nip` = `tbl_user`.`nip` 
                  AND `tbl_pengajuan`.`id_jenis_pengajuan` = 'JP4' AND `tbl_pengajuan`.`penyetujuan` = 0
                ";
        return $this->db->query($query)->result_array();
    }

    public function getPengajuanKP($id_pengajuan)
    {
        $query = "SELECT `tbl_berkas`.*, `tbl_pengajuan`.`tanggal_pengajuan`, `tbl_jenis_berkas`.`nama_berkas`
                  FROM `tbl_berkas` JOIN `tbl_pengajuan`
                  ON `tbl_berkas`.`nip` = `tbl_pengajuan`.`nip` JOIN  `tbl_jenis_berkas` ON `tbl_berkas`.`id_jenis_berkas` = `tbl_jenis_berkas`.`id_jenis_berkas` 
                  OR `tbl_berkas`.`id_jenis_berkas` = 'SK1' OR `tbl_berkas`.`id_jenis_berkas` = 'SK2' AND `tbl_pengajuan`.`id_pengajuan` = '$id_pengajuan'
                ";
        return $this->db->query($query)->result_array();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_hasil         = $post["id_hasil"];
        $this->id_kegiatan      = $post["id_kegiatan"];
        $this->hasil_kegiatan   = $post["hasil_kegiatan"];
        $this->file_hasil = $this->_uploadfile();
        $this->db->insert($this->_table, $this);
    }

    public function delete($idjp)
    {
        return $this->db->delete($this->_table, array("id_jenis_pengajuan" => $idjp));
    }

    private function _uploadfile()
    {
        $this->load->helper('inflector');
        $file_name = underscore($_FILES['file_var_name']['name']);
        $config['upload_path']          = './upload/berkas/';
        $config['allowed_types']        = 'pdf|jpg|docx|doc|jpeg|png';
        $config['file_name']            = $file_name;
        $config['overwrite']            = true;
        $config['max_size']             = 25120; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file_hasil')) {
            $data = array('error' => $this->upload->display_errors()); //associate view variable $error with upload errors
        } else {
            return $this->upload->data("file_name");
        }
    }
}
