<?php

class MataKuliah_model
{
    private $table = 'matakuliah';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllMataKuliah()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getMataKuliahById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' mk join jurusan j on mk.ID_JURUSAN=j.ID_JURUSAN WHERE ID_MATKUL=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahDataMataKuliah($data)
    {
        $query = "INSERT INTO matakuliah
                    VALUES
                  (null, :jurusan, :nama)";

        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('jurusan', $data['jurusan']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataMataKuliah($id)
    {
        $query = "DELETE FROM matakuliah WHERE ID_MATKUL = :id";

        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function ubahDataMataKuliah($data)
    {
        $query = "UPDATE matakuliah SET
                    nama = :nama,
                    nrp = :nrp,
                    email = :email,
                    jurusan = :jurusan
                  WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nrp', $data['nrp']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function cariDataMataKuliah()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM matakuliah WHERE nama LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }
}
