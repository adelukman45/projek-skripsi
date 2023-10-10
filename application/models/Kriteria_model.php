<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kriteria_model extends CI_Model
{

    public function tampil()
    {
        $query = $this->db->get('kriteria');
        return $query->result();
    }

    public function getTotal()
    {
        return $this->db->count_all('kriteria');
    }

    public function insert($data = [])
    {
        $result = $this->db->insert('kriteria', $data);
        return $result;
    }

    public function show($id_kriteria)
    {
        $this->db->where('id_kriteria', $id_kriteria);
        $query = $this->db->get('kriteria');
        return $query->row();
    }

    public function update($id_kriteria, $data = [])
    {
        $ubah = array(
            'nama_kriteria' => $data['nama_kriteria'],
            'kode_kriteria' => $data['kode_kriteria'],
            'bobot'  => $data['bobot']
        );

        $this->db->where('id_kriteria', $id_kriteria);
        $this->db->update('kriteria', $ubah);
    }

    public function delete($id_kriteria)
    {
        $this->db->where('id_kriteria', $id_kriteria);
        $this->db->delete('kriteria');
    }
    function get_total_bobot()
    {
        return $this->db->query("SELECT SUM(bobot) as total FROM kriteria");
    }
}
