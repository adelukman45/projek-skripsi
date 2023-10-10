<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Perhitungan_model extends CI_Model
{

    public function get_kriteria()
    {
        $query = $this->db->get('kriteria');
        return $query->result();
    }
    public function get_alternatif()
    {
        $query = $this->db->get('alternatif');
        return $query->result();
    }

    public function data_nilai($id_alternatif, $id_kriteria)
    {
        $query = $this->db->query("SELECT * FROM penilaian JOIN sub_kriteria WHERE penilaian.nilai=sub_kriteria.id_sub_kriteria AND penilaian.id_alternatif='$id_alternatif' AND penilaian.id_kriteria='$id_kriteria';");
        return $query->row_array();
    }

    public function get_hasil()
    {
        $query = $this->db->query("SELECT * FROM hasil ORDER BY nilai DESC;");
        return $query->result();
    }

    public function get_hasil_alternatif($id_alternatif)
    {
        $query = $this->db->query("SELECT * FROM alternatif WHERE id_alternatif='$id_alternatif';");
        return $query->row_array();
    }

    public function get_total_bobot()
    {
        $query = $this->db->query("SELECT SUM(bobot) as total_bobot FROM kriteria;");
        return $query->row_array();
    }

    public function insert_nilai_hasil($hasil_akhir = [])
    {
        $result = $this->db->insert('hasil', $hasil_akhir);
        return $result;
    }

    public function hapus_hasil()
    {
        $query = $this->db->query("TRUNCATE TABLE hasil;");
        return $query;
    }

    // Fetch records
    public function getData($rowno, $rowperpage, $search = "")
    {

        $this->db->select('*');
        $this->db->from('alternatif');

        if ($search != '') {
            $this->db->like('nama', $search);
        }

        $this->db->limit($rowperpage, $rowno);
        $query = $this->db->get();

        return $query->result_array();
    }

    // Select total records
    public function getrecordCount($search = '')
    {

        $this->db->select('count(*) as allcount');
        $this->db->from('alternatif');

        if ($search != '') {
            $this->db->like('nama', $search);
        }

        $query = $this->db->get();
        $result = $query->result_array();

        return $result[0]['allcount'];
    }
}
