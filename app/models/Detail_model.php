<?php

class Detail_model
{
    private $table = 'detail';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllDetail()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getDetailById($id)
    {
        $this->db->query('SELECT *, mk.NAMA_MATKUL MK FROM ' . $this->table . ' j LEFT JOIN matakuliah mk on j.ID_JURUSAN=mk.ID_JURUSAN WHERE j.id_jurusan=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahDataDetail($data)
    {
        $query = "INSERT INTO detail
                    VALUES
                  (null, :mhs, :mk)";

        $this->db->query($query);
        $this->db->bind('mhs', $data['mhs']);
        $this->db->bind('mk', $data['mk']);

        $this->db->execute();

        return $this->db->rowCount();
    }
}
