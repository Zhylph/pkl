<?php defined('BASEPATH') or exit('No direct script access allowed');

class History_model extends CI_Model
{

    private $_table = "tbl_history";

    public $id_history;
    public $id_jenis_pengajuan;
    public $nip;
    public $status_history;
    public $ket_history;
    public $tgl_history;

    public function rules()
    {
        return [
            [
                'field' => 'nip',
                'label' => 'NIP',
                'rules' => 'required'
            ],

        ];
    }

    public function getHistory_u($nip)
    {
        $this->db->set('tbl_history');
        $this->db->from('tbl_history');
        $this->db->join('tbl_jenis_pengajuan', 'tbl_jenis_pengajuan.id_jenis_pengajuan=tbl_history.id_jenis_pengajuan');
        $this->db->order_by('id_history', 'DESC');
        $this->db->where_in('nip', $nip);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function addHistory($nip, $id_jns_peng)
    {
        $data = [
            'id_jenis_pengajuan' => $id_jns_peng,
            'nip' => $nip,
            'status_history' => 'Diterima',
            'ket_history' => 'Data Sesuai',
            'tgl_history' => date("Y-m-d")
        ];

        $this->db->insert('tbl_history', $data);
    }

    public function addHistoryTolak($nip, $id_jns_peng, $alasan)
    {
        $data = [
            'id_jenis_pengajuan' => $id_jns_peng,
            'nip' => $nip,
            'status_history' => 'Ditolak',
            'ket_history' => $alasan,
            'tgl_history' => date("Y-m-d")
        ];

        $this->db->insert('tbl_history', $data);
    }
}
