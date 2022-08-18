<?php error_reporting(0); ?>

<?php defined('BASEPATH') or exit('No direct script access allowed');

class Kegiatan_model extends CI_Model
{
    private $_table = "tbl_kegiatan";

    public $id_kegiatan;
    public $nama_kegiatan;
    public $tanggal_kegiatan;
    public $total_anggaran;

    public function rules()
    {
        return [
            [
                'field' => 'nama_kegiatan',
                'label' => 'Nama Kegiatan',
                'rules' => 'required'
            ],

            [
                'field' => 'total_anggaran',
                'label' => 'Total Anggaran',
                'rules' => 'required'
            ]
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id_kegiatan)
    {
        return $this->db->get_where($this->_table, ["id_kegiatan" => $id_kegiatan])->row();
    }

    public function getKegiatan()
    {
        $query = "SELECT * FROM tbl_kegiatan";
        return $this->db->query($query)->result_array();
    }

    public function getDetailAlat($id_kegiatan)
    {
        $query = "SELECT * FROM `tbl_alat` WHERE  `id_kegiatan` = $id_kegiatan";
        return $this->db->query($query)->result_array();
    }

    public function getDetailPanitia($id_kegiatan)
    {
        $query = "SELECT * FROM `tbl_panitia` WHERE  `id_kegiatan` = $id_kegiatan";
        return $this->db->query($query)->result_array();
    }

    public function getLKegiatan($id_kegiatan)
    {
        //$query = "SELECT `tbl_kegiatan`.*, `tbl_alat`.*, `tbl_panitia`.*
           // FROM `tbl_kegiatan` JOIN `tbl_alat`
            //ON `tbl_kegiatan`.`id_kegiatan` = `tbl_alat`.`id_kegiatan` JOIN `tbl_panitia` ON `tbl_kegiatan`.`id_kegiatan` = `tbl_panitia`.`id_kegiatan` WHERE  tbl_kegiatan.id_kegiatan = $id_kegiatan";
        //var_dump($query);
        //die;
        //return $this->db->query($query)->result_array();

        $this->db->select('*');
        $this->db->from('tbl_kegiatan');
        $this->db->where('id_kegiatan', $id_kegiatan);
        return $this->db->get()->row_array();
    }

    public function getLPanitia($id_kegiatan)
    {
        $this->db->select('*');
        $this->db->from('tbl_panitia');
        $this->db->where('id_kegiatan', $id_kegiatan);
        return $this->db->get()->result_array();
    }

    public function getLAlat($id_kegiatan)
    {
        $this->db->select('*');
        $this->db->from('tbl_alat');
        $this->db->where('id_kegiatan', $id_kegiatan);
        return $this->db->get()->result_array();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->nama_kegiatan = $post["nama_kegiatan"];
        $this->tanggal_kegiatan = $post["tanggal_kegiatan"];
        $this->total_anggaran = $post["total_anggaran"];
        $this->file_berkas = $this->_uploadfile();
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_kegiatan = $post["id_kegiatan"];
        $this->nama_kegiatan = $post["nama_kegiatan"];
        $this->tanggal_kegiatan = $post["tanggal_kegiatan"];
        $this->total_anggaran = $post["total_anggaran"];
        if (!empty($_FILES["file_berkas"]["name"])) {
            $this->file_berkas = $this->_uploadfile();
        } else {
            $this->file_berkas = $post["old_file"];
        }
        $this->db->update($this->_table, $this, array('id_kegiatan' => $post['id_kegiatan']));
    }

    public function delete($id_kegiatan)
    {
        return $this->db->delete($this->_table, array("id_kegiatan" => $id_kegiatan));
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

        if (!$this->upload->do_upload('file_berkas')) {
            $data = array('error' => $this->upload->display_errors()); //associate view variable $error with upload errors
        } else {
            return $this->upload->data("file_name");
        }
    }

}
