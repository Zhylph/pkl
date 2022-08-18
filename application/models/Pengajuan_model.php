<?php defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Pengajuan_model extends CI_Model
{
    private $_table = "tbl_pengajuan";

    public $id_pengajuan;
    public $nip;
    public $id_jenis_pengajuan;
    public $tanggal_pengajuan;
    public $penyetujuan;

    public function rules()
    {
        return [

            [
                'field' => 'id_jenis_pengajuan',
                'label' => 'Jenis Pengajuan',
                'rules' => 'required|trim'
            ],
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
                  AND `tbl_pengajuan`.`id_jenis_pengajuan` = 'JP1'  AND `tbl_pengajuan`.`penyetujuan` = 0
                ";
        return $this->db->query($query)->result_array();
    }
    public function getKP1()
    {
        $query = "SELECT `tbl_pengajuan`.*, `tbl_jenis_pengajuan`.`jenis_pengajuan`, `tbl_user`.`nama_pegawai`, `tbl_user`.`golongan`
                  FROM `tbl_pengajuan` JOIN `tbl_jenis_pengajuan`
                  ON `tbl_pengajuan`.`id_jenis_pengajuan` = `tbl_jenis_pengajuan`.`id_jenis_pengajuan` JOIN  `tbl_user` ON `tbl_pengajuan`.`nip` = `tbl_user`.`nip` 
                  AND `tbl_pengajuan`.`id_jenis_pengajuan` = 'JP1'  AND `tbl_pengajuan`.`penyetujuan` = 0 AND `tbl_pengajuan`.`status2` = 'Verifikasi'
                ";
        return $this->db->query($query)->result_array();
    }


    public function getKG()
    {
        $query = "SELECT `tbl_pengajuan`.*, `tbl_jenis_pengajuan`.`jenis_pengajuan`, `tbl_user`.`nama_pegawai`, `tbl_user`.`gaji`
                  FROM `tbl_pengajuan` JOIN `tbl_jenis_pengajuan`
                  ON `tbl_pengajuan`.`id_jenis_pengajuan` = `tbl_jenis_pengajuan`.`id_jenis_pengajuan` JOIN  `tbl_user` ON `tbl_pengajuan`.`nip` = `tbl_user`.`nip` 
                  AND `tbl_pengajuan`.`id_jenis_pengajuan` = 'JP2' AND `tbl_pengajuan`.`penyetujuan` = 0
                ";
        return $this->db->query($query)->result_array();
    }
    public function getKG1()
    {
        $query = "SELECT `tbl_pengajuan`.*, `tbl_jenis_pengajuan`.`jenis_pengajuan`, `tbl_user`.`nama_pegawai`, `tbl_user`.`gaji`
                  FROM `tbl_pengajuan` JOIN `tbl_jenis_pengajuan`
                  ON `tbl_pengajuan`.`id_jenis_pengajuan` = `tbl_jenis_pengajuan`.`id_jenis_pengajuan` JOIN  `tbl_user` ON `tbl_pengajuan`.`nip` = `tbl_user`.`nip` 
                  AND `tbl_pengajuan`.`id_jenis_pengajuan` = 'JP2' AND `tbl_pengajuan`.`penyetujuan` = 0 AND `tbl_pengajuan`.`status2` = 'Verifikasi'
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
    public function getP1()
    {
        $query = "SELECT `tbl_pengajuan`.*, `tbl_jenis_pengajuan`.`jenis_pengajuan`, `tbl_user`.`nama_pegawai`
                  FROM `tbl_pengajuan` JOIN `tbl_jenis_pengajuan`
                  ON `tbl_pengajuan`.`id_jenis_pengajuan` = `tbl_jenis_pengajuan`.`id_jenis_pengajuan` JOIN  `tbl_user` ON `tbl_pengajuan`.`nip` = `tbl_user`.`nip` 
                  AND `tbl_pengajuan`.`id_jenis_pengajuan` = 'JP3' AND `tbl_pengajuan`.`penyetujuan` = 0 AND `tbl_pengajuan`.`status2` = 'Verifikasi'
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
        $this->id_pengajuan = $post["id_pengajuan"];
        $this->nip = $post["nip"];
        $this->id_jenis_pengajuan = $post["id_jenis_pengajuan"];
        $this->tanggal_pengajuan = $post["tgl"];
        $this->penyetujuan = ($post['penyetujuan'] = 0);
        $this->status = '-';
        $this->status2 = '-';
        $this->db->insert($this->_table, $this);
    }

    function approve($id_pengajuan)
    {
        // $idkaryawan = $this->input->post('idkaryawan');
        $data = array(
            'penyetujuan' => '1'
        );
        return $this->db->update('tbl_pengajuan', $data, array('id_pengajuan' => $id_pengajuan));
    }

    public function delete($idjp)
    {
        return $this->db->delete($this->_table, array("id_jenis_pengajuan" => $idjp));
    }

    public function getNotif_u($nip)
    {
        $this->db->set('tbl_notif');
        $this->db->from('tbl_notif');
        $this->db->order_by('id_notif', 'DESC');
        $this->db->where_in('id_user', $nip);
        $this->db->where_in('notif_ke', '2');
        $query = $this->db->get();
        return $query->result();
    }

    public function getNotif_p()
    {
        $this->db->set('tbl_notif');
        $this->db->from('tbl_notif');
        $this->db->join('tbl_user', 'tbl_user.nip=tbl_notif.id_user');
        $this->db->join('tbl_jenis_pengajuan', 'tbl_jenis_pengajuan.id_jenis_pengajuan=tbl_notif.id_jenis_pengajuan');
        $this->db->order_by('id_notif', 'DESC');
        $this->db->where_in('notif_ke', '1');
        $query = $this->db->get();
        return $query->result();
    }

    public function addNotif_p($nip)
    {
        $post = $this->input->post();
        $jns_pengajuan = $post["id_jenis_pengajuan"];

        $data = [
            'id_user' => $nip,
            'id_jenis_pengajuan' => $jns_pengajuan,
            'notif_ke' => '1',
            'status' => '-',
            'ket' => 'Data Baru'
        ];

        $this->db->insert('tbl_notif', $data);
    }

    public function addNotif($nip, $nama)
    {
        $data = [
            'id_user' => $nip,
            'notif_ke' => '2',
            'nama_berkas' => $nama,
            'status' => 'Diterima',
            'ket' => 'Data Sesuai'
        ];

        $this->db->insert('tbl_notif', $data);
    }

    public function addNotifAjukem($nip,$id_jns_peng)
    {
        $data = [
            'id_user' => $nip,
            'id_jenis_pengajuan' => $id_jns_peng,
            'notif_ke' => '1',
            'status' => '-',
            'ket' => 'Data di ajukan kembali'
        ];

        $this->db->insert('tbl_notif', $data);
    }

    public function notifTolak($nip, $nama, $alasan)
    {
        $data = [
            'id_user' => $nip,
            'notif_ke' => '2',
            'nama_berkas' => $nama,
            'status' => 'Ditolak',
            'ket' => $alasan
        ];

        $this->db->insert('tbl_notif', $data);
    }

    public function golonganBaru($nip, $golongan)
    {
        $data = [ 
            'golongan' => $golongan,

        ];

        $this->db->where('nip', $nip);
        $this->db->update('tbl_user', $data);
    }

    public function gajiBaru($nip, $gaji_baru)
    {
        $data = [ 
            'gaji' => $gaji_baru,

        ];

        $this->db->where('nip', $nip);
        $this->db->update('tbl_user', $data);
    }

    public function terimaPengajuan_kp($id,$golongan, $golongan_lama)
    {
        $data = [
            'status' => 'Diterima',
            'status2' => 'Verifikasi',
            'tanggal_verif' => date("Y-m-d"),
            'golongan_baru' => $golongan,
            'golongan_lama' => $golongan_lama,
        ];

        $this->db->where('id_pengajuan', $id);
        $this->db->update('tbl_pengajuan', $data);
    }
    public function terimaPengajuan_kg($id,$gaji_baru, $gaji_lama)
    {
        $data = [
            'status' => 'Diterima',
            'status2' => 'Verifikasi',
            'tanggal_verif' => date("Y-m-d"),
            'gaji_baru' => $gaji_baru,
            'gaji_lama' => $gaji_lama,
        ];

        $this->db->where('id_pengajuan', $id);
        $this->db->update('tbl_pengajuan', $data);
    }

    public function terimaPengajuan_p($id)
    {
        $data = [
            'status' => 'Diterima',
            'status2' => 'Verifikasi',
            'tanggal_verif' => date("Y-m-d"),
        ];

        $this->db->where('id_pengajuan', $id);
        $this->db->update('tbl_pengajuan', $data);
    }

    public function ajuKembali($id)
    {
        $data = [
            'status' => '-',
            'status2' => '-',
            'ket' => '',
        ];

        $this->db->where('id_pengajuan', $id);
        $this->db->update('tbl_pengajuan', $data);
    }

    public function tolakPengajuan($id, $alasan)
    {
        $data = [
            'status' => 'Ditolak',
            'status2' => 'Ditolak',
            'ket' => $alasan,
        ];

        $this->db->where('id_pengajuan', $id);
        $this->db->update('tbl_pengajuan', $data);
    }
}
