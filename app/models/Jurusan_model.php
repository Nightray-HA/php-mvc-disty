<?php

class Jurusan_model
{
    private $table = 'jurusan';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllJurusan()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getJurusanById($id)
    {
        $this->db->query('SELECT *, mk.NAMA_MATKUL MK FROM ' . $this->table . ' j LEFT JOIN matakuliah mk on j.ID_JURUSAN=mk.ID_JURUSAN WHERE j.id_jurusan=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahDataJurusan($data)
    {
        $query = "INSERT INTO jurusan
                    VALUES
                  (null, :nama)";

        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataJurusan($id)
    {
        $query = "DELETE FROM jurusan WHERE ID_JURUSAN = :id";

        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function ubahDataJurusan($data)
    {
        $query = "UPDATE jurusan SET
                    NAMA_JURUSAN = :nama
                  WHERE ID_JURUSAN = :id";

        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function cariDataJurusan()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM jurusan WHERE nama LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }
}
