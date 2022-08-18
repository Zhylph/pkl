<?php defined('BASEPATH') or exit('No direct script access allowed');

class Panitia_model extends CI_Model
{
    private $_table = "tbl_panitia";

    public $id_panitia;
    public $id_kegiatan;
    public $nama_panitia;
    public $tugas;
    public $gaji;


    public function rules()
    {
        return [

            [
                'field' => 'nama_panitia',
                'label' => 'Nama Panitia',
                'rules' => 'required'
            ],
            [
                'field' => 'tugas',
                'label' => 'Tugas Panitia',
                'rules' => 'required'
            ],
            [
                'field' => 'gaji',
                'label' => 'Gaji Panitia',
                'rules' => 'required'
            ]
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id_panitia)
    {
        return $this->db->get_where($this->_table, ["id_panitia" => $id_panitia])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_kegiatan  = $post["id_kegiatan"];
        $this->nama_panitia = $post["nama_panitia"];
        $this->tugas        = $post["tugas"];
        $this->gaji         = $post["gaji"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_panitia  = $post["id_panitia"];
        $this->id_kegiatan  = $post["id_kegiatan"];
        $this->nama_panitia = $post["nama_panitia"];
        $this->tugas        = $post["tugas"];
        $this->gaji         = $post["gaji"];
        $this->db->update($this->_table, $this, array('id_panitia' => $post['id_panitia']));
    }

    public function delete($id_panitia)
    {
        return $this->db->delete($this->_table, array("id_panitia" => $id_panitia));
    }
}
