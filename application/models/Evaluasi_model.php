<?php
class Evaluasi_model extends CI_Model
{
    public function dapat_evaluasi()
    {
        $query = $this->db->get('t_evaluasi');
        return $query->result();
    }

    public function dapat_satu_evaluasi($id_evaluasi)
    {
        $this->db->where('id_evaluasi', $id_evaluasi);
        $query = $this->db->get('t_evaluasi');
        return $query->row();
    }

    public function tambah_evaluasi($data)
    {
        $this->db->insert('t_evaluasi', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function dapat_satu_detail_evaluasi($id_evaluasi)
    {
        $this->db->where('id_evaluasi', $id_evaluasi);
        $query = $this->db->get('t_detail_evaluasi');
        return $query->result_array();
    }

    public function tambah_detail_evaluasi($data)
    {
        $this->db->insert('t_detail_evaluasi', $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
