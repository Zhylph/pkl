<?php defined('BASEPATH') or exit('No direct script access allowed');

class Mcountdown extends CI_Model
{
    private $_table = "countdowntime";

    public function time($s, $nip)
    {
        $data = [
            'nip' => $nip,
            'waktu'=> date('Y:m:d H:i:s', $s),
        ];

        $this->db->insert('countdowntime', $data);
            if($this->db->affected_rows()>0){
            return true;
        } else {
            return false;
        }
    }

    public function select_time($nip)
    {
        $this->db->select('*');
        $this->db->from('countdowntime');
        $this->db->where_in('nip', $nip);
        $query = $this->db->get();

        if($query->num_rows()>0)
        {
            return $query->row();
        }
    }

    public function delete($nip)
    {
        return $this->db->delete($this->_table, array("nip" => $nip));
    }

}